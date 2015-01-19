<?php
   ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['edlineidfield'];
   $idtable = $_POST['edlineidtable'];
   $row = $_POST['edlinerow'];
   $text = $_POST['edlinetext'];

    include("../function.php");
   $db = bdconnect();

    mysql_query("UPDATE tablesarrgs SET value='$text' WHERE id = '$idtable' AND row = '$row'");


   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>