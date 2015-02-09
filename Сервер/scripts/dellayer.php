<?php

	mb_internal_encoding("UTF-8"); 

    setlocale(LC_ALL, 'ru_RU.UTF-8');

   	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    

    ini_set('display_errors',1);



    error_reporting(E_ALL);  



	$idlayer = $_POST['dellayername'];

	 

   include("../function.php");
   $db = bdconnect();





    mysql_query("DELETE FROM level  WHERE idlevel = '$idlayer' ");

    mysql_query("DELETE FROM levelarrgs  WHERE idlevel = '$idlayer' ");

    mysql_close($db);



    

   header('Location: ../admin.php');

   ?>