$(function(){
	$('.updateCart').on('keyup change',function(){
		rowId = $(this).attr('rowId');
		qty = $(this).val();
		$.get('update-cart',{rowId:rowId,qty:qty},function(data){
			data = JSON.parse(data);
			$('.'+rowId).html(data.totalPrice);
			$('.total-price').html(data.totalAll);
		});
	});
});

function addCart(id) {
    var productid = id;
    var siteURL = 'http://localhost/g1_mock_laravel//cart/ajaxadd';
    $.ajax({
        url: siteURL,
        type: 'GET',
        cache: false,
        data: { 'id': productid}, //see the $_token
        datatype: 'html',
        success: function(data) {
            $('#tblcart').html(data);
            window.alert('Thêm vào giỏ hàng thành công');
        }
    });
}
