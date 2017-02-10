function load_product(cat_id,manf_id){
	$.ajax({
		type: "POST",
		url: "/index.php?module=home&view=home&task=fetch_pages&raw=1",
		data: {cat_id: cat_id, manf_id: manf_id},
		cache: false,
		success: function(html){
			$("#box_product_"+cat_id).html(html);
			$(".item_tabs").removeClass('active');
			$("#item_tab_"+cat_id+manf_id).addClass('active');
		}
	});
}