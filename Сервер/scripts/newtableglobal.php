<?php
	 ini_set('display_errors',1);

    error_reporting(E_ALL);

    setlocale(LC_ALL, 'ru_RU.UTF-8');

    mb_internal_encoding("UTF-8"); 




   $newtablename = $_POST['newnametableglobal'];

   $rowcount = $_POST['newrowcountglobal'];

   $newnametablerowname = $_POST['newrownameglobal'];

   $tablesids = $_POST['newtableglobalids']; 



      include("../function.php");
   $db = bdconnect();


    $tablesidsarr = explode(" ", $tablesids);

    $rowcountarr = explode(" ", $newnametablerowname);

    $result = mysql_query("SELECT MAX(id) AS id FROM tables");

    $res = mysql_fetch_array($result);

    $id = $res['id'];


    foreach ($tablesidsarr as $idtable) {
    	$id++;
    	echo $idtable." ";
    	mysql_query("INSERT INTO tables (id, idfield, nametable, rowcount) VALUES ('$id','$idtable','$newtablename','$rowcount')");


    	$row = 0;

    	foreach ($rowcountarr as $rownamecur) {
    		mysql_query("INSERT INTO rowname (idtables,row, namerow) VALUES ('$id','$row','$rownamecur')");

    		$row++;
    	}
    	
    }


    mysql_close($db);
    header('Location: ../admin.php');

?>