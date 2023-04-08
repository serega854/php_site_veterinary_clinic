<?php 
require_once '../db.php'; 

$id = $_POST['id'];

$full_name = $_POST['full_name'];



$id_types = $_POST['id_types'];

$owner_name = $_POST['owner_name'];

$birth_date = $_POST['birth_date'];

$about = $_POST['about'];



$path = $_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'], '../inc/' . $path);
if ($path != "") // фото загружено
{
    echo "фото загружено ";
    if($id_types=="")
    {
        mysqli_query($connect, "UPDATE `zoo` SET `photo` = '$path',`full_name` = '$full_name', `owner_name` = '$owner_name', `birth_date` = '$birth_date', 
`about` = '$about' WHERE `zoo`.`id_photographers` = '$id'");
    }
    if($id_types!="")
    {
        mysqli_query($connect, "UPDATE `zoo` SET `id_types`='$id_types', `photo` = '$path',`full_name` = '$full_name', `owner_name` = '$owner_name', `birth_date` = '$birth_date', 
`about` = '$about' WHERE `zoo`.`id_photographers` = '$id'");
    }
}


if ($path == "") // фото не загружено
{
    echo "фото не загружено ";
    if($id_types=="")
    {
        mysqli_query($connect, "UPDATE `zoo` SET `full_name` = '$full_name', `owner_name` = '$owner_name', `birth_date` = '$birth_date', 
`about` = '$about' WHERE `zoo`.`id_photographers` = '$id'");
    }
    if($id_types!="")
    {
        mysqli_query($connect, "UPDATE `zoo` SET `id_types`='$id_types', `full_name` = '$full_name', `owner_name` = '$owner_name', `birth_date` = '$birth_date', 
`about` = '$about' WHERE `zoo`.`id_photographers` = '$id'");
    }


}






/*
if ($flag != 0) // чтобы если без изменений в выпдающем списке, все равно сохраняло другие поля
{
    mysqli_query($connect, "UPDATE `zoo` SET `photo` = '$path',`full_name` = '$full_name', `owner_name` = '$owner_name', `birth_date` = '$birth_date', 
`about` = '$about' WHERE `zoo`.`id_photographers` = '$id'");

}


*/








/*
$path = '' . time() . $_FILES['photo']['name'];
if(move_uploaded_file($_FILES['photo']['tmp_name'], '../inc/' . $path))
{

    mysqli_query($connect, "INSERT INTO `zoo` (`id_photographers`, `photo`, `full_name`, `id_types`, `owner_name`, `birth_date`, `id_owner`, `about`) 
    VALUES (NULL, '$path', '$full_name', '$id_types', '$owner_name', '$birth_date', NULL, '$about');");
}
else
{
    mysqli_query($connect, "INSERT INTO `zoo` (`id_photographers`, `full_name`, `id_types`, `owner_name`, `birth_date`, `id_owner`, `about`) 
    VALUES (NULL, '$full_name', '$id_types', '$owner_name', '$birth_date', NULL, '$about');");
}

*/







header('Location: ../lab2.php');

?>