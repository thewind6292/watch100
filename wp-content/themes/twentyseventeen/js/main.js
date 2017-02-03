var is_rewrite = 1;
var root = '/';
var isMob = {
	    Android: function () {
	        return navigator.userAgent.match(/Android/i) ? true : false;
	    },
	    BlackBerry: function () {
	        return navigator.userAgent.match(/BlackBerry/i) ? true : false;
	    },
	    iOS: function () {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
	    },
	    Windows: function () {
	        return navigator.userAgent.match(/IEMobile/i) ? true : false;
	    },
	    any: function () {
	        return (isMob.Android() || isMob.BlackBerry() || isMob.iOS() || isMob.Windows());
	    }
	};
(function() {
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement("style");
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      "@-ms-viewport{width:auto!important}"
		    )
		  );
		  document.getElementsByTagName("head")[0].
		    appendChild(msViewportStyle);
		}
})();

function changeCaptcha(){
	var date = new Date();
	var captcha_time = date.getTime();
	$("#imgCaptcha").attr({src:'/libraries/jquery/ajax_captcha/create_image.php?'+captcha_time});
}	
//$("img")
//  .error(function(){
//	  $(this).attr("src", "../images/no-img.png");
//  });  

/* CHECK CAPTCHA AJAX */
function check_captcha(){
	$('#txtCaptcha').blur(function(){
		if($(this).val() != ''){
			$.ajax({url: "/index.php?module=users&task=ajax_check_captcha&raw=1",
				data: {txtCaptcha: $(this).val()},
				dataType: "text",
				success: function(result) {
					$('label.username_check').prev().remove();
					$('label.username_check').remove();
					if(result == 0){
						invalid('txtCaptcha','Bạn nhập sai mã hiển thị');
					} else {
						valid('txtCaptcha');
						$('<br/><div class=\'label_success username_check\'>'+'Bạn đã nhập đúng mã hiển thị'+'</div>').insertAfter($('#username').parent().children(':last'));
					}
				}
			});
		}
	});
}
$(function () {
	  $("#fixed-bar")
	    .css({position:'fixed',bottom:'370px'})
	    .hide();
	  $(window).scroll(function () {
	    if ($(this).scrollTop() > 200) {
	      $('#fixed-bar').fadeIn(200);
	    } else {
	      $('#fixed-bar').fadeOut(200);
	    }
	  });
	  $('.go-top').click(function () {
	    $('html,body').animate({
	      scrollTop: 0
	    }, 1000);
	    return false;
	  });
	});
//$(document).ready(function(){
//    $(document).bind("contextmenu",function(){
//    	alert('Bạn không được dùng chuột phải');
//        return false;
//    });
//});


//$(document).ready(function(){
//	var top_footer = $('.footer').position().top;
//    /* Đính menu xuống footer nếu scrollbar kéo xuống dưới footer */
//	$(window).scroll(function () {
//		var top_footer_menu = $('.footer_t').offset().top;
//		if(top_footer_menu >= top_footer ){
//			$('.footer_menu').css('position','inherit')
//		}else{
//			$('.footer_menu').css('position','fixed')
//		}
//	});
//
//});

$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
			$('.facebook').fadeIn();
			$('.google').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
			$('.facebook').fadeOut();
			$('.google').fadeOut();
		}
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > 138) {
			$('#nav-mainmenu').addClass("scroll-menu");
		}else{
			$('#nav-mainmenu').removeClass("scroll-menu");
		}
	});
	if ($(window).scrollTop() > 138) {
			$('#nav-mainmenu').addClass("scroll-menu");
		}else{
			$('#nav-mainmenu').removeClass("scroll-menu");
		}
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
        
 //        $('.star-bf').raty({
 //    	halfShow : true,
	// 	readOnly: true, 
	// 	score: function() {
	// 	    return $(this).attr('data-rating');
	// 	  },
	// 	starOff : 'images/star-empty.png',
	// 	starOn  : 'images/star-fill.png',
 //                starHalf  : 'images/star-half.png',
	// }); 
        
         $(".close-bf").click(function(){
            $("#wrapper-buy-fast").hide();
            $(".full").hide();
        });
        $(".full").click(function(){
            $("#wrapper-buy-fast").hide();
            $(".full").hide();
        }); 
        
        
});
function checkMediaQuery(width) {
    if (navigator.appName != 'Microsoft Internet Explorer') {
        var mql = window.matchMedia("screen and (max-width: " + width + "px)");
        return mql.matches;
    } else {
        return viewport().width <= width;
    }
}
function isTouch() {
    return isMob.any();
}
function load_slider_thumb_bf(){
    $('.list-thumb-bf').owlCarousel({
            loop:true,
	    margin:20,
            items:5,
            pagination:false,
            autoplay:true,
	    responsiveClass:true,
             navigation:true,
            navigationText:[" "," "],
	    responsive:{
                0:{
                        items:2,
                        nav:false,
                        dots:true
						
                },
				400:{
                        items:4,
                        nav:false,
                        dots:true
                },
                600:{
                        items:4,
                        nav:true,
                        dots:false
                },
                835:{
                        items:4,
                        nav:true,
                        dots:false
                }
            }
	});
}

function click_fast(){
    $(".button-cart-fast").click(function() { 
             $("#wrapper-buy-fast").hide();
            $("#wrapper-buy-fast").fadeIn(2000);
            $(".full").show();
            $("#ajax-loader").show();
            $("#ajax-loader-more").show();
		var id = $(this).attr("data"); //total record group(s)
		var idd = $(this).attr("dataid"); //total record group(s)
		var tp = $(this).attr("datatp"); //total record group(s)
		var lm = $(this).attr("datalm"); //total record group(s)
//		if(idd=="0"){
//                    $(".next-fast").hide();
//                }else{
                    
//                }
				$.post('index.php?module=products&view=product&task=ajax_view_fast&raw=1&id='+id+"&tp="+tp+"&lm="+lm, function(data){
                                         $("#wrapper-buy-fast").html(data); 
                                         $('.star-bf').raty({
                                            halfShow : true,
                                                    readOnly: true, 
                                                    score: function() {
                                                        return $(this).attr('data-rating');
                                                      },
                                                    starOff : 'images/star-empty.png',
                                                    starOn  : 'images/star-fill.png',
                                                    starHalf  : 'images/star-half.png',
                                            }); 
                                            $(".list-thumb-bf > li").click(function(){
                                               $v=$(this).attr("data");
                                               $(this).addClass("active-thumb-bf");
                                               $(this).siblings().removeClass("active-thumb-bf");
                                               $(".left-bf > img").attr("src",$v);
                                           });
                                           $(".close-bf").click(function(){
                                                $("#wrapper-buy-fast").hide();
                                                $(".full").hide();
                                                
                                                $("#ajax-loader").hide();
                                                $("#ajax-loader-more").hide();
                                            });
                                            $(".full").click(function(){
                                                $("#wrapper-buy-fast").hide();
                                                $(".full").hide();
                                                
                                                $("#ajax-loader").hide();
                                                $("#ajax-loader-more").hide();
                                            }); 
//                                            $("#next-fast").attr("data",idd);
                                            $("#next-fast").addClass("button-cart-fast");
                                            $("#prev-fast").addClass("button-cart-fast");
                                             click_fast();
                                            load_slider_thumb_bf();
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                                    alert(thrownError); //alert with HTTP error
                                    loading = false;
				});
	});
}
 $("document").ready(function(){
      click_fast();
      click_fast2();
//	var cat_id = $('#cat_id').val(); //total record group(s)
//        alert(total_groups);
        
        
//      $('.button-cart').click(function() {
//	 $("#wrapper-buy-fast").show();
//            $(".full").show();
//            var id = $(this).attr("data"); 
//	$.ajax({
//		  url: 'index.php?module=products&view=product&task=ajax_view_fast&id='+id,
//		  cache: false,
//		  success: function(data){
//		  	$("#wrapper-buy-fast").html(data); 
//		  },
//		  error: function()
//		  {
//			 console.log('error');
//			 return false;
//		  }
//		});   
//
//$(document).bind("contextmenu",function(e){ e.preventDefault(); });
//$(document).keydown(function(ev) {
//	ev = ev || window.event;
//	kc = ev.keyCode || ev.which;
//	if((ev.ctrlKey || ev.metaKey) && kc) {
//		if(kc == 99 || kc == 67 || kc == 88) { return false; } 
//	} 
//});

});
       
       


function click_fast2(){
    $(".button-cart-fast-cat").click(function() { 
            $("#wrapper-buy-fast").hide();
            $("#wrapper-buy-fast").fadeIn(2000);
            $(".full").show();
            $("#ajax-loader").show();
            $("#ajax-loader-more").show();
		var id = $(this).attr("data"); //total record group(s)
		var idd = $(this).attr("dataid"); //total record group(s)
		var tp = $(this).attr("datatp"); //total record group(s)
		var lm = $(this).attr("datalm"); //total record group(s)
//		if(idd=="0"){
//                    $(".next-fast").hide();
//                }else{
                    
//                }
				$.post('/index.php?module=products&view=product&task=ajax_view_fast_cat&raw=1&id='+id+"&tp="+tp+"&lm="+lm, function(data){
                                        
                                    $("#wrapper-buy-fast").html(data); 
                                         $('.star-bf').raty({
                                            halfShow : true,
                                                    readOnly: true, 
                                                    score: function() {
                                                        return $(this).attr('data-rating');
                                                      },
                                                    starOff : '/images/star-empty.png',
                                                    starOn  : '/images/star-fill.png',
                                                    starHalf  : '/images/star-half.png',
                                            }); 
                                            $(".list-thumb-bf > li").click(function(){
                                               $v=$(this).attr("data");
                                               $(this).addClass("active-thumb-bf");
                                               $(this).siblings().removeClass("active-thumb-bf");
                                               $(".left-bf > img").attr("src",$v);
                                           });
                                           $(".close-bf").click(function(){
                                                $("#wrapper-buy-fast").hide();
                                                $(".full").hide();
                                                
                                                $("#ajax-loader").hide();
                                                $("#ajax-loader-more").hide();
                                            });
                                            $(".full").click(function(){
                                                $("#wrapper-buy-fast").hide();
                                                $(".full").hide();
                                                $("#ajax-loader").hide();
                                                $("#ajax-loader-more").hide();
                                            }); 
//                                            $("#next-fast").attr("data",idd);
                                            $("#next-fast").addClass("button-cart-fast-cat");
                                            $("#prev-fast").addClass("button-cart-fast-cat");
                                             click_fast2();
                                            load_slider_thumb_bf();
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                                    alert(thrownError); //alert with HTTP error
                                    loading = false;
				});
	});
}