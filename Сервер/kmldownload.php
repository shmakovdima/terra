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





    $idlevel = $_GET['idlevel'];

	

	$dom = new DOMDocument('1.0', 'UTF-8');



	$root = $dom->createElement("kml");

	$dom->appendChild($root);

	$Document = $dom->createElement("Document");







	if ($idlevel==="0"){

		$namedocument = $dom->createElement("name", "Поля, дороги и метки");



	}else{

		$getfieldname = mysql_query("SELECT * FROM level WHERE idlevel='$idlevel'") or die();

		$val = mysql_fetch_array($getfieldname);



		$sloyname= $val['namelevel'];

		$namedocument = $dom->createElement("name", "Слой ".$sloyname);

	}

	$Document->appendChild($namedocument);

	

	$getfieldname = mysql_query("SELECT * FROM levelarrgs WHERE idlevel='$idlevel'") or die();

	

	while ($val = mysql_fetch_array($getfieldname)) {



		$Placemark = $dom->createElement("Placemark");



		$namefield = $dom->createElement("name", $val['name']);



		$description = $dom->createElement("description", $val['description']);

		$description->setAttribute('addr','0');

		$description->setAttribute('ride_begin','0');

		$description->setAttribute('ride_end','0');



		

		//Цвет

		$Style = $dom->createElement("Style");



		$LineStyle = $dom->createElement("LineStyle");

		$Colorline = $dom->createElement("color", $val['colorline']);

		$LineStyle->appendChild($Colorline);



		$PolyStyle = $dom->createElement("PolyStyle");

		$Colorfield = $dom->createElement("color", $val['colorfield']);

		$PolyStyle->appendChild($Colorfield);



		$Style->appendChild($LineStyle);

		$Style->appendChild($PolyStyle);



		//вывод поля



		$Polygon = $dom -> createElement("Polygon");

		$outerBoundaryIs = $dom->createElement("outerBoundaryIs");

		$LinearRing = $dom->createElement("LinearRing");

		$coordinates =$dom ->createElement("coordinates", $val['coords']);





		$LinearRing->appendChild($coordinates);

		$outerBoundaryIs->appendChild($LinearRing);

		$Polygon ->appendChild($outerBoundaryIs);



		//вывод всего

		$Placemark->appendChild($namefield);

		$Placemark->appendChild($description);

		$Placemark->appendChild($Style);

		$Placemark->appendChild($Polygon);

		$Document -> appendChild($Placemark);

	}

	

	if ($idlevel==="0") {

		$getroad = mysql_query("SELECT * FROM roads") or die();

	

		while ($val = mysql_fetch_array($getroad)) {

		$Placemark = $dom->createElement("Placemark");



		$nameroad = $dom->createElement("name", $val['name']);



		$description = $dom->createElement("description");

		$description->setAttribute('addr','0');

		$description->setAttribute('ride_begin','0');

		$description->setAttribute('ride_end','0');



		

		//Цвет

		$Style = $dom->createElement("Style");



		$LineStyle = $dom->createElement("LineStyle");

		$Colorline = $dom->createElement("color", $val['colorline']);

		$Linewidth = $dom->createElement("width", $val['linewidth']);

		$LineStyle->appendChild($Colorline);

		$LineStyle->appendChild($Linewidth);



		



		$Style->appendChild($LineStyle);

		



		//вывод поля



		$LineString = $dom -> createElement("LineString");

		$coordinates =$dom ->createElement("coordinates", $val['coords']);





		

		$LineString ->appendChild($coordinates);



		//вывод всего

		$Placemark->appendChild($nameroad);

		$Placemark->appendChild($description);

		$Placemark->appendChild($Style);

		$Placemark->appendChild($LineString);

		$Document -> appendChild($Placemark);



		}





	}	





	mysql_close($db);

	$root->appendChild($Document);

	header('Content-Description: File Transfer');

    header('Content-Type: text/plain');

    

    header('Content-Transfer-Encoding: binary');

    header('Expires: 0');

    header('Cache-Control: must-revalidate');

    header('Pragma: public');



	if ($idlevel==="0"){

		$dom->save("down/Polya i dorogi.kml");

		file_put_contents("down/Polya i dorogi.kml","\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", FILE_APPEND);

    	header("Location: down/Polya i dorogi.kml");



	}else{

		$dom->save("down/Sloy ".sms_translit($sloyname).".kml");

		file_put_contents("down/Sloy ".sms_translit($sloyname).".kml","\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nEOF", FILE_APPEND);

		header("Location: down/Sloy ".sms_translit($sloyname).".kml");

	}

	

	

































