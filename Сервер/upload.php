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
         kmlparse($path, $idlevel);
        
            unlink($path);
      }
    
            
      }
       
        echo '{"status":"success"}';
		exit;
	}
}

		echo '{"status":"error"}';
		exit;
?>

