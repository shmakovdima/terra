<?php

   mb_internal_encoding("UTF-8"); 

   setlocale(LC_ALL, 'ru_RU.UTF-8');

   $fieldid = $_POST['delnametableidfield'];

   $newtablename = $_POST['delnametable'];

  



  include("../function.php");
   $db = bdconnect();



    mysql_query("DELETE FROM tables  WHERE id = '$newtablename' ");

    mysql_query("DELETE FROM tablesarrgs  WHERE idtables = '$newtablename'");

    mysql_query("DELETE FROM rowname  WHERE idtables = '$newtablename'");









    mysql_close($db);

   header('Location: ../table.php?id='.$fieldid);

?>





