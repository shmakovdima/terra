<?php
	
	 include("../function.php");
   $db = bdconnect();

    ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['dellineidfield'];
   $idline = $_POST['dellineidline'];

   mysql_query("DELETE FROM tablesarrgs WHERE id = '$idline'");

   

   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>