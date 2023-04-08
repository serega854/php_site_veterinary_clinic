<?php
require "libs/rb.php";

R::setup('mysql:host=localhost;dbname=db','root','');
$connect = mysqli_connect('localhost','root','','db');

session_start();

?>