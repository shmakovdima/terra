	var currentslide = 0;
	var slidescount  = 0;
	var arrayofimages = new Array();
	var arrayoftext = new Array();



$(document).ready(function(){


	$(".main_page-products-item p").each(function(){
		var replacetext = $(this).text();
		replacetext = replacetext.replace("[…]","...");
		$(this).text(replacetext);
	});
	
	$(".last_news_block .item p").each(function(){
		var replacetext = $(this).text();
		replacetext = replacetext.replace("[…]","...");
		$(this).text(replacetext);
	});

	$(".month").each(function(){
		if ($(this).text()=="September") {
			$(this).text("Sept");
		}
		if ($(this).text()=="January") {
			$(this).text("Jan");
		}
		if ($(this).text()=="February") {
			$(this).text("Feb");
		}
		if ($(this).text()=="March") {
			$(this).text("Mar");
		}
		if ($(this).text()=="April") {
			$(this).text("Apr");
		}
		if ($(this).text()=="August") {
			$(this).text("Aug");
		}
		if ($(this).text()=="October") {
			$(this).text("Oct");
		}
		if ($(this).text()=="November") {
			$(this).text("Nov");
		}
		if ($(this).text()=="December") {
			$(this).text("Dec");
		}
	});
	


	$(".products  img").each(function(){
		if ($(this).height()>$(this).width()) {
			$(this).attr("width","100%") ;
			$(this).attr("height", "auto");
			$(this).bindImageLoad(function () {
        		var height  = $(this).height();
       			$(this).css("top","-"+Math.round((height-192)/2)+"px");
    		});
		}else{
			$(this).attr("width","auto") ;
			$(this).attr("height", "100%");
			$(this).bindImageLoad(function () {
        		var width  = $(this).width();
       			 $(this).css("left","-"+Math.round((width-192)/2)+"px");
    		});
		}

	});



	

	

$("#cntctfrm_contact_name").attr("placeholder","Name");
	$("#cntctfrm_contact_email").attr("placeholder","E-mail");
	$("#cntctfrm_contact_phone").attr("placeholder","Phone");
	$("#cntctfrm_contact_subject").attr("placeholder","Subject");
	$("#cntctfrm_contact_message").attr("placeholder","Text");

	$("#cntctfrm_contact_message").css("padding-top"," 10px!important");

	var j =1;
	$(".about_mis .item .counter  span").each(function(){
		$(this).text(j);
		j++;
	});



	var i = 0;
	$(".foto_galery-item img").each(function(){

		if ((($(this).width()/$(this).height())<1.19) || ($(this).height()>$(this).width()) ) {
			$(this).attr("width","auto") ;
			$(this).attr("height", "100%");

			$(this).bindImageLoad(function () {
        		var width  = $(this).width();
       			 $(this).css("left","-"+Math.round((width-255)/2)+"px");
    		});

    		if ($(this).width()<255){
    			$(this).attr("width","100%") ;
    			$(this).attr("height", "auto");
    			$(this).bindImageLoad(function () {
        			var height  = $(this).height();
       				$(this).css("top","-"+Math.round((height-169)/2)+"px");
    			});
    		}	
		}else{
			$(this).attr("width","100%") ;
			$(this).attr("height", "auto");
			$(this).bindImageLoad(function () {
        		var height  = $(this).height();
       			$(this).css("top","-"+Math.round((height-169)/2)+"px");
    		});

    		if ($(this).height()<169){

    			$(this).attr("width","auto") ;
    			$(this).attr("height", "100%");

    			$(this).bindImageLoad(function () {
        			var width  = $(this).width();
       			 	$(this).css("left","-"+Math.round((width-255)/2)+"px");
    			});
    		}
		}		
		$(this).parent().attr("slide", i);
		i++;
	});



	var t=0;


	$(".galery img").each(function(){
		if ((($(this).width()/$(this).height())<1.33) || ($(this).height()>$(this).width()) ) {
			$(this).attr("width","auto") ;
			$(this).attr("height", "100%");

			$(this).bindImageLoad(function () {
        		var width  = $(this).width();
       			 $(this).css("left","-"+Math.round((width-282)/2)+"px");
    		});

    		if ($(this).width()<282){
    			$(this).attr("width","100%") ;
    			$(this).attr("height", "auto");
    			$(this).bindImageLoad(function () {
        			var height  = $(this).height();
       				$(this).css("top","-"+Math.round((height-211)/2)+"px");
    			});
    		}	
		}else{
			$(this).attr("width","100%") ;
			$(this).attr("height", "auto");
			$(this).bindImageLoad(function () {
        		var height  = $(this).height();
       			$(this).css("top","-"+Math.round((height-211)/2)+"px");
    		});

    		if ($(this).height()<211){

    			$(this).attr("width","auto") ;
    			$(this).attr("height", "100%");

    			$(this).bindImageLoad(function () {
        			var width  = $(this).width();
       			 	$(this).css("left","-"+Math.round((width-255)/2)+"px");
    			});
    		}
		}		
		$(this).parent().attr("slide", t);
		t++;
	});

	$(".about_short img").each(function(){
		if ((($(this).width()/$(this).height())<1.33) || ($(this).height()>$(this).width()) ) {
			$(this).attr("width","auto") ;
			$(this).attr("height", "100%");

			$(this).bindImageLoad(function () {
        		var width  = $(this).width();
       			 $(this).css("left","-"+Math.round((width-265)/2)+"px");
    		});

    		if ($(this).width()<282){
    			$(this).attr("width","100%") ;
    			$(this).attr("height", "auto");
    			$(this).bindImageLoad(function () {
        			var height  = $(this).height();
       				$(this).css("top","-"+Math.round((height-199)/2)+"px");
    			});
    		}	
		}else{
			$(this).attr("width","100%") ;
			$(this).attr("height", "auto");
			$(this).bindImageLoad(function () {
        		var height  = $(this).height();
       			$(this).css("top","-"+Math.round((height-199)/2)+"px");
    		});

    		if ($(this).height()<211){

    			$(this).attr("width","auto") ;
    			$(this).attr("height", "100%");

    			$(this).bindImageLoad(function () {
        			var width  = $(this).width();
       			 	$(this).css("left","-"+Math.round((width-265)/2)+"px");
    			});
    		}
		}	
	});





	




	$(".about_short p").each(function(){
		var text = $(this).text();
		text = text.replace("&nbsp;","");
		$(this).text(text)
	});
	

	$(".main_page-products-item .img_block img").each(function(){

		if ($(this).height()>$(this).width()) {
			$(this).attr("width","100%") ;
			$(this).attr("height", "auto");
			$(this).bindImageLoad(function () {
        		var height  = $(this).height();
       			$(this).css("top","-"+Math.round((height-192)/2)+"px");
    		});
		}else{
			$(this).attr("width","auto") ;
			$(this).attr("height", "100%");
			$(this).bindImageLoad(function () {
        		var width  = $(this).width();
       			 $(this).css("left","-"+Math.round((width-192)/2)+"px");
    		});
		}

	});


  $(window).scroll( function(){
    if ($(window).scrollTop() > 1 ) {
        $(".up_button").removeClass("hidden");
    }else{
      $(".up_button").addClass("hidden");
    } 
  });
	
  $(".header_more").click(function(event){
	 	if ($(".header_bg").hasClass("active")) {
			$(".header_bg").removeClass("active");
		} else {
			event.preventDefault();
			$(".header_bg").addClass("active");
		}
  });
	

  	$(".overlay img").click(function(){
  		nextslide();
  	});

  	$(".search-field").removeAttr("placeholder");
	
	$(document).click(function(event){
		if (!$(event.target).closest(".search-field").length==0) return;
		if (!$(event.target).closest(".header_search").length==0) return;
		$(".header_search").removeClass("nonactive");
		$(".header_bg .search-field").removeClass("active");	
	});
	
	$(document).click(function(event){
		if (!$(event.target).closest(".header_bg").length==0) return;
		$(".header_bg").removeClass("active");
		
	});


	$(".galery .item").click(function(){
		$(".overlay").addClass("active");
		currentslide = parseInt($(this).attr("slide"));
		
		slidescount = -1;
		arrayofimages = new Array();
		$(".galery .item").each(function(){
			arrayoftext.push($(this).find("h3").text());
			arrayofimages.push($(this).find("img").attr("src"));
			slidescount++;
		});
		var curnormal = (currentslide+1);
		var countslnormal = (slidescount+1);
		$(".counter_of_images").text(curnormal+" из "+countslnormal);



		$(".overlay h3").text(arrayoftext[currentslide]);
		$(".overlay img").attr("src", arrayofimages[currentslide]);

	});





	$(".foto_galery-item").click(function(){
		$(".overlay").addClass("active");
		currentslide = parseInt($(this).attr("slide"));
		
		slidescount = -1;
		arrayofimages = new Array();
		$(".foto_galery-item").each(function(){
			arrayoftext.push($(this).find("h3").text());
			arrayofimages.push($(this).find("img").attr("src"));
			slidescount++;
		});
		var curnormal = (currentslide+1);
		var countslnormal = (slidescount+1);
		$(".counter_of_images").text(curnormal+" из "+countslnormal);



		$(".overlay h3").text(arrayoftext[currentslide]);
		$(".overlay img").attr("src", arrayofimages[currentslide]);

	});


	$(".overlay .right_triangle .triangle").click(function(){
		if (!$(".overlay img, .overlay").hasClass("nonclick")) {
			nextslide();

		}
		
	})

	$(".overlay .left_triangle .triangle").click(function(){
		if (!$(".overlay img, .overlay").hasClass("nonclick")) {
			prevslide();
		}
		
	})
	
	
	$(".header_search").click(function(){
		$(this).addClass("nonactive");
		$(".header_bg .search-field").addClass("active");
	});




  	$(".overlay .close").click(function(){
  		$(".overlay").removeClass("active");		
  	});


  	$(".img_block").each(function(){
  		if ($(this).children("img").length==0) {
  			$(this).css("display","none");
  		}
  	});	


});

function nextslide(){
	$(".overlay img, .overlay").addClass("nonclick");
	currentslide++;
		if (currentslide>slidescount) {
			currentslide=0;
		} 
	$(".overlay img, .overlay h3").fadeOut("fast",function(){
		var curnormal = (currentslide+1);
		var countslnormal = (slidescount+1);
		$(".counter_of_images").text(curnormal+" из "+countslnormal);



		$(".overlay img").attr("src",arrayofimages[currentslide]);
		$(".overlay h3").text(arrayoftext[currentslide]);
		$(".overlay img, .overlay h3").fadeIn("fast", function(){
			$(".overlay img, .overlay").removeClass("nonclick");
		});


	});
	

}

function prevslide(){
	$(".overlay img, .overlay").addClass("nonclick");
		currentslide--;
		if (currentslide<0) {
			currentslide=slidescount;
		} 


	$(".overlay img, .overlay h3").fadeOut("fast",function(){
		var curnormal = (currentslide+1);
		var countslnormal = (slidescount+1);
		$(".counter_of_images").text(curnormal+" из "+countslnormal);

		$(".overlay img").attr("src",arrayofimages[currentslide]);
		$(".overlay h3").text(arrayoftext[currentslide]);
		$(".overlay img, .overlay h3").fadeIn("fast",function(){
	    $(".overlay img, .overlay").removeClass("nonclick");
		});
	});
}

$(document).keydown(function(e) {
	if( e.keyCode == 27 ) {
        $(".overlay.active .close").click();
        return false;
    }

    if( e.keyCode == 37 ) {
    	if (!$(".overlay img, .overlay").hasClass("nonclick")) {
			prevslide();
		}	
        		
        return false;
    }

    if( e.keyCode == 39 ) {
        if (!$(".overlay img, .overlay").hasClass("nonclick")) {
			nextslide();
		}	
        return false;
    }
});


(function($){  
    $(function(){  
        var e = $(".up_button"),  
        speed = 500;  
  
        e.click(function(){  
            $('body').animate({ scrollTop: 0 }, 500 );  
            $("html").animate({ scrollTop: 0 }, 500);
            return false;
        });
        function show_scrollTop(){  
            ( $(window).scrollTop() > 300 ) ? e.fadeIn(600) : e.fadeOut(300);  
        }  
        $(window).scroll( function(){show_scrollTop()} ); show_scrollTop();  
    });  
})(jQuery);

(function ($) {
    $.fn.bindImageLoad = function (callback) {
        function isImageLoaded(img) {
           
            if (!img.complete) {
                return false;
            }
            
            if (typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0) {
                return false;
            }
           
            return true;
        }

        return this.each(function () {
            var ele = $(this);
            if (ele.is("img") && $.isFunction(callback)) {
                ele.one("load", callback);
                if (isImageLoaded(this)) {
                    ele.trigger("load");
                }
            }
        });
    };
})(jQuery);

