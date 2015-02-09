<?php

    $id = $_POST['id'];

    $name = $_POST['name'];

    $shir = $_POST['shir'];

    $dol = $_POST['dol'];

    $colorline = $_POST['colorline'];

        // Адрес сервера MySQL 
include("../function.php");
   $db = bdconnect();



   mysql_query("UPDATE marks SET name='$name', shir ='$shir', dol = '$dol' ,color='$colorline' WHERE id = '$id' ");

    mysql_close($db);



    header('Location: ../admin.php');





?>



