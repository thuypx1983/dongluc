
<script type="text/javascript">

function timkiem() {
	type = $('.find_type').val();
	keyword = $('.find_keyword').val();
	
	path = "";
	if(keyword!='' || type!='san-pham') {
		if(keyword!='')	{
			keyword = $.trim(keyword);
			keyword = keyword.replace(/\s+/g,"+") + "/";
		}
		path = type+"/"+keyword;
	}
		
	location.href = url+path;
}

</script>

<form method="get" onSubmit="timkiem(); return false;">
	<table class="tbl-search">
		<tr>
			<td><input type="text" class="input keyword find_keyword" value="{$smarty.get.keyword}" placeholder="Nhập từ khóa tìm kiếm..."  {if $smarty.session.cart}style="width:310px;"{/if} /></td>
			<td>
				<select class="dropdown category find_type" {if $smarty.session.cart}style="width:310px;"{/if}>
					<option value="san-pham">Tất cả danh mục</option>
					{html_options options=$type selected=$smarty.get.type}
				</select>
			</td>
			<td>
				<button class="btn" type="submit">Tìm kiếm</button>
			</td>
			{if $smarty.session.cart}
			<td>
				<div style="padding-left:15px; margin-left:15px; border-left:5px dashed #dfeebf;">
					<button class="btn" type="button" style="background:#0a9ffa;" onclick="call_cbox(); return false;">Giỏ hàng ({count($smarty.session.cart)})</button>
					<button class="btn" type="button" style="background:#c00;" onclick="location.href=url+'thanh-toan/'">Thanh toán</button>
				</div>
			</td>
			{/if}
		</tr>
	</table>
</form>
