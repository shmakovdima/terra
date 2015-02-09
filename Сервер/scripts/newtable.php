<?php

  ini_set('display_errors',1);
    error_reporting(E_ALL);
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding("UTF-8"); 
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';


   $fieldid = $_POST['newnametableidfield'];
   $newtablename = $_POST['newnametable'];
   $rowcount = $_POST['newrowcount'];
   $newnametablerowname = $_POST['newrowname'];


     include("../function.php");
   $db = bdconnect();
   
     echo $rowcount." ";
     echo $fieldid." ";
     echo $rowcount." ";
     echo $newnametablerowname." ";

    $max= mysql_query("SELECT MAX(id) as id FROM tables");
    $max = mysql_fetch_array($max);
    $id=$max['id']+1;
  

    mysql_query("INSERT INTO tables (id,idfield,nametable, rowcount ) VALUES('$id','$fieldid','$newtablename', '$rowcount')") or die(mysql_error());

    $newnametablerownamearr = explode(" ",$newnametablerowname);

    print_r($newnametablerownamearr);

    for ($i = 0; $i <$rowcount; $i++) {

      $namerow = $newnametablerownamearr[$i];
      mysql_query("INSERT INTO rowname (idtables, row, namerow) VALUES ('$id', '$i', '$namerow')") or die(mysql_error());
    }    
    
  
   


   mysql_close($db);
   header('Location: ../table.php?id='.$fieldid);


?>


