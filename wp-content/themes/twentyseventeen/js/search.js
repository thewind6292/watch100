// autocomplate();
// $(document).ready(function() {
// 	$('#searchbt').click(function(){
// 		itemid = 10; 
// 		url = '';
// 		var keyword = $('#keyword').val();
// 		keyword = encodeURIComponent(encodeURIComponent(keyword));
// 		var link_search = $('#link_search').val();
// 		if(keyword!= 'Tìm kiếm xe' && keyword != '')	{
// 			url += 	'&keyword='+keyword;
// 			var check = 1;
// 		}else{
// 			var check =0;
// 		}
// 		if(check == 0){
// 			alert('Bạn phải nhập tham số tìm kiếm');
// 			return false;
// 		}
// //		if(link_search.indexOf("&") == '-1')
// 			var link = link_search+'/'+keyword+'.html';
// //		else
// //			var link = link_search+'&keyword='+keyword+'&Itemid=9';
 
// 	    window.location.href=link;
// 	    return false;
// 		}),
// 		$('.search-contain').mouseenter(function() {

// 			$(this).find(".search-content").stop(true, true).slideDown();

// 		});

// 		$('.search-contain').mouseleave(function() {
// 			$(this).find(".search-content").stop(true, true).slideUp();

// 		});

// });

// function autocomplate(){
// 	$("#keyword").autocomplete({ 
//         source: function (request, response){
//             $.ajax({
//                 url: '/index.php?module=products&view=search&raw=1&task=get_ajax_search',
//                 dataType: "json",
//                 data:{
//                     term: request.term
//                 },
//                 success: function (data)
//                 {
//                     response(data);
//                 }
//             });
//         }, 
//         select: function( event, ui ) {
//             $('#topic_id').val(ui.item.id);
//         },
//         minLength: 0
//     }).focus(function () {
//         if (this.value == "")
//             $("#keyword").autocomplete("search","");
//     });
	
// }