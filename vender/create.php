<?php 
require_once '../db.php'; 

$full_name = $_POST['full_name'];

$id_types = $_POST['id_types'];

$owner_name = $_POST['owner_name'];

$birth_date = $_POST['birth_date'];

$about = $_POST['about'];




$path = '' . time() . $_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'], '../inc/' . $path);





mysqli_query($connect, "INSERT INTO `zoo` (`id_photographers`, `photo`, `full_name`, `id_types`, `owner_name`, `birth_date`, `id_owner`, `about`) 
VALUES (NULL, '$path', '$full_name', '$id_types', '$owner_name', '$birth_date', NULL, '$about');");




header('Location: ../lab2.php');

?>


