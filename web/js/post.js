function showSubcategory(id){
	$.ajax({
		url: '/category/',
		data: {'id':id},
		success: function(data){
			alert(data);
		}
	});
}