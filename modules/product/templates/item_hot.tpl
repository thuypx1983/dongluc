
<script type="text/javascript">
$(function(){
	
	$('.item-countdown').hide();
	$('.product-item img').bind('mouseleave mouseover', function(){
		pobj = $(this).closest('.product-item');
		if(pobj.find('.item-countdown').css('display')=='none') {
			pobj.find('.item-countdown').show();
		} else {
			pobj.find('.item-countdown').hide();
		}
	});
	
	$('.countdown_amount').each(function(){
		if($(this).html()=='NaN') {
			$(this).closest('.item-countdown').remove();
		}
	});
});
</script>

<div class="product-item item-big">
	{if $row}
	<div class="item-wrap">
		<span class="item-discount">{$row.discount|number_format:0}%</span>
		<span class="item-damua"><span class="text-damua">{$row.number_buy} đã mua</span></span>
		<span class="item-giaohang"><span class="{$row.class}">{$row.giaohang}</span></span>
		<span class="item-countdown" style="display:none;"><span class="text-countdown countdown"></span></span>
		
		<a href="{$url}{$row.cate_link}/{$row.link}.html" title="{$row.title}"><img src="{$url}upload/product/{$row.photo}"  alt="{$row.seo_photo_alt|default:$row.title}" /></a>
		<a href="{$url}{$row.cate_link}/{$row.link}.html" title="{$row.title}" class="item-title"><h3>{$row.title}</h3></a>
		
		
		<div class="item-price">
			<span class="price-new">{($row.price - ($row.price*$row.discount*0.01))|number_format:0:",":"."}<sup>đ</sup></span>
			<span class="price-old">{$row.price|number_format:0:",":"."}<sup>đ</sup></span>
		</div>
		
		<a href="{$url}{$row.cate_link}/{$row.link}.html" title="{$row.title}" class="viewnow">Xem ngay</a>
	</div>
	{/if}
</div>
<script type="text/javascript">
	date ="{$row.date_end}";
	time = "{$row.time_end}";
	
	y = date.split("-")[0];
	m = date.split("-")[1];
	d = date.split("-")[2];
	
	h = time.split(":")[0];
	i = time.split(":")[1];
	s = time.split(":")[2];
	
	timeLeft = new Date(y, m - 1, d, h, i, s, 0);
	
	var oDateOne = new Date();
	var oDateTwo = timeLeft;
	if(oDateOne - oDateTwo > 0) {
		$('.countdown').closest('.item-countdown').remove();
	} else {
		$('.countdown').countdown({ until: timeLeft });	
	}
	/*alert(oDateOne - oDateTwo === 0);
	alert(oDateOne - oDateTwo < 0);
	alert(oDateOne - oDateTwo > 0);*/
	
	date = null, time=null,time_left = null;
</script>
