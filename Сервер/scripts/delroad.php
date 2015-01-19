<?php

    mb_internal_encoding("UTF-8"); 

 setlocale(LC_ALL, 'ru_RU.UTF-8');

    $id = $_POST['id'];

    include("../function.php");
   $db = bdconnect();



    mysql_query("DELETE FROM roads  WHERE id = '$id' ");

    mysql_close($db);



    header('Location: ../admin.php');





?>



