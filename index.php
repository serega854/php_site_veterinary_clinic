<?php
global $pdo;
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=db', 'root');
    $sql = "SELECT 
    ph.id_photographers, ph.photo, ph.full_name, tp.name, ph.owner_name, ph.about,
    ph.birth_date, ph.about 
    FROM `zoo` ph
    JOIN `types` tp ON ph.id_types=tp.id_types";
    $arBinds = [];

    $fid_photographers=0;
    $ffull_name=0;
    $fname=0;
    $fowner_name=0;
    $fbirth_date=0;
    $photo = 0;

    $vphoto = "0";
    $fid_photographers=0;
    $vfull_name="0";
    $vname=0;
    $vowner_name="0";
    $vbirth_date="0";

    if(!key_exists('clearFilter', $_GET))
    {
      if(count($_GET) > 0)
      {
       

        
          $sql .= " WHERE";

          $sql .= "ph.id_photographers = :id_photographers";
          $arBinds['id_photographers'] = htmlspecialchars($_GET['id_photographers']);

          $sql .= "ph.photo = :photo";
          $arBinds['photo'] = htmlspecialchars($_GET['photo']);

          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        
      }
    }

    $stmt = $pdo -> prepare($sql);
    $result = $stmt ->execute($arBinds);
    $result = $stmt->fetchAll();
}
catch (PDOException $exception)
{
    echo $exception->getMessage();
    die;
}?>