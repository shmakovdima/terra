<?php


function bdconnect(){
     $dbhost = "mysql7.000webhost.com"; 
        // Имя пользователя базы данных 
        $dbuser = "a6980670_terfiel"; 
        // и его пароль 
        $dbpass = "as210100"; 
        // Имя базы данных, на хостинге или локальной машине 
    $dbname = "a6980670_terfiel"; 


    $db = @mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error()); 
    if (!$db) { 
        exit ("<P>Сервер базы данных не доступен</P>" ); 
    } 
    if (!@mysql_select_db($dbname, $db)) { 
        exit( "<P>База данных $dbname не доступна</P>" ); 
    }
	@mysql_query('set character_set_client="utf8"');
	@mysql_query('set character_set_results="utf8"');
	@mysql_query('set collation_connection="utf8_general_ci"');
    return $db;
}

function drowinadminalltotables() {
   

	$db = bdconnect();

    echo "<span class = 'noclick'>Поля:</span>";

    $getfieldname = mysql_query("SELECT * FROM levelarrgs WHERE idlevel=0") or die();

    //Блок вывода полей

    while ($val = mysql_fetch_array($getfieldname)) {
        echo "<span class = 'click' attr = '".$val['id']."'>".$val['name']."</span>";
    }

    $getfieldname = mysql_query("SELECT * FROM levelarrgs WHERE idlevel!=0 ORDER BY idlevel") or die();

    $dbidcur = "";
    while ($val = mysql_fetch_array($getfieldname)) {

        $idcur = $val['idlevel'];
        if ($dbidcur === ""){
            $dbidcur=$idcur;

            $getlevelname = mysql_query("SELECT * FROM level WHERE idlevel='$idcur'");
            while ($valname = mysql_fetch_array($getlevelname)){
                echo "<span class = 'noclick'>".$valname['namelevel']."</span>";
            }
        }
        if ($dbidcur!==$idcur)  {
            $dbidcur=$idcur;
            $getlevelname = mysql_query("SELECT * FROM level WHERE idlevel='$idcur'");
            while ($valname = mysql_fetch_array($getlevelname)){
                echo "<span class = 'noclick'>".$valname['namelevel']."</span>";
            }            
        }
        echo "<span class = 'click' attr = '".$val['id']."'>".$val['name']."</span>";

    }

    mysql_close($db);    
}





function drowsloi(){
   	$db = bdconnect();

    $searchitem=array();


    $getlevelname = mysql_query("SELECT * FROM level WHERE idlevel!='0'");

    while ($value = mysql_fetch_array($getlevelname)) {

      $curlevel = $value['namelevel'];
      $currentlayer  = $value['idlevel'];
     

      echo " $('.select_block_sloi').append('<span  clc = ".$currentlayer.">".$curlevel."</span>'); ";

      echo "
        $('.select_block_sloi span[clc = ".$currentlayer."]').click(function(){
            if ($(this).hasClass('nonactive')) {
                $(this).removeClass('nonactive');
            }else{
                $(this).addClass('nonactive');
            }


            $(this).parent().find('div').each(function(){
                if ($(this).attr('clc".$currentlayer."')!='') {
                    $(this).click();
                }
            });
        });
      ";
    }




     $get= mysql_query("SELECT * FROM levelarrgs WHERE idlevel != '0'") or die();


     $d=-1;



      while($value = mysql_fetch_array($get)) {


         $idlevel = $value['idlevel'];
         $d=$d+1;
          $str = $value['coords'];
           $str = substr($str,0,-2);
            $strarrray = explode(",",$str);
             $coordstr ="";

          for ($i=0;$i<(count($strarrray)); $i=$i+2){
            if ($coordstr ===""){
                
            }else{
                $coordstr.=",";
            }

            $coordstr.="[".str_replace(",", ".",(double)$strarrray[$i+1]).",".str_replace(",", ".", (double) $strarrray[$i])."]";

             
         }

         

         $it = '<div class="tableya">';
         $contr = '<table class ="contrlblock"><tr>';
         $table='<div class="tableya_item">';
         
         $curent ="-1";
         $id = $value['id'];
         $count = "0";
         $geta= mysql_query("SELECT * FROM tables WHERE idfield = '$id' ORDER BY idfield") or die();




         while($val = mysql_fetch_array($geta)) {
             $count=$count+1;
             $idcur = $val['id'];
             if ($count==1){
                  $contr.='<td class="contrl_item active" pre="'.$idcur.$count.'">'.$val['nametable'].'</td>';
             }else{
                 $contr.='<td class="contrl_item" pre="'.$idcur.$count.'">'.$val['nametable'].'</td>';   
             }



             if ($count==1){
                 $table.='<div class="active block"  pre = "'.$idcur.$count.'" >';
             }else{
                $table.='<div class="block" pre = "'.$idcur.$count.'">'; 
             }

             $getrownames = mysql_query("SELECT * FROM rowname WHERE idtables = '$idcur' ORDER BY row");
             $length = mysql_num_rows($getrownames);

             $table.= '<div class="rownames_block">';
             while ($rowvalue = mysql_fetch_array($getrownames)) {
                 $table.='<div class = "rowname" style = "width: '.str_replace(",", ".",(400/$length)).'px">'.$rowvalue['namerow'].'</div>';
             }

             $getarrgs = mysql_query("SELECT * FROM tablesarrgs WHERE idtables = '$idcur' ORDER BY id, row");


             while ($getvalarrgs = mysql_fetch_array($getarrgs)) {
                $table.='<div class = "tableval" style = "width: '.str_replace(",", ".",(400/$length)).'px">'.$getvalarrgs['value'].'</div>';  
             }



              


             $table.='</div>';
             $table.='</div>';



          
          }




           
         
         $table.='</div>';
         $contr.='</tr></table>';
         $it.=$contr.$table.'</div>';
        

         echo "
         
         // Создаем многоугольник, используя вспомогательный класс Polygon.
    var mySLOI".$d." = new ymaps.Polygon([
        // Указываем координаты вершин многоугольника.
        // Координаты вершин внешнего контура.
        [
            ".$coordstr."
        ]
    ], {
        // Описываем свойства геообъекта.
        // Содержимое балуна.
        balloonContentHeader: ' ".$value['name']."',
        balloonContentBody: 'Слой <br>".$value['description']." <br>".$it."'

    }, {
        // Задаем опции геообъекта.
        // Цвет заливки.
        fillColor: '".$value['colorfield']."',
        strokeColor: '".$value['colorline']."',
        // Ширина обводки.
        strokeWidth: 2,
        zIndex: '25'
    });
        
    $('.select_block_sloi').append('<div  clc".$idlevel." = ".$d.">".$value['name']."</div>');
         
     $('[clc".$idlevel." = ".$d."]').click(function(){

        if (!$(this).hasClass('nonactive')){
          $(this).addClass('nonactive');
           myMap.geoObjects.add(mySLOI".$d.");
          

        }else{
          $(this).removeClass('nonactive');
          myMap.geoObjects.remove(mySLOI".$d.");
        }

     });

    mySLOI".$d.".events.add('balloonopen', function (e) {
                 mySLOI".$d.".options.set({
                    fillColor: '#ffff00ff'
                });
                    
            });

        mySLOI".$d.".events.add('balloonclose', function (e) {
                 mySLOI".$d.".options.set({
                    fillColor: '".$value['colorfield']."'
                });
                    
        });

   


        


     
         
     

         ";
         
            
      }

    mysql_close($db);  
}


function drowfield(){

     $db = bdconnect();

    $searchitem=array();

     $get= mysql_query("SELECT * FROM levelarrgs WHERE idlevel = '0'") or die();
     $d=-1;
      while($value = mysql_fetch_array($get)) {
         $d=$d+1;
          $str = $value['coords'];
           $str = substr($str,0,-2);
            $strarrray = explode(",",$str);
             $coordstr ="";

          for ($i=0;$i<(count($strarrray)); $i=$i+2){
            if ($coordstr ===""){
                
            }else{
                $coordstr.=",";
            }

            $coordstr.="[".str_replace(",", ".",(double)$strarrray[$i+1]).",".str_replace(",", ".", (double) $strarrray[$i])."]";

             
         }

         

         $it = '<div class="tableya">';
         $contr = '<table class ="contrlblock"><tr>';
         $table='<div class="tableya_item">';
         
         $curent ="-1";
         $id = $value['id'];
         $count = "0";
         $geta= mysql_query("SELECT * FROM tables WHERE idfield = '$id' ORDER BY idfield") or die();




         while($val = mysql_fetch_array($geta)) {
             $count=$count+1;
             $idcur = $val['id'];
             if ($count==1){
                  $contr.='<td class="contrl_item active" pre="'.$idcur.$count.'">'.$val['nametable'].'</td>';
             }else{
                 $contr.='<td class="contrl_item" pre="'.$idcur.$count.'">'.$val['nametable'].'</td>';   
             }



             if ($count==1){
                 $table.='<div class="active block"  pre = "'.$idcur.$count.'" >';
             }else{
                $table.='<div class="block" pre = "'.$idcur.$count.'">'; 
             }

             $getrownames = mysql_query("SELECT * FROM rowname WHERE idtables = '$idcur' ORDER BY row");
             $length = mysql_num_rows($getrownames);

             $table.= '<div class="rownames_block">';
             while ($rowvalue = mysql_fetch_array($getrownames)) {
                 $table.='<div class = "rowname" style = "width: '.str_replace(",", ".",(400/$length)).'px">'.$rowvalue['namerow'].'</div>';
             }

             $getarrgs = mysql_query("SELECT * FROM tablesarrgs WHERE idtables = '$idcur' ORDER BY id, row");


             while ($getvalarrgs = mysql_fetch_array($getarrgs)) {
                $table.='<div class = "tableval" style = "width: '.str_replace(",", ".",(400/$length)).'px">'.$getvalarrgs['value'].'</div>';  
             }



              


             $table.='</div>';
             $table.='</div>';



          
          }




           
         
         $table.='</div>';
         $contr.='</tr></table>';
         $it.=$contr.$table.'</div>';
        

         echo "
         
         // Создаем многоугольник, используя вспомогательный класс Polygon.
    var myPolygon".$d." = new ymaps.Polygon([
        // Указываем координаты вершин многоугольника.
        // Координаты вершин внешнего контура.
        [
            ".$coordstr."
        ]
    ], {
        // Описываем свойства геообъекта.
        // Содержимое балуна.
        balloonContentHeader: ' ".$value['name']."',
        balloonContentBody: 'Поле <br>".$value['description']." <br>".$it."'

    }, {
        // Задаем опции геообъекта.
        // Цвет заливки.
        fillColor: '".$value['colorfield']."',
        strokeColor: '".$value['colorline']."',
        // Ширина обводки.
        strokeWidth: 2,
        zIndex: '10'
    });

   



     myMap.geoObjects.add(myPolygon".$d.");


     $('.select_block').append('<span  clc = ".$d.">".$value['name']."</span>');
     $('.search_hidden').append('<span  clchid = ".$d.">".$value['name']."</span>');
         
      $('[clchid = ".$d."]').click(function(){
            myPolygon".$d.".balloon.open({
                autoPanCheckZoomRange: true
            });
      });

        myPolygon".$d.".events.add('balloonopen', function (e) {
                 myPolygon".$d.".options.set({
                    fillColor: '#ff0000ff'
                });
                    
            });

        myPolygon".$d.".events.add('balloonclose', function (e) {
                 myPolygon".$d.".options.set({
                    fillColor: '".$value['colorfield']."'
                });
                    
        });

           
     $('[clc = ".$d."]').click(function(){

        if (!$(this).hasClass('nonactive')){
          $(this).addClass('nonactive');
          myMap.geoObjects.remove(myPolygon".$d.");

        }else{
          $(this).removeClass('nonactive');
          myMap.geoObjects.add(myPolygon".$d.");
        

        }

     });

        
   

    

         ";
         
            
      }

    mysql_close($db);   
}







function drowmark(){

     $db = bdconnect();



     $get= mysql_query("SELECT * FROM marks") or die();

     $d=-1;



     while($value = mysql_fetch_array($get)) {

         $d=$d+1;  



         echo "

            var myPlacemark".$d." = new ymaps.Placemark(

            

            [".$value['shir'].", ".$value['dol']."], {

                balloonContentHeader: ' ".$value['name']."',

                balloonContent: 'Метка' 

            } , { 

                present:'islands#circleDotIcon',
                zIndex: '25',

                iconColor: '".$value['color']."'}       

            );

 

            // Добавление метки на карту

            myMap.geoObjects.add(myPlacemark".$d.");



            

         

         ";

     }





     





     mysql_close($db);

}



function drowroad(){



 $db = bdconnect();



     $get= mysql_query("SELECT * FROM roads") or die();

     $d=-1;

     while($value = mysql_fetch_array($get)) {

         $d=$d+1;



         $str = $value['coords'];

         $str = substr($str,0,-2);

        // $str = str_replace(",",".", $str);



         $strarrray = explode(",",$str);





         



         $coordstr ="";

         for ($i=0;$i<(count($strarrray)); $i=$i+2){

            if ($coordstr ===""){

                

            }else{

                $coordstr.=",";

            }



            $coordstr.="[ ".str_replace(",", ".", (double)$strarrray[$i+1]).", ".str_replace(",", ".", (double) $strarrray[$i])."]";



             

         }



         echo "

          var myPolyline".$d." = new ymaps.Polyline([

           



            ".$coordstr."

              ], {

            // Описываем свойства геообъекта.

            // Содержимое балуна.

            balloonContentHeader: ' ".$value['name']."',

            balloonContent: 'Дорога'

        }, {

            // Задаем опции геообъекта.

            // Отключаем кнопку закрытия балуна.

            balloonCloseButton: false,

            // Цвет линии.

            strokeColor: '".$value['colorline']."',

            // Ширина линии.

            strokeWidth: ".$value['linewidth'].",

            // Коэффициент прозрачности.

            strokeOpacity: 1,
            zIndex: '20'

        });



        myMap.geoObjects.add(myPolyline".$d.");


           

        ";



     

           

     }



    









        mysql_close($db);

}







	



	function drowadmin(){

   	    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

    

    	$db = bdconnect();



    	$getfieldname = mysql_query("SELECT * FROM level WHERE idlevel=0") or die();





    	//Блок вывода полей

    	while ($val = mysql_fetch_array($getfieldname)) {

    		 echo "<div id = '".$val['idlevel']."'>";

    		 echo "<h2>".$val['namelevel']."</h2>";
             echo '<div class="addnewstablestoall" title="Создать общую таблицу">+ Общая таблица</div>';
    		 echo '

    		  <table class="fields">

                <thead>

                     <tr>

                        <td>

                            Название

                        </td>
                         <td>

                            Описание

                        </td>

                        

                        <td>

                            Цвет линии

                        </td>



                        <td>

                            Цвет поля

                        </td>



                        <td class="short">



                        </td>

                        <td class="short">



                        </td>

                    </tr>

                </thead>

                <tbody>

                    <tr>

    		 ';

    		 $idlevel = $val['idlevel'];

    		 $getfieldarrgs = mysql_query("SELECT * FROM levelarrgs WHERE idlevel='$idlevel'") or die();



    		 while ($valfield = mysql_fetch_array($getfieldarrgs)){

    		 	 echo "

            	<tr>

                <td class='id'>".$valfield['id']."</td>

                <td class='name' contenteditable title='Нажмите и введите для изменения'>".$valfield['name']."</td>

                <td title='Нажмите и введите для изменения' class='desc' contenteditable>".$valfield['description']."</td>

                <td title='Нажмите и введите для изменения' class='colorline' contenteditable>".$valfield['colorline']."</td>

                <td title='Нажмите и введите для изменения' class='colorfield' contenteditable>".$valfield['colorfield']."</td>

                        <td class='short table' title='Просмотреть таблицы поля'>

                        </td>

                        <td class='short delete' title='Удалить поле'>

                        </td>

            	</tr>

        

        		";

    		 }

    		 echo '

    		 	     </tr>



                    

                </tbody>

            </table>

    		 ';

    		 echo "</div>";


    	}



    	//Дороги

    	$getroads= mysql_query("SELECT * FROM roads") or die();

    	echo '

    		<h2>Дороги</h2>

            <table class="roads" id = "roads">

                <thead>

                    <tr>

                        <td>

                            Название

                        </td>

                        <td>

                            Цвет линии

                        </td>

                        <td>

                            Ширина

                        </td>



                        <td class="short">



                        </td>

                    </tr>



                </thead>

                <tbody>

    	';



    	while ($valroad=mysql_fetch_array($getroads)) {

    		 echo "

            <tr>

                <td class='id' contenteditable title='Нажмите и введите для изменения'>".$valroad['id']."</td>

                <td class='name' contenteditable title='Нажмите и введите для изменения'>".$valroad['name']."</td>

                <td class='colorline' contenteditable title='Нажмите и введите для изменения'>".$valroad['colorline']."</td>

                <td class='colorfield' contenteditable title='Нажмите и введите для изменения'>".$valroad['linewidth']."</td>



                        <td class='short delete' title='Удалить дорогу'>

                        </td>

            </tr>

        

        ";

       	}



       	echo '   </tbody>

            </table>';



        //Метки



        echo ' 



        <h2>Метки</h2>

        <table class="marks" id = marks>

                <thead>

                    <tr>

                        <td>

                           Название

                        </td>

                         <td>

                           Широта

                        </td>

                         <td>

                           Долгота

                        </td>

                        <td>

                            Цвет метки

                        </td>

                       



                        <td class="short add" title="Добавить метку">



                        </td>

                       

                    </tr>

                </thead>

                <tbody>

        ';

        $getmarks = mysql_query("SELECT * FROM marks") or die();

        while($valuemark = mysql_fetch_array($getmarks)) {

        echo "

            <tr>

                <td class='id'>".$valuemark['id']."</td>

                <td class='name' contenteditable title='Нажмите и введите для изменения'>".$valuemark['name']."</td>

                <td class='shir' contenteditable title='Нажмите и введите для изменения'>".$valuemark['shir']."</td>

                <td class='dol' contenteditable title='Нажмите и введите для изменения'>".$valuemark['dol']."</td>

                <td class='colorline' contenteditable title='Нажмите и введите для изменения'>".$valuemark['color']."</td>

                <td class='short delete' title='Удалить метку'>

                </td>

            </tr>

        

        ";

     }



        echo ' </tbody>

            </table>';





        //Вывод слоев



            echo '<div class="addnewsloi" title="Создать новый слой">+ Новый слой</div>';

        $getfieldname = mysql_query("SELECT * FROM level WHERE idlevel<>'0'") or die();



    	while ($val = mysql_fetch_array($getfieldname)) {

    		 echo "<div class='sloi' id = '".$val['idlevel']."'>";

    		 echo "<h2> Слой: ".$val['namelevel']."</h2>

    		  <div class='center center_admin'>

                     <div class='del' idtable =".$val['idlevel']." title='Удалить слой'></div>

                     <div class='edit' idtable =".$val['idlevel']." title='Изменить название слоя'></div>


              </div>

    		 ";



    		 echo '<button class="download upfile sloibutton" title="Загрузить файл слоя в формате kml">

                    Загрузить KML слоя

            </button>

            <button class="download downfile sloibutton" title="Скачать файл слоя в формате kml">

                    Скачать KML слоя

            </button>';



    		 echo '

    		  <table class="fields">

                <thead>

                     <tr>

                        <td>

                            Название

                        </td>

                        

                        <td>

                            Цвет линии

                        </td>



                        <td>

                            Цвет слоя

                        </td>



                        <td class="short">



                        </td>

                        <td class="short">



                        </td>

                    </tr>

                </thead>

                <tbody>

                    <tr>

    		 ';

    		 $idlevel = $val['idlevel'];

    		 $getfieldarrgs = mysql_query("SELECT * FROM levelarrgs WHERE idlevel='$idlevel'") or die();



    		 while ($valfield = mysql_fetch_array($getfieldarrgs)){

    		 	 echo "

            	<tr>

                <td class='id'>".$valfield['id']."</td>

                <td class='name' contenteditable title='Нажмите и введите для изменения'>".$valfield['name']."</td>

                <td class='colorline' contenteditable title='Нажмите и введите для изменения'>".$valfield['colorline']."</td>

                <td class='colorfield' contenteditable title='Нажмите и введите для изменения'>".$valfield['colorfield']."</td>

                        <td class='short table' title='Просмотреть таблицы слоя'>

                        </td>

                        <td class='short delete' title='Удалить элемент слоя'>

                        </td>

            	</tr>

        

        		";

    		 }

    		 echo '

    		 	     </tr>



                    

                </tbody>

            </table>

    		 ';

    		 echo "</div>";

    	}



        mysql_close($db);

	}




function drowtables($id) {



  $db = bdconnect();
    echo '  <div class="container">

             

            <div class="admin_h1">

                <h1>';

    $result = mysql_query("SELECT * FROM levelarrgs WHERE id = '$id'");

    $res= mysql_fetch_array($result);
    $idlevel = $res['idlevel'];
    if ($idlevel==="0"){
        echo "Поле: ".$res['name'];
    }else{
        
        $result = mysql_query("SELECT * FROM level WHERE idlevel = '$idlevel'");
        $res1 = mysql_fetch_array($result);

        echo 'Объект слоя '.$res1['namelevel'].': '.$res['name'];
    }



    echo          '</h1>

            </div>

            <button class="newtable" title="Создать таблицу">

                    Новая таблица

            </button>

             <span class="back"><a href="fields-admin.php" title="Вернуться к панели администратора">Назад</a></span>';


    $get= mysql_query("SELECT * FROM tables WHERE idfield = '$id'") or die();  

    while($value = mysql_fetch_array($get)) {

          $idtable = $value['id'];

          $names = $value['nametable']; 
          echo '

                  <div class="nametable">

                  <h2 idt = "'.$idtable.'" class="tabletd">'.$names.'

                </h2>

                 <div class="center">

                     <div class="del" idtable ='.$idtable.' title ="Удалить таблицу"></div>

                     <div class="edit" idtable ='.$idtable.' title ="Переименовать таблицу"></div>
                                 <div class="compare">
                                    <a href = "compare.php?idtable='.$idtable.'&rowcategory=0&idfield='.$id.'&sort=min" title ="Сравнить"></a>
                                 </div>

                 </div>

                <button class="download upfile tablesbutton" idtable = "'.$idtable.'" title = "Загрузить XML фаил таблицы">

                    Загрузить XML таблицы

                </button>

                <button class="download downfile tablesbutton" idtable = "'.$idtable.'" title = "Скачать XML фаил таблицы">

                    Скачать XML таблицы

                </button>    

             </div>

          ';



          echo 

          '

              <table class="tables">

                <thead>

                    <tr>';

          $getrow = mysql_query("SELECT * FROM rowname WHERE idtables = '$idtable'  ORDER BY ROW");



          while ($valuerow = mysql_fetch_array($getrow)) {

              echo "

                <td class='tabletd'>

                ".$valuerow['namerow']."

                </td>

              ";

          }

                        

                       





                     

            echo '  <td class="short tableadd" idtable = "'.$idtable.' title="Добавить строку в таблицу">



                        </td>

                       

                    </tr>

                

                    ';

                  

            $getarrgs = mysql_query("SELECT * FROM rowname WHERE idtables = '$idtable' ORDER BY ROW");

            $count_pets = mysql_num_rows($getarrgs );



            if ($count_pets<2) {

                 echo "<td>

                    <div class='editrow single' idtable = '".$idtable."' title = 'Переименовать колонку'></div>

                

                </td>";

            }else {

                while ($val = mysql_fetch_array($getarrgs)) {

                    $row= $val['row'];

                echo "<td>

                    <div class='editrow' idtable = '".$idtable."' row = '".$row."' title = 'Переименовать колонку'></div>

                    <div class='delrow' idtable = '".$idtable."' row = '".$row."' title = 'Удалить колонку'></div>

                

                </td>";

                }

            

            }



            echo '<td class="short ">



                        </td>';

            

            





                  echo '

                  </thead>

                <tbody>';
                $getarrgs = mysql_query("SELECT * FROM tablesarrgs WHERE idtables='$idtable' ORDER BY id, row");
                echo "<tr>";

                $br = "";

                while ($value = mysql_fetch_array($getarrgs)) {

                    $idthis = $value['id'];

                    $row = $value['row'];

                    $val = $value['value'];

                    if ($br===""){

                        $br = $idthis;

                    }

                    if ($idthis!==$br){

                        $br = $idthis;

                        echo "<td idthis = ".$br." class ='short delete' title = 'Удалить строку'></td></tr><tr>";

                    }

                    echo '<td contenteditable title="Нажмите и введите для изменения" idthis = "'.$br.'" row = "'.$row.'">'.$val.'</td>';

                }



                if ($br===""){

                    echo '</tr>';

                }else{

                    echo '<td idthis = '.$br.' class ="short delete" title = "Удалить строку"></td></tr>';

                }

                

            echo '    </tbody>

            </table>





            <div class = "newcolon" idtable = "'.$idtable.'" title="Создать новую колонку">Новая колонка</div>

          '

          ;



     }  



    mysql_close($db);

}





function kmlparse($file, $idlevel){

    $contents = file_get_contents($file);



    $xml  = new SimpleXMLElement($contents); 

    

    $arrayfields = array();

    $arrayroad = array();



    foreach ($xml->Document->Placemark as $item) {

        $name="";

        $name = (string) $item->name; 

        $name= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$name);

        $polly="";  

        $type = "";

        $polly = (string) $item->Polygon->outerBoundaryIs->LinearRing->coordinates;

        $polly= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$polly);

        

        if ($polly===""){

            $polly="";

            $polly = (string) $item->LineString->coordinates;

            $polly= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$polly);

            $colorline = (string) $item->Style->LineStyle->color;

            $colorline= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$colorline);

            $linewidth = (string) $item->Style->LineStyle->width;

            $linewidth= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$linewidth);

            if ($polly!==""){

                array_push($arrayroad, array($name, $polly, $colorline,$linewidth));   

            }

            

        }else{



            $colorline=""; $colorfield="";



            $colorline = (string) $item->Style->LineStyle->color;

            $colorline= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$colorline);

            $colorfield = (string) $item->Style->PolyStyle->color;

            $colorfield= preg_replace('/(?<!=\>)[\s]+(?!=\<)/Us','',$colorfield);

            $desc = (string) $item->description;

             

            array_push($arrayfields, array($name,$polly, $colorline,$colorfield ));           

        }   

    }





    $db = bdconnect();







    foreach ($arrayfields as $value) {

        $name = $value[0];

        $coords = $value[1];



        



      



        $colorline = $value[2];



       



        if (strlen($colorline)==8){

            $colorline[7]="b";

            $colorline[6]="b";

        }

        





        $colorfields = $value[3];



        



        if (strlen($colorfields)==8){

            $colorfields[7]="9";

            $colorfields[6]="9";

        }







        $exists = mysql_query("SELECT * FROM levelarrgs WHERE name = '$name' AND idlevel = '$idlevel'");

        $exists = mysql_fetch_array($exists);

        if ($exists["name"]===$name){



            $id=$exists["id"];

            mysql_query("UPDATE levelarrgs SET coords='$coords', colorline='$colorline', colorfield = '$colorfields', description = '$desc' WHERE id = '$id' ");

        }else{



            $max=mysql_query("SELECT MAX(id) as id FROM levelarrgs");

            $max = mysql_fetch_array($max);

            $id=$max['id']+1;

            

            mysql_query("INSERT INTO levelarrgs (id,idlevel,name,coords,colorline,colorfield,description) VALUES('$id','$idlevel','$name','$coords','$colorline','$colorfields', '$desc')") or die(mysql_error());

        }      

    }



       foreach ($arrayroad as $value) {



           

        $name = $value[0];

        $coords = $value[1];

        $colorline = $value[2];

        $linewidth = $value[3];



    



        if (strlen($colorline)==8){

            $colorline[7]="f";

            $colorline[6]="f";

        }



 



        $exists = mysql_query("SELECT * FROM roads WHERE name = '$name'");

        $exists = mysql_fetch_array($exists);

        if ($exists["name"]===$name){

            $id=$exists["id"];

            mysql_query("UPDATE roads SET coords='$coords', colorline='$colorline', linewidth = '$linewidth' WHERE id = '$id' ");

        }else{



            $max=mysql_query("SELECT MAX(id) as id FROM roads");

            $max = mysql_fetch_array($max);

            $id=$max['id']+1;

            

            mysql_query("INSERT INTO roads (id,name,coords,colorline,linewidth) VALUES('$id','$name','$coords','$colorline','$linewidth')") or die(mysql_error());

        }      

    }



    mysql_close($db);

 }



 function sms_translit($str) 

    {

        $translit = array(

            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",

            "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",

            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",

            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",

            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",

            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",

            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",

            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",

            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",

            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",

            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",

            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",

            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"

        );

        return strtr($str,$translit);

    }



?>



