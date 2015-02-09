<?php
   ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['newrowidfield'];
   $idtable = $_POST['newrowidtable'];
   $newrowname = $_POST['newrowrowname'];



   include("../function.php");
   $db = bdconnect();
   
   $query = mysql_query("SELECT max(row) as row FROM rowname WHERE idtables='$idtable'") or die(mysql_error());
   $rown = mysql_fetch_array($query);
   $row=$rown['row']+1;
   mysql_query("INSERT INTO rowname (idtables,row, namerow) VALUES ('$idtable','$row','$newrowname')") or die(mysql_error());

   $getarrgs = mysql_query("SELECT * FROM tablesarrgs WHERE idtables='$idtable' ORDER BY id");

   $curid = "";

   while ($value = mysql_fetch_array($getarrgs)) {
      $idthis = $value['id'];
      if ($curid=="") {
        $curid = $idthis;
        mysql_query("INSERT INTO tablesarrgs (id, idtables, row) VALUES ('$idthis','$idtable','$row')");
      }
      if ($curid !==$idthis) {
        $curid = $idthis;
        mysql_query("INSERT INTO tablesarrgs (id, idtables, row) VALUES ('$idthis','$idtable','$row')");
      }
   }

  
   


   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>