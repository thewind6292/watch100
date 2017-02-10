loadNav();
function loadNav(){

//	$('.mainmanu > li > a').hover(function(){
//		$(this).next().hide();	
//	},function(){});
//	$('.mainmanu > li').hover(function(){
//	},function(){
//		$(this).children('.highlight').show();	
//	});

}

$(document).ready(function(){
    $(".read_more_mm").click(function(){
        $(this).hide();
        $(this).siblings(".manu-item-hd").show();
         $(this).siblings(".hidden_more_mm").show();
    });
    $(".hidden_more_mm").click(function(){
        $(this).siblings(".read_more_mm").show();
        $(this).siblings(".manu-item-hd").hide();
        $(this).hide();
    });
    $(".list-manu-menu > ul > li").click(function(){
        $this=$(this).attr("data");
        $(this).addClass("active-sub-manu");
        $(this).siblings().removeClass("active-sub-manu");
        $(".wrapper-list-manu > h3").hide();
        $("."+$this).show();
        $sibling=$("."+$this).siblings();
        if($sibling.hasClass($this)==false){
            $sibling.hide();
            $("."+$this).show();
        }
    });
});