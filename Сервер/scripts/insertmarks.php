<?php
   
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 
    $name = $_POST['name'];
    $shir = $_POST['shir'];
    $dol = $_POST['dol'];
    $colorline = $_POST['markinsertcolor'];
    $width = "1";
   
    include("../function.php");
   $db = bdconnect();

   
    $max=mysql_query("SELECT MAX(id) as id FROM marks");
    $max = mysql_fetch_array($max);
    $id=$max['id']+1;
            
    mysql_query("INSERT INTO marks (id,name,shir,dol,color, width) VALUES('$id','$name','$shir','$dol','$colorline', '$width')") or die(mysql_error());
    


   
    mysql_close($db);

    header('Location: ../admin.php');


?>


