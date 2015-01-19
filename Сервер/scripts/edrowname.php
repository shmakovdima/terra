<?php

  ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 


   $fieldid = $_POST['edrowidfield'];
   $idtable = $_POST['edrowidtable'];
   $row = $_POST['edrowrow'];
   $newnamerow = $_POST['edrowname'];


    include("../function.php");
   $db = bdconnect();

      mysql_query("UPDATE rowname SET namerow ='$newnamerow' WHERE row='$row' AND idtables = '$idtable'  ") or die(mysql_error());
    
    
  
   


   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);


?>


