<?php

  $dir="files/";

  $files = scandir($dir);

  foreach($files as $file) {

      unlink($dir.$file);

  }





  $idlevel = $_POST['levelid'];

  $allowed = array('kml');



	if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){



	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

 

    if(!in_array(strtolower($extension), $allowed)){

        echo '{"status":"error"}';

        exit;

    }







	if(move_uploaded_file($_FILES['upl']['tmp_name'], $dir.$_FILES['upl']['name'])){



        include("function.php");

 

        $files = scandir($dir);

        $skip = array('.', '..',".DS_Store","Thumbs.db",".temp");

        foreach($files as $file) {

        if(!in_array($file, $skip)) {



         $path =  (string) $dir.$file;

         
           xmlparse($path, $idlevel);

        

            unlink($path);

      }

    

            

      }

       

        echo '{"status":"success"}';

		exit;

	}

}



		echo '{"status":"error"}';

		exit;
 















function xmlparse($file, $idlevel) {


	





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


	$contents = file_get_contents($file);


    $xml  = new SimpleXMLElement($contents);

    mysql_query("DELETE  FROM tablesarrgs WHERE idtables = '$idlevel'") or die(mysql_error());


    mysql_query("DELETE FROM rowname WHERE idtables = '$idlevel'") or die(mysql_error());

    $nametable = $xml->Document->name;

    echo $nametable;

    mysql_query("UPDATE tables SET nametable = '$nametable'  WHERE id = '$idlevel'") or die(mysql_error()); 


    $max= mysql_query("SELECT MAX(id) as id FROM tablesarrgs");
    $max = mysql_fetch_array($max);
    $idmax=$max['id']+1;

     $row = 0;
     foreach ($xml->Document->row as $item) {

        $name="";

        $namerow = (string) $item->namerow; 

        

        mysql_query("INSERT INTO rowname (idtables,row, namerow) VALUES ('$idlevel','$row','$namerow')") or die(mysql_error());

        $i = $idmax;
        foreach ($item->value as $value) {
        	mysql_query("INSERT INTO tablesarrgs (id, idtables, row, value) VALUES ('$i','$idlevel','$row','$value')") or die(mysql_error());
            $i++;
        }



        $row++;
	} 


	mysql_close($db);
}

?>