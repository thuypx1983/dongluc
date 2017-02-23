
<div style="position:absolute; top:80px; right:9%; display:none;">
Nhập discount giảm giá cho tất cả sản phẩm :
<input type="text" class="all_discount" />
<input type="button" class="btn_discount" value="Áp dụng" />
</div>


<script type="text/javascript">

$(function(){
	
	$('.btn_discount').click(function(){
		discount = $('.all_discount');
		if(discount.val().length<=0) {
			alert('Vui lòng nhập mã giảm giá');
		} else if ( isNaN(discount.val()) ) {
			alert('Bạn vui lòng nhập số');	
		} else {
			if(confirm("Bạn có chắc không?")) {
				$.get("?ajax=true&mod=product&task=applyCoupon&value="+discount.val(), function(){
					location.reload(true);
				});
			}
		}
	});
	
	$('#product_type_id').change(function(){
		$.get("?ajax=true&mod=product&task=getCategory&id="+$(this).val(), function(rs){
			$('#product_category_id').parent().html(rs);
		});
	});
	
	if($('#product_type_id').val()!='') {
		$.get("?ajax=true&mod=product&task=getCategory&id="+$('#product_type_id').val(), function(rs){
			$('#product_category_id').parent().html(rs);
			$('#product_category_id').val("{$smarty.get.product_category_id}")
										.attr('selected',true);
		});
	}
});

</script>

