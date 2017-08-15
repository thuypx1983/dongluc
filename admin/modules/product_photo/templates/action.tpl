
<script type="text/javascript">

$(function(){
	temp = $('#product_id');
	text = temp.find(':selected').text();
	
	parent = temp.parent().parent().parent().parent().parent().parent();
	parent
		.html("<div>Sản phẩm : "+text+"</div>");
});

</script>

