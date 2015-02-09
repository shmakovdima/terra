<?php



    ini_set('display_errors',1);

    error_reporting(E_ALL);

    setlocale(LC_ALL, 'ru_RU.UTF-8');

    mb_internal_encoding("UTF-8"); 



    

    $id = $_POST['id'];

    $name = $_POST['name'];

    $colorline = $_POST['colorline'];

     $desc = $_POST['descfield'];


    

    $colorfield = $_POST['colorfield'];

        // Адрес сервера MySQL 
include("../function.php");
   $db = bdconnect();



   mysql_query("UPDATE levelarrgs SET name='$name', colorline='$colorline', colorfield = '$colorfield', description = '$desc' WHERE id = '$id' ") or die(mysql_error());

    mysql_close($db);



    header('Location: ../admin.php');





?>



