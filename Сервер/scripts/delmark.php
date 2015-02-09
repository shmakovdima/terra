<?php

    $id = $_POST['id'];

    include("../function.php");
   $db = bdconnect();



    mysql_query("DELETE FROM marks  WHERE id = '$id' ");

    mysql_close($db);



    header('Location: ../admin.php');





?>



