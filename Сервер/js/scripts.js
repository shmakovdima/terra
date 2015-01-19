$(document).ready(function () {

    $(".variants span.click").click(function(){
        if ($(this).hasClass("nonactive")) {
            $(this).removeClass('nonactive');
        }else{
            $(this).addClass('nonactive');
        }      
    });

    $(".variants span.select_all").click(function(){
        if ($(this).hasClass("nonactive")) {
            $(this).removeClass('nonactive');
            $(".variants span.click").removeClass('nonactive');
        }else{
            $(this).addClass('nonactive');
            $(".variants span.click").addClass('nonactive');
        }
    });

   

    $(".addnewstablestoall").click(function(){
        shownewtable();
    });

    $(".search_block button").click(function(){
        var text = $("#search").val();
        $(".search_hidden").find("span").each(function(){
            if ($(this).text()==text){
                $(this).click();
            }
        });
    });

    $(".search_block input").keypress(function(e){
         if(e.keyCode==13){
            var text = $("#search").val();
            $(".search_hidden").find("span").each(function(){
                if ($(this).text()==text){
                    $(this).click();
                }
            });
         }
    });

    $(".select_block_sloi span.fields").click(function(){
        if ($(this).hasClass("nonactive")) {
            $(".select_block span").click();
            $(this).removeClass("nonactive");
        }else{
            $(".select_block span").click();
            $(this).addClass("nonactive");
        }
    });

    $(".contrl_item").live("click", function () {
        if ($(this).hasClass("active")) {

        } else {
            var attr = $(this).attr("pre");
            $(this).parent().find(".contrl_item").removeClass("active");
            $(this).addClass("active");
            $(this).parent().parent().parent().parent().parent().find(".block").removeClass("active");
            $(this).parent().parent().parent().parent().parent().find(".block[pre=" + attr + "]").addClass("active");
            var bl = $(this).parent().parent().parent().parent().parent().parent().attr("id");
            $("#" + bl).css("oveflow", "auto !important");
            $("#" + bl).css("height", "auto !important");
        }
    });

    $("body").click(function(){
        $(".select_block").removeClass("active");
        $(".select_block_sloi").removeClass("active");
    });
   
    $(".select_block").click(function(event){
        event.stopPropagation();
        
    });

    $(".select_block_sloi").click(function(event){
        event.stopPropagation();
    });
   
      

    $(".see").click(function(event){
         event.stopPropagation();
        if (!$(".select_block").hasClass("active")) {
            $(".select_block").addClass("active");
            $(".select_block_sloi").removeClass("active");
        }
    });

    $(".seesloi").click(function(event){
         event.stopPropagation();
        if (!$(".select_block_sloi").hasClass("active")) {
            $(".select_block_sloi").addClass("active");
            $(".select_block").removeClass("active");
        }
    });




    $("button.upfile.sloibutton").click(function () {

        if ($(this).parent().hasClass("sloi")) {

            $("#levelid").val($(this).parent().attr("id"));

            $(".overlay_newfile h2").text("Загрузите файлы KML слоя");



        } else {

            $(".overlay_newfile h2").text("Загрузите файлы KML полей и дорог");

            $("#levelid").val("0");

        }

        $(".upload ul").html("");

        showopacitynewfile();

        var height = $(".overlay_newfile").height();

        $(".result_block").css("height", (height - 30 - 27 - 80 - 0.16 * height - 10 - 22 - 34 - 20 - 34 - 27 - 10) + "px");

    });

        $("button.upfile.tablesbutton").click(function () {

        

        $("#levelid").val($(this).attr("idtable"));


        $(".upload ul").html("");

        showopacitynewfile();

        var height = $(".overlay_newfile").height();

        $(".result_block").css("height", (height - 30 - 27 - 80 - 0.16 * height - 10 - 22 - 34 - 20 - 34 - 27 - 10) + "px");

    });




    $(".overlay_newtable .deletesign").click(function () {
        hideopacityisk();



    });

    $(".overlay_newfile .deletesign").click(function () {

        $(".newblock").css("display", "none");

        $(".variant").removeClass("active");

        $(".newblock.sitselect").css("display", "block");

        $(".newblock.namefolder input").val("");

        hideopacityisk();
        document.location.href = "fields-admin.php";

    });

     



    $(".newtable").click(function () {

        var newtablename = prompt('Введите название новой таблицы');

        $("#newnametable").val(newtablename);

        var newnametablerowcount = prompt('Введите кол-во столбцов в таблице');



        $("#newrowcount").val(newnametablerowcount);

        var text = "";

        for (var i = 0; i < (newnametablerowcount); i++) {

            var textcurrent = prompt('Введите название колонки ' + (i + 1));

            if (text == "") {

                text = textcurrent;

            } else {

                text = text + " " + textcurrent;

            }

        };



        $("#newrowname").val(text);

        $("#newtable").submit();

    });





    $(".center .del").click(function () {

        var id = $(this).attr("idtable");



        $("#delnametable").val(id);



        $("#deltable").submit();



    });



    $(".center .edit").click(function () {

        var id = $(this).attr("idtable");

        var newtablename = prompt('Введите новое название таблицы');

        $("#nnametable").val(id);

        $("#nname").val(newtablename);



        $("#ntable").submit();

    });





    $("button.downfile.sloibutton").click(function () {

        if ($(this).parent().hasClass("sloi")) {

            var levelid = $(this).parent().attr("id");

        } else {

            var levelid = 0;

        }

        window.open("kmldownload.php?idlevel=" + levelid, '_blank');

    });

        $("button.downfile.tablesbutton").click(function () {

    

            var idtable = $(this).attr("idtable");

       

        window.open("tabledownload.php?idtable=" + idtable, '_blank');

    });






    $(".overlay_newfile .newfile_ok").click(function () {
        hideopacityisk();
        document.location.href = "admin.php";
    });

     $(".overlay_newfile .newfiletable_ok").click(function (event) {
        hideopacityisk();
        event.preventDefault();
        location.reload();
     });

    




    $(".overlay_newtable .newtable_ok").click(function (event) {
        event.preventDefault();

    

        if ($("#newtableglobalname").val()==""){
            alert("Введите название общей таблицы");
        }else{
            
            if ($("#newtableglobalcolons").val()==""){
                alert("Введите кол-во колонок");   
            }else{
                if ($("#newtableglobalcolons").val()=="0"){
                    alert("Должна существовать хотя бы одна колонка"); 
                } else{



                    var rowcount = $("#newtableglobalcolons").val();
                    var text = "";
                     for (var i = 0; i < (rowcount); i++) {
                        var textcurrent = prompt('Введите название колонки ' + (i + 1));

                        if (text == "") {
                            text = textcurrent;
                        } else {
                            text = text + " " + textcurrent;
                        }

                    };
                    var idtables = "";

                    $(".variants .click").each(function(){
                        if (!$(this).hasClass("nonactive")) {
                            var thisidtable = $(this).attr("attr");

                            if (idtables == "") {
                                idtables = thisidtable;
                            }else{
                                idtables =idtables +" "+thisidtable;
                            }
                        }
                    });


                    $("#newnametableglobal").val($("#newtableglobalname").val());
                    $("#newrowcountglobal").val($("#newtableglobalcolons").val());
                    $("#newrownameglobal").val(text);
                    $("#newtableglobalids").val(idtables);
                    $("#newtableglobal").submit();
                } 
            }
        }

    });



    $(".overlay_newfile .no").click(function () {

        hideopacityisk();
        document.location.href = "admin.php";

    });



    $(".addnewsloi").click(function () {

        var param = prompt('Введите название нового слоя');

        $("#newlayername").val(param);

        $("#newlayer").submit();

    });



    $(".sloi .del").click(function () {

        var delid = $(this).parent().parent().attr("id");

        $("#dellayername").val(delid);

        $("#dellayer").submit();

    });







    $(".sloi .edit").click(function () {

        var delid = $(this).parent().parent().attr("id");

        var param = prompt('Введите новое название слоя');

        $("#edlayername").val(param);

        $("#edlayerid").val(delid);

        $("#edlayer").submit();

    });



    $("td div.editrow").click(function () {

        var idtable = $(this).attr("idtable");

        var row = $(this).attr("row");

        var param = prompt('Введите новое название колонки');

        $("#edrowrow").val(row);

        $("#edrowidtable").val(idtable);

        $("#edrowname").val(param);

        $("#edrownameform").submit();

    });



    $("td div.delrow").click(function () {

        var idtable = $(this).attr("idtable");

        var row = $(this).attr("row");

        $("#delrowrow").val(row);

        $("#delrowidtable").val(idtable);

        $("#delrow").submit();

    });



    $(".newcolon").click(function(){

        var idtable = $(this).attr("idtable");

        var param = prompt('Введите название новой колонки');

        $("#newrowidtable").val(idtable);

        $("#newrowrowname").val(param);

        $("#newrow").submit();

    });



    var roadchange;

    $("table.roads td").focus(function () {

        roadchange = $(this).text();

    });



    $("table.roads td").bind('blur', function () {

        if ($(this).text() != roadchange) {

            $("#roadchangeid").val($(this).parent().find("td.id").text());

            $("#roadchangename").val($(this).parent().find("td.name").text());

            $("#roadchangecolorline").val($(this).parent().find("td.colorline").text());

            $("#roadchangelinewidth").val($(this).parent().find("td.colorfield").text());

            $("#roadchange").submit();

        }





    });



    $("table.roads td.delete").live("click", function () {

        var id = $(this).parent().find("td.id").text();

        $("#roaddel").val(id);

        $("#delroad").submit();

    });



    $("table.marks td.delete").live("click", function () {

        var id = $(this).parent().find("td.id").text();

        $("#markdel").val(id);

        $("#delmark").submit();

    });







    $("table.marks td.add").live("click", function () {

        var name = prompt('Введите название');

        var shir = prompt('Введите широту');

        var dol = prompt('Введите долготу');

        var colorline = prompt('Введите цвет линии');

        $("#markinsertname").val(name);

        $("#markinsertshir").val(shir);

        $("#markinsertdol").val(dol);

        $("#markinsertcolor").val(colorline);

        $("#markinsert").submit();

    });







    $("table.tables td.tableadd").live("click", function () {

        var count = $(this).parent().find("td").length-1;

        var idtable = $(this).attr("idtable");



        var a = [];

        $(this).parent().find("td").each(function(){

            a.push($(this).text());

        })

        



        var text = "";

        for (var i = 0; i < (count); i++) {

            var textcurrent = prompt('Введите значение в колонке '+ a[i]+"");

            if (text == "") {

                text = textcurrent;

            } else {

                text = text + " " + textcurrent;

            }

        };

        $("#addlinerowname").val(text);

        $("#addlineidtable").val(idtable);

        $("#addline").submit();

    });



    var markchange;

    $("table.marks td").focus(function () {

        markchange = $(this).text();

    });



    $("table.marks td").bind('blur', function () {

        if ($(this).text() != markchange) {

            $("#markchangeid").val($(this).parent().find("td.id").text());

            $("#markchangename").val($(this).parent().find("td.name").text());

            $("#markchangeshir").val($(this).parent().find("td.shir").text());

            $("#markchangedol").val($(this).parent().find("td.dol").text());

            $("#markchangecolorline").val($(this).parent().find("td.colorline").text());

            $("#markchange").submit();

        }

    });



    var fieldchange;



    $("table.fields td").focus(function () {

        fieldchange = $(this).text();

    });



    $(".short.table").live("click", function () {

        var id = $(this).parent().find(".id").text();

        document.location.href = "table.php?id=" + id;

    });



    $("table.fields td").bind('blur', function () {

        if ($(this).text() != fieldchange) {

            $("#fieldchangeid").val($(this).parent().find("td.id").text());

            $("#fieldchangename").val($(this).parent().find("td.name").text());
            $("#descfield").val($(this).parent().find("td.desc").text());

            $("#fieldchangecolorline").val($(this).parent().find("td.colorline").text());

            $("#fieldchangecolorfield").val($(this).parent().find("td.colorfield").text());

            $("#fieldchange").submit();

        }

    });



    $("table.fields td.delete").live("click", function () {

        var id = $(this).parent().find("td.id").text();

        $("#fielddel").val(id);

        $("#delfield").submit();

    });



    $("table.tables td.short.delete").click(function(){

        var idline = $(this).attr("idthis");

        $("#dellineidline").val(idline);

        $("#delline").submit();

    });





    var edlinechange;

    $("table.tables td").focus(function () {

        edlinechange = $(this).text();

    });



    $("table.tables td").bind('blur', function () {

        if ($(this).text() != edlinechange) {

            $("#edlinetext").val($(this).text());

            $("#edlinerow").val($(this).attr("row"));

            $("#edlineidtable").val($(this).attr("idthis"));

            $("#edline").submit();

        }

    });




    $("#newtableglobalcolons").keydown(function(event) {
        // Разрешаем: backspace, delete, tab и escape
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || 
             // Разрешаем: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Разрешаем: home, end, влево, вправо
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // Ничего не делаем
                 return;
        }
        else {
            // Обеждаемся, что это цифра, и останавливаем событие keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });



});





function showopacitynewfile() {

    short_bg_pos=$(window).scrollTop();

    $(".overlay").css("z-index","15000");

    $('.opacity_block').addClass("active");

    $('.overlay_newfile').addClass("active");

    $("#page_wrap").css("position","fixed");
}

function shownewtable(){
    short_bg_pos=$(window).scrollTop();

    $(".overlay").css("z-index","15000");

    $('.opacity_block').addClass("active");

    $('.overlay_newtable').addClass("active");

    $("#page_wrap").css("position","fixed");
}



function hideopacityisk() {

  $(window).scrollTop(short_bg_pos);

  $(".overlay").css("z-index","1");

  $('.opacity_block').removeClass("active");

  $('.overlay_newisk').removeClass("active");
  $(".overlay_newtable").removeClass("active");  

  $("#page_wrap").css("position","relative");

  $('.overlay_newfile').removeClass("active");

  $(".upload.document .image").html("");

  $(".upload.document .image").removeClass("work");

  $(".upload.document .image").removeClass("ok");

  $(".upload.document .image").removeClass("error");

  $(".upload.lizing .image").addClass("dogovorliz");

  $(".upload.buysold .image").addClass("buysold");

  $(".upload.dogovorporuch .image").addClass("dogovorporuch");

  $(".upload.dover .image").addClass("dover");

  $(".upload.actpriem .image").addClass("actpriem");

  $(".upload.dopsoglliz .image").addClass("dopsoglliz");

  $(".upload.dosrochrast .image").addClass("dosrochrast");

  $(".upload.platliz .image").addClass("platliz");

  $(".upload.platkupla .image").addClass("platliz");

 

}