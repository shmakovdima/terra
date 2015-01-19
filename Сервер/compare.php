<?php
	$idtable = $_GET['idtable'];
	$rowtocategorize = $_GET['rowcategory'];
	$idfield = $_GET['idfield'];
	$sort = $_GET['sort'];


	  mb_internal_encoding("UTF-8"); 

    setlocale(LC_ALL, 'ru_RU.UTF-8');

    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    ini_set('display_errors',1);

    error_reporting(E_ALL);  

    include("function.php");

    include("html/compare.html");





function drowcompare($idtable, $rowtocategorize, $idfield, $sort){

    ini_set('display_errors',1);

    error_reporting(E_ALL);

    setlocale(LC_ALL, 'ru_RU.UTF-8');

    mb_internal_encoding("UTF-8"); 

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

    $result = mysql_query("SELECT * FROM tables WHERE id = '$idtable'");
    $res = mysql_fetch_array($result);
    $tablename = $res['nametable'];

    $result = mysql_query("SELECT * FROM tables WHERE nametable='$tablename'");
    

    $getid = "";



    while ($idres= mysql_fetch_array($result)) {
        $idcur = $idres['id'];
        if ($getid==""){
            $getid="idtables=".$idcur;
        }else{
            $getid=$getid." OR idtables=".$idcur;
        }
    }


    $gedidtotables = str_replace("idtables", "id", $getid);







    echo '  <div class="container">
            <span class="back"><a href="table.php?id='.$idfield.'">Назад</a></span>
             

            <div class="admin_h1">

                <h1 class="compare">';
                echo "Сравнение таблицы ".$tablename;
    echo '</h1>

    </div>';

    echo '<table class="comparetable">
            <thead>
                <tr>
                    <td>Переменная</td>
                    <td>Поле или объект слоя</td>';

$getrowname = mysql_query("SELECT DISTINCT value, id FROM tablesarrgs WHERE ".$getid." ORDER BY id, row"); 
$arrayofrowname = array("показатель","год");

$id = "";
$count = 0;
while ($value = mysql_fetch_array($getrowname)) {
    $idcur = $value['id'];
    if ($id =="") {
        $id = $idcur;
        echo "<td>".$value['value']."</td>";

        $count++;
        array_push($arrayofrowname, $value['value']);
    }
    if ($id!==$idcur){
        $id = $idcur;

        if  (!in_array($value['value'], $arrayofrowname)){
            echo "<td>".$value['value']."</td>";
            $count++;
            array_push($arrayofrowname, $value['value']);
        }

                
    }
   
    

}



$count = $count+2;

$globalcount = $count;


    echo "</tr><tr>";
    for ($i=0; $i<$count; $i++){
     
            echo "<td>
                <div class='up' >
                	<a href = 'compare.php?idtable=".$idtable."&rowcategory=".$i."&idfield=".$idfield."&sort=min' title='Отсортировать по убыванию'></a> 
                </div>
                <div class='down' >
                <a href = 'compare.php?idtable=".$idtable."&rowcategory=".$i."&idfield=".$idfield."&sort=max' title='Отсортировать по возрастанию'></a>
                </div>
            </td>";
        
    }




echo         '        </tr>


                </thead>
                <tbody>
    ';

 $gettables = mysql_query("SELECT * FROM tables WHERE ".$gedidtotables." ORDER BY id") OR die(mysql_error());




$arraytosort = array();
while ($valters = mysql_fetch_array($gettables)) {
	$idthis =  $valters['id'];
	$idfieldthis = $valters['idfield'];

	$namelevelres = mysql_query("SELECT * FROM levelarrgs WHERE id='$idfieldthis'");

	$namelevelresres = mysql_fetch_array($namelevelres);



	$fieldname = $namelevelresres['name'];




	$getrow = mysql_query("SELECT * FROM rowname WHERE idtables='$idthis' ORDER BY  row") OR die(mysql_error());

	$block = "";
	while ($value = mysql_fetch_array($getrow)) {
		if ($block===""){
			$block = "block";
			$minrow = $value['row'];
		}
		else{


			$arraythis = array();
			$arraythis = array($value['namerow'], $fieldname);
			
			for ($i=2; $i<$globalcount; $i++) {
				array_push($arraythis, "");
			}

			$row =$value['row'];
			$get = mysql_query("SELECT * FROM tablesarrgs WHERE idtables='$idthis' AND row = '$row' ORDER BY id, row") OR die(mysql_error());

			$valcur="";
			while ($val = mysql_fetch_array($get)){
				$valcur = $val['value'];
				$idcur = $val['id'];


				$getminvalrow = mysql_query("SELECT * FROM tablesarrgs WHERE id = '$idcur' and row = '$minrow' ") OR die(mysql_error());
				$getminvalrowres = mysql_fetch_array($getminvalrow);
				$minval =  $getminvalrowres['value'];


				$key = array_search($minval, $arrayofrowname);

				$arraythis[$key] = $valcur;

			}

			if ($valcur!=="") {
				array_push($arraytosort, $arraythis);	
			}
			
			

			

		}



		
	}


	


	




}


if ($sort == "max") {
		$arraysort = sortmax($arraytosort, $rowtocategorize);


		$count = count($arraysort);
		for ($i = 0; $i<$count; $i++) {
			echo "<tr>";
				for ($j = 0; $j<$globalcount; $j++) {
					echo "<td>".$arraysort[$i][$j]."</td>";
				}

			echo "</tr>";
		}

}else{
		$arraysort = sortmin($arraytosort, $rowtocategorize);

		$count = count($arraysort);

		for ($i = $count-1; $i>=0; $i--) {
			echo "<tr>";
				for ($j = 0; $j<$globalcount; $j++) {
					echo "<td>".$arraysort[$i][$j]."</td>";
				}

			echo "</tr>";
		}

}







    echo '</tbody></table></div>';


    mysql_close($db);
}



function sortmin($arraytosort, $by){

	$arraytosort =  sortmax($arraytosort, $by);

	$count = count($arraytosort);


	$arrayfin = $arraytosort;
	

	


	


	return $arrayfin;
}

function sortmax($array, $by) {
    $result = array();
    foreach ($array as $val) {
        if (!is_array($val) || !key_exists($by, $val)) {
            continue;
        }
        end($result);
        $current = current($result);
        while ($current[$by] > $val[$by]) {
            $result[key($result)+1] = $current;
            prev($result);
            $current = current($result);
        }
        $result[key($result)+1] = $val;
    }

    $arraytosort = $result;
    $count = count($arraytosort);
    $arraytemp = array();

    $result = array();
    	for ($i = 1; $i <=$count; $i++) {
		$arraytemp[$i-1] = $arraytosort[$i];
	}

	$result = $arraytemp;
    return $result;
}

?>