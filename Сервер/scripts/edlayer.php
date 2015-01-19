<?php

	mb_internal_encoding("UTF-8"); 

    setlocale(LC_ALL, 'ru_RU.UTF-8');

   	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    

    ini_set('display_errors',1);



    error_reporting(E_ALL);  







    $namelayer = $_POST['edlayername'];

    $idlayer = $_POST['edlayerid'];

	 

    include("../function.php");
   $db = bdconnect();



    mysql_query("UPDATE level SET namelevel='$namelayer'  WHERE idlevel = '$idlayer' ");

    mysql_close($db);



    

    header('Location: ../admin.php');

   ?>