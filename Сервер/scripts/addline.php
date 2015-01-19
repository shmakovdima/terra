<?php
	

    include("../function.php");
    $db = bdconnect();
	

    ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['addlineidfield'];
   $idtable = $_POST['addlineidtable'];
   $newrowname = $_POST['addlinerowname'];


    $max= mysql_query("SELECT MAX(id) as id FROM tablesarrgs");
    $max = mysql_fetch_array($max);
    $id=$max['id']+1;

    

    $newnamearr = explode(" ", $newrowname);
    $i = -1;
    $rown = mysql_query("SELECT * FROM rowname WHERE idtables ='$idtable' ORDER BY row") or die(mysql_error());


    while ($val = mysql_fetch_array($rown)) {
    	$i+=1;
    	$row = $val['row'];
    	$value = $newnamearr[$i];
    	mysql_query("INSERT INTO tablesarrgs (id, idtables, row, value) VALUES ('$id','$idtable','$row','$value')") or die(mysql_error());
    }

   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>