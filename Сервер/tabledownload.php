<?php
mb_internal_encoding("UTF-8"); 

    setlocale(LC_ALL, 'ru_RU.UTF-8');

   	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    

    ini_set('display_errors',1);

    include("function.php");

    error_reporting(E_ALL);  





    // Адрес сервера MySQL 

    $dbhost = "localhost"; 

    // Имя пользователя базы данных 

    $dbuser = "u123347427_field"; 

    // и его пароль 

    $dbpass = "as210100"; 

    // Имя базы данных, на хостинге или локальной машине 

    $dbname = "u123347427_field"; 

    $db = @mysql_connect($dbhost, $dbuser, $dbpass); 

    if (!$db) { 

        	exit ("<P>Сервер базы данных не доступен</P>" ); 

    	} 

    	if (!@mysql_select_db($dbname, $db)) { 

        	exit( "<P>База данных $dbname не доступна</P>" ); 

    	}





    $idtable = $_GET['idtable'];

    $dom = new DOMDocument('1.0', 'UTF-8');



    $root = $dom->createElement("kml");

    $dom->appendChild($root);

    $Document = $dom->createElement("Document");


    $gettablename = mysql_query("SELECT * FROM tables WHERE id = '$idtable'");
    


    $getrownames = mysql_query("SELECT * FROM rowname WHERE idtables = '$idtable' ORDER BY row");

    $gettablenameargs = mysql_fetch_array($gettablename);

    $name = $dom->createElement("name", $gettablenameargs['nametable']);
    $Document->appendChild($name);


    while ($value = mysql_fetch_array($getrownames)) {


        $row  = $dom ->createElement("row");

        $namerow = $dom ->createElement("namerow", $value['namerow']);
        $row->appendChild($namerow);
        

        $rowcount = $value['row'];
        $gettable = mysql_query("SELECT * FROM tablesarrgs WHERE idtables = '$idtable' AND row = '$rowcount' ORDER BY id, row") or die(mysql_error());

        while ($getval = mysql_fetch_array($gettable)) {

            $item = $dom -> createElement("value", $getval['value']);



            $row->appendChild($item);
        }

        $Document->appendChild($row);
    }





    

    mysql_close($db);

    $root->appendChild($Document);

   header('Content-Description: File Transfer');

    header('Content-Type: text/plain');

    

    header('Content-Transfer-Encoding: binary');

    header('Expires: 0');

    header('Cache-Control: must-revalidate');

    header('Pragma: public');

    $dom->save("down/table.kml");

    header("Location: down/table.kml");

    ?>