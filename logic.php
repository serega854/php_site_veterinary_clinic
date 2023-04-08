

<?php
global $pdo;
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=db', 'root');
    $sql = "SELECT 
    ph.id_photographers, ph.photo, ph.full_name, tp.name, ph.owner_name, 
    ph.birth_date, ph.about
    FROM `zoo` ph
    JOIN `types` tp ON ph.id_types=tp.id_types";
    $arBinds = [];

    $ffull_name=0;
    $fname=0;
    $fowner_name=0;
    $fbirth_date=0;

    $vfull_name="0";
    $vname=0;
    $vowner_name="0";
    $vbirth_date="0";

    if(!key_exists('clearFilter', $_GET))
    {
      if(count($_GET) > 0)
      {
        
        if($_GET['full_name'])
        {
          $ffull_name = 1;
          $vfull_name = htmlspecialchars($_GET['full_name']);
        }
        if($_GET['name'])
        {
          $fname = 1;
          $vname = htmlspecialchars($_GET['name']);
        }
        if($_GET['birth_date'])
        {
          $fbirth_date = 1;
          $vbirth_date = htmlspecialchars($_GET['birth_date']);
        }
        if($_GET['owner_name'])
        {
          $fowner_name = 1;
          $vowner_name = htmlspecialchars($_GET['owner_name']);
        }

        if($ffull_name == 1 AND $fbirth_date == 0 AND $fowner_name == 0 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 1 AND $fowner_name == 0 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
        }      
        if($ffull_name == 0 AND $fbirth_date == 0 AND $fowner_name == 1 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 0 AND $fowner_name == 0 AND $fname == 1)
        {
          //$sql .= " WHERE";
          $sql .= " WHERE ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }


        if($ffull_name == 1 AND $fbirth_date == 1 AND $fowner_name == 0 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
        }
        if($ffull_name == 1 AND $fbirth_date == 0 AND $fowner_name == 1 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
        }
        if($ffull_name == 1 AND $fbirth_date == 0 AND $fowner_name == 0 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 1 AND $fowner_name == 1 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.birth_datee = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 1 AND $fowner_name == 0 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 0 AND $fowner_name == 1 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }

        if($ffull_name == 1 AND $fbirth_date == 1 AND $fowner_name == 1 AND $fname == 0)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
        }       
        if($ffull_name == 1 AND $fbirth_date == 0 AND $fowner_name == 1 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }
        if($ffull_name == 1 AND $fbirth_date == 1 AND $fowner_name == 0 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.full_name = :full_name";
          $arBinds['full_name'] = htmlspecialchars($_GET['full_name']);
          $sql .= " AND ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }
        if($ffull_name == 0 AND $fbirth_date == 1 AND $fowner_name == 1 AND $fname == 1)
        {
          $sql .= " WHERE";
          $sql .= " ph.birth_date = :birth_date";
          $arBinds['birth_date'] = htmlspecialchars($_GET['birth_date']);
          $sql .= " AND ph.owner_name = :owner_name";
          $arBinds['owner_name'] = htmlspecialchars($_GET['owner_name']);
          $sql .= " AND ph.id_types = :name";
          $arBinds['name'] = htmlspecialchars($_GET['name']);
        }

        if($ffull_name == 1 AND $fbirth_date == 1 AND $fowner_name == 1 AND $fname == 1)
        {
          $sql .= " WHERE";
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