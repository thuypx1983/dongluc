
<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none;">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						
						<tr>
						  <td class="col_left">Nhóm câu hỏi</td>
						  <td class="col_right">
                            <select name="faq_category_id">
                                <option value="">---</option>
                                {html_options options=$parent selected=$row.faq_category_id}
                            </select>
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Câu hỏi</td>
						  <td class="col_right">
							<input name="title" type="text"  value="{$row.title}" size="80" />
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Trả lời</td>
						  <td class="col_right">
							<!--<textarea name="description" cols="70" rows="10">{$row.description}</textarea>-->
                            {"description"|ckeditor:$row.description}
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Thứ tự</td>

						  <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
						</tr>
                        <tr>
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1} checked="checked"{/if} /></td>
						</tr>
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
<style type="text/css">
#label_float {
	border-bottom:1px solid #ccc; 
	padding-bottom:8px; 
	margin-bottom:8px; 
	display:inline-block; 
	padding-right:20px;	
}
#label_float label {
	float:left;
	width:250px;
}

</style>

<script type="text/javascript">

$(function(){
	
	$('#label_float').find(':checked')
		.parent()
			.append(' <a style="color:blue;" href="#" title="" class="viewOldLink">Sửa link cũ</a>')
			.css('font-weight', 'bold');
			
	$('.viewOldLink').click(function(){
		product_type_id = "{$smarty.get.id}";
		product_cate_id = $(this).parent().find('input').val();
		address = "?ajax=true&mod=product_type&task=viewOldLink&product_type_id="+product_type_id+"&product_category_id="+product_cate_id;
		popupwindow(address, "pop", 590, 180);
		
		return false;
	});
	
	
	arr = new Array();
	
	firstItem = {$row.id_of};

	for(key in firstItem) {
	  arr[key] = firstItem[key];
	}
	
	console.log(arr)
	
	$('.viewOldLink').each(function(i){
		
		temp = $(this);
		val = temp.parent().find('input').val();
		
		if(arr[val]!=undefined && arr[val].length>0) {
			temp.append(' <span style="color:green;">[đã sửa]</span>');				
		}
		
	});	
});

function popupwindow(address, title, w, h) {
	console.log(address, title, w, h);
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	newwindow = window.open(address, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	
	if (window.focus) { newwindow.focus() }
	return false;
}
</script>





