<?php

    include("../function.php");
   $db = bdconnect();

    mysql_query("DELETE FROM levelarrgs  WHERE id = '$id' ");
    mysql_close($db);

    header('Location: ../admin.php');


?>

