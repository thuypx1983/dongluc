<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
 
<style>
#order_left { margin:10px 40px 0 30px; color:#BF0006; font-weight:bold; font-size:14px;}
#order_left strong { background:; width:180px; float:left; color:#000; font-weight:bold; }
#order_left p { clear: both; margin:0; margin-bottom: 10px }
.tbl_showList {
	width:80%;
	margin-top:20px;
	margin-left:30px;
	border:1px solid #ccc;
	border-bottom:none;
	border-left:none;
}
.tbl_showList tr:first-of-type td {
	background:#ddd;
	color:#000;
	font-weight:bold;
	font-size:14px;
}
.tbl_showList td {
	border:1px solid #ccc;
	border-top:none;
	border-right:none;
	padding:8px;
}
.bold {
	font-weight:bold;
}
.red {
	color:#BF0006;
}
.green {
	color:green;
}
.f14 {
	font-size:14px;
}

</style>

  <input type="button" name="Submit2" value="{#button_back#}" style="margin:20px 0 0 20px;" onClick="location.href='{$smarty.session.grid_url}'"/>
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Thông tin người mua hàng : </div>
		<div id="order_left">
			<p><strong>Tên khách hàng : </strong><span style="color:blue;">{$row.name}</span></p>
			<p><strong>Địa chỉ : </strong>{$row.address}</p>
			<p><strong>Tỉnh/ Thành :</strong>{$row.province}</p>
			<p><strong>Di động : </strong>{$row.phone}</p>
			<p><strong>Email: </strong>{$row.email}</p>
			<p><strong>Ngày tạo : </strong>{$row.create_date}</p>
			<p><strong>Chú thích : </strong>{$row.cust_note}</p>
	  </div>
  
  <div style="clear:both;"></div>
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Thông tin giỏ hàng : </div>
    
  <table class="tbl_showList" cellpadding="0" cellspacing="0">
		<tr>
			<td>STT</td>
			<td>Mã Hàng</td>
			<td>Tên sản phẩm</td>
			<td>Thông tin phụ</td>
			<td>Giá gốc</td>
			<td>Giảm giá(%)</td>
			<td>Giá bán</td>
			<td>Số lượng</td>
			<td>Thành tiền</td>
		</tr>
		{assign var=sum value=0}
		{foreach from=$list item=row key=k}
		{assign var=sum value=$sum+($row.price*$row.quantity)}
		<tr>
			<td>{$k+1}</td>
			<td>{$row.code}</td>
			<td><span class="green bold f14">{$row.title}</span></td>
			<td>
				{if $row.color_name!=''}
				<div style="margin-bottom:5px">
					Màu sắc: <span title="{$row.color_name}" style="border:1px solid #e9e9e9;width:20px;height:20px;display:inline-block;padding:2px"><span style="background:{$row.color_code};display:inline-block;width:100%;height:100%"></span></span> ({$row.color_name})
				</div>
				{/if}
				{if $row.size!=''}
				<div>
					Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;font-size:11px">{$row.size}</span>
				</div>
				{/if}
			</td>
			<td>
				<!--<strike>{$row.price|number_format:0:',':'.'}</strike> VNĐ-->
				<!--<div>{($row.price-($row.price*$row.discount*0.01))|number_format:0:',':'.'} VNĐ</div>-->
                <div>{($row.price_goc)|number_format:0:',':'.'} VNĐ</div>
			</td>
			<td>
				{if $row.is_timegold==1}
					<span style="color:#f00;">Giờ vàng : </span>
				{/if}
				{$row.discount}%
			</td>
			<td><div>{($row.price)|number_format:0:',':'.'} VNĐ</div></td>
			<td>{$row.quantity}</td>
			<td class="red">{($row.quantity*$row.price)|number_format:0:',':'.'} VNĐ</td>
		</tr>
		{/foreach}
	</table>
  
  
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;">{$sum|number_format:0:',':'.'} VNĐ.</span></div>
  
 	<input type="button" name="Submit2" value="{#button_back#}" style="margin:20px;" onClick="location.href='{$smarty.session.grid_url}'"/>
</form>