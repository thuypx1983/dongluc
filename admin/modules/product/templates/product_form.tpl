<script type="text/javascript">

$(function(){
	$('.format').keyup(function(){
		$(this).parent().find('.price_thumb').html(accounting.formatNumber( $(this).val() ) );
	});
	
	$('.price_sale').keyup(function(){
		price_sale = $(this).val();
		price = $('[name="price"]').val();
		rs = 100 - (price_sale*100 / price);
		
		$('.discount_thumb').html(accounting.formatNumber(rs));
		$('.discount').val(rs);
	});
	
	$('.discount').keyup(function(){
		price = $('[name="price"]').val();
		discount = $(this).val();
		if(price >= 0 && discount >= 0) {
			rs = price - (price*discount*0.01);
			$('.price_sale_thumb').html(accounting.formatNumber(rs));
			$('.price_sale').val(rs);
		}
		//$('.discount_thumb').html(accounting.formatNumber( $(this).val() ) );
	});
});

</script>

<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
                    	<tr>
						  <td class="col_left">ID</td>
						  <td class="col_right">
							{$row.id}
						  </td>
						</tr>
						<tr>
						  <td class="col_left" style="width:150px">Danh mục</td>
						  <td class="col_right">
							<select name="product_type_id">
								<option value="">---</option>
								{html_options options=$type selected=$row.product_type_id}
							</select>
						  </td>
						</tr>
						<tr>
						  <td class="col_left">
						  	Ảnh (480*480)
						  	{if $smarty.get.task=='edit'}<div>[<a href="{$url}admin.php?mod=product_photo&mod_id={$smarty.get.id}" target="_blank">Quản lý ảnh PHOTO</a>]</div>{/if}
						  </td>
						  <td class="col_right">
						  <input name="photo" type="file" onchange="check_file_upload(this)" id="photo" /><br />
							{if $row.photo!=""}
								<img src="upload/product/thumb/{$row.photo}" style="max-width:500px;" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
							{/if}
						  </td>
						</tr>
						<tr>
							<td class="col_left">Mã hàng</td>
							<td class="col_right"><input name="code" type="text" value="{$row.code}" /></td>
						</tr>
						<tr>
							<td class="col_left">Tên SP</td>
							<td class="col_right"><input name="title" type="text" value="{$row.title}" size="80"/></td>
						</tr>
						<tr>
							<td class="col_left">Đường dẫn</td>
							<td class="col_right"><input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="{$row.link}" size="80"/> (Không nhập sẽ tự tạo link)<br />{$row.link}</td>
						</tr>
                        <tr>
							<td class="col_left">Liên kết ngoài</td>
							<td class="col_right"><input name="link_out" type="text" value="{$row.link_out}" size="60"/></td>
						</tr>
                        <tr>
						  <td class="col_left">Giá gốc (vnđ)</td>
						  <td><input name="price" class="format" type="text" value="{$row.price}" />&nbsp;<span class="price_thumb">{$row.price|number_format:0:".":","}</span>&nbsp;vnđ</td>
						</tr>
						<tr>
						  <td class="col_left">Giảm giá (%)</td>
							<td>
								<input name="discount" autocomplete="off" class="discount" type="text" value="{$row.discount}" />&nbsp;<span class="discount_thumb">{$row.discount|number_format:0:".":","}</span>%
							</td>
						</tr>
						<tr>
						  <td class="col_left">Giá bán thực (vnđ)</td>
							<td>
                                {if $row.price > 0}
                                <input name="price_sale" autocomplete="off" class="price_sale format" type="text" value="{$row.price-($row.price*$row.discount*0.01)}" />&nbsp;<span class="price_sale_thumb price_thumb">{($row.price-($row.price*$row.discount*0.01))|number_format:0:".":","}</span>&nbsp;vnđ
                                {else}
                                <input name="price_sale" autocomplete="off" class="price_sale format" type="text" value="{$row.price_sale}" />&nbsp;<span class="price_sale_thumb price_thumb">{($row.price_sale)|number_format:0:".":","}</span>&nbsp;vnđ
                                {/if}
                            </td>
						</tr>
						<!-- <tr>
							<td class="col_left" valign="top">Khoảng giá</td>
							<td class="col_right">
								<div class="label_float">
								{html_radios name='price_id' options=$price selected=$row.price_id separator='<br/>'}
								</div>
							</td>
						</tr> -->
						<tr>
							<td class="col_left" valign="top"></td>
							<td class="col_right"><input type="hidden" name="price_id" value=""/></td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Kích cỡ</td>
							<td class="col_right">
								<div class="label_float div_size">
								<label><input type="checkbox" onchange="$('.div_size').find(':checkbox').attr('checked', this.checked);" /> <small>Chọn/ Bỏ chọn tất cả</small></label>
								{html_checkboxes name='size_id' options=$size selected=$row.size_id}
								
								</div>
							</td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Màu sắc</td>
							<td class="col_right">
								<div class="label_float label_color div_color">
									<label><span style="border:none"><input type="checkbox" onchange="$('.div_color').find(':checkbox').attr('checked', this.checked);" /></span><small>Chọn/ Bỏ chọn tất cả</small></label>
									{foreach from=$colors item=c}
										<label>
											<span style="background:{$c.color_code}"><input {if $c.id|in_array:$row.color_id}checked{/if} type="checkbox" name="color_id[]" value="{$c.id}"></span>{$c.title}
										</label>
									{/foreach}
									
								</div>
							</td>
						</tr>
						
						<tr>
							<td class="col_left" valign="top">Chất liệu</td>
							<td class="col_right">
								<div class="label_float div_material">
								<label><input type="checkbox" onchange="$('.div_material').find(':checkbox').attr('checked', this.checked);" /> <small>Chọn/ Bỏ chọn tất cả</small></label>
								{html_checkboxes name='material_id' options=$material selected=$row.material_id}
								
								</div>
							</td>
						</tr>
						

						<tr>
						  <td class="col_left">Nội dung</td>
						  <td>{'content'|ckeditor:$row.content:'Full'}</td>
						</tr>
						<tr>
						  <td class="col_left">Mã video</td>
						  <td><div style="width:70%">{'embed'|ckeditor:$row.embed:'Video':500:500}</div></td>
						</tr>
						<tr>
						  <td class="col_left">Thứ tự</td>
						  <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Nổi bật?</strong></td>
						  <td class="col_right"><input name="is_top" type="checkbox" value="1" {if $row.is_top==1 || $smarty.get.task=='add'} checked="checked"{/if} /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1 || $smarty.get.task=='add'} checked="checked"{/if} /></td>
						</tr>
						<!-- <tr>
						  <td class="col_left" colspan="2">Created by <strong>{$row.user_id}</strong> on <strong>{$row.create_date}</strong></td>
						</tr>
                        {if $row.update_user!=''}
                        <tr>
						  <td class="col_left" colspan="2">LastUpdated by <strong>{$row.update_user}</strong> on <strong>{$row.update_date}</strong></td>
						</tr>
                        {/if} -->
					  </table>
				</div>
				<div class="TabbedPanelsContent">
					<table width="100%" cellpadding="6" cellspacing="0">
						<tr>
							<td width="100px">Tiêu đề (Meta)</td>
							<td><input name="seo_title" class="input" value="{$row.seo_title}" style="width:500px;" /></td>
						</tr>
						<tr>
							<td>Mô tả (Meta)</td>
							<td><textarea name="seo_description" class="input" style="width:500px; height:100px;">{$row.seo_description}</textarea></td>
						</tr>
						<tr>
							<td>Từ khóa (Meta)</td>
							<td><textarea name="seo_keyword" class="input"  style="width:500px; height:100px;">{$row.seo_keyword}</textarea></td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
		
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>  
</form>
<script type="text/javascript">
	var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", { defaultTab:0 });
</script>
<script type="text/javascript">

function check_file_upload(obj){
    var FileSize = obj.files[0].size/(1024*1024);
    var FileExt = obj.value.substr(obj.value.lastIndexOf('.')+1);
    var FileName = obj.files[0].name;
    FileExt = FileExt.toLowerCase();
    console.log(FileSize);
    console.log(FileExt);
    console.log(FileName);
    
	if (FileSize > 1) {
    	alert("Maximum file size is 1 MB");
    	obj.value = '';
    }
}
</script>

<style type="text/css">
.label_float {
	border-bottom:1px solid #ccc; 
	padding-bottom:8px; 
	margin-bottom:8px; 
	display:inline-block; 
	padding-right:20px;	
}
.label_float label {
	float:left;
	width:250px;
}
.label_color {
	
}
.label_color span{
	padding: 3px;
	margin-right: 5px;
	border:1px solid #ccc;
	display: inline-block;
}
</style>