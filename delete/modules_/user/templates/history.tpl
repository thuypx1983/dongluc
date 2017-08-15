
<style type="text/css">
.news-item {
	width:220px;
	height:234px;
	float:left;
	position:relative;
	margin:0 20px 20px 0;
}
.news-item img {
	width:220px;
	max-height:117px;
}
.item-title {
	color:#454545;
	
}
.item-title h3 {
	margin:10px 0 15px;
	font-weight:normal;
	line-height:20px;
	font-size:12px;
}
.item-title:hover {
	color:#c00;
}
.cate-item {
	display:block;
	border-bottom:1px dashed #ccc;
	padding:10px 0 10px 24px;
	color:#666;
	font-size:14px;
	transition:background 0.5s;
	background:url({$url}images/icon-arrow.png) no-repeat center left;
}
.cate-item:last-of-type {
	border:none;
}
.cate-item:hover {
	background:#ffa66a;
	color:#fff;
	border-left:14px solid #ddedbc;
}
.cate-item.active {
	background:#ff6904;
	color:#fff;
	border-left:14px solid #ddedbc;
}
</style>
<style type="text/css">
.user-table {
	border:1px solid #ccc;
	border-left:none;
	border-bottom:none;
	width:100%;
}
.user-table td {
	padding:10px;
	border:1px solid #ccc;
	border-right:none;
	border-top:none;
}
.user-table tr:nth-of-type(1) {
	font-weight:bold;
	background:#61972b;
	color:#fff;
	font-size:11px;
}
</style>

<script type="text/javascript" src="{$url}js/validate.js"></script>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
		
			<div id="rootpath" style="margin:10px 0 20px;">
				<a href="{$url}" class="rt_home" title="Trang chủ"></a>
				<span></span>
				<a href="{$url}lich-su/">Hóa đơn của bạn</a>
			</div>
			
			<table class="table table-bordered user-table" border="0" cellpadding="0" cellspacing="0">
				<td>STT</td>
				<td>Thông tin sản phẩm</td>
				<td>Số lượng</td>
				<td>Hình thức v/chuyển</td>
				<td>Trạng thái</td>
			
				{foreach from=$rows item=row key=k}
				<tr>
					<td>{$k+1}</td>
					<td>
						<div class="media-body"> <img src="{$url}upload/product/{$row.photo}" alt="" width="80"  class="pull-left"/>
							<p><strong>{$row.title}</strong></p>
							<span class="gia" style="text-decoration:line-through; color:red; margin-right:10px;">Giá:{$row.price|number_format:0:".":","} vnđ</span>
							<span class="gia">Giá: {($row.price-($row.price*$row.discount*0.01))|number_format:0:".":","} vnđ</span>
							<div>Ngày tạo: {$row.create_date|date_format:"%d/%m/%Y"}</div>
						</div>
					</td>
					<td>{$row.quantity}</td>
					<td>
						{if $row.giaohang==product}
							<span>Giao hàng</span>
						{else}
							<span>Giao Voucher</span>
						{/if}
					</td>
					<td>
						{if $row.is_process==1}
							<span class="thanhtoan">Đã thanh toán</span>
						{else}
							<span class="cthanhtoan">Chưa thanh toán</span>
						{/if}
					</td>
				</tr>
				
				{foreachelse}
				<tr>
					<td colspan="5"><em>Chưa có sản phẩm nào</em></td>
				</tr>
				{/foreach}
			</table>
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
		
		
		<div class="box margin-20 padding-10" style="padding-left:20px; padding-right:20px;">
			{include file='category.tpl'}
		</div>
		
		<div class="box margin-20" style="padding:10px 0;">
			{include file='support.tpl'}
		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>
		  
		  

