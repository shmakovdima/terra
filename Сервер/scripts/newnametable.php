<?php
    $fieldid = $_POST['nnametableidfield'];
   $newtablename = $_POST['nnametable'];
   $nname = $_POST['nname'];
  

    include("../function.php");
   $db = bdconnect();

  

    mysql_query("UPDATE tables SET nametable = '$nname' WHERE id='$newtablename'") or die(mysql_error());




    mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);
?>

