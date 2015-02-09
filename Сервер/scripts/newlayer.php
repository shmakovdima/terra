<?php

	mb_internal_encoding("UTF-8"); 
    setlocale(LC_ALL, 'ru_RU.UTF-8');
   	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    
    ini_set('display_errors',1);

    error_reporting(E_ALL);  

	$namelayer = $_POST['newlayername'];
	 
   include("../function.php");
   $db = bdconnect();
   
    $max=mysql_query("SELECT MAX(idlevel) as id FROM level");
    $max = mysql_fetch_array($max);
    $id=$max['id']+1;

    mysql_query("INSERT INTO level (idlevel, namelevel ) VALUES('$id','$namelayer')") or die(mysql_error());


   mysql_close($db);
   header('Location: ../admin.php');
?>