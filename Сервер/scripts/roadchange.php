<?php

    $id = $_POST['id'];

    $name = $_POST['name'];

    $colorline = $_POST['colorline'];

    $linewidth = $_POST['linewidth'];

        // Адрес сервера MySQL 
include("../function.php");
   $db = bdconnect();



   mysql_query("UPDATE roads SET name='$name', colorline='$colorline', linewidth = '$linewidth' WHERE id = '$id' ");

    mysql_close($db);



    header('Location: ../admin.php');





?>



