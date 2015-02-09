<?php
   ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['delrowidfield'];
   $idtable = $_POST['delrowidtable'];
   $row = $_POST['delrowrow'];


include("../function.php");
   $db = bdconnect();

     
    mysql_query("DELETE FROM rowname WHERE idtables = '$idtable' AND row ='$row'");

    mysql_query("DELETE FROM tablesarrgs WHERE idtables = '$idtable' AND row ='$row'"); 
  
   


   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>