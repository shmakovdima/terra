<?php

    mb_internal_encoding("UTF-8"); 

    setlocale(LC_ALL, 'ru_RU.UTF-8');

    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    ini_set('display_errors',1);

    error_reporting(E_ALL);  

    include("function.php");

    include("html/admin.html");

    

?>

