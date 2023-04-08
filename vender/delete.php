<?php

require_once '../db.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `zoo` WHERE `zoo`.`id_photographers` = '$id'");

header('Location: ../lab2.php');

?>