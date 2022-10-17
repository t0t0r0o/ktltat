$(".delete").click(function (e) { 
	e.preventDefault();
	var dataUrl=$(this).attr("data-url");
	$('#confirmDeleteModal a').attr("href",dataUrl);
	$("#confirmDeleteModal").modal("show");
	
});