function quantidade(codigo,incremento){
	$.ajax({
		type: "POST",
		url: "/portal/carrinho/addCarrinho/"+codigo+"/"+incremento+"/0",
		async: false,
		success: function(msg){
			location.reload();
			//alert( "Data Saved: " + msg );
		}
	});
}