<?php
$id = $_GET['id'];
 mb_internal_encoding("UTF-8"); 
 setlocale(LC_ALL, 'ru_RU.UTF-8');
 include("function.php");

if ($id==="") {
   header('Location: admin.php');
}

include("html/table.html")





?>

