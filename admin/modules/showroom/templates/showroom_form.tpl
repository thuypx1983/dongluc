<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						<tr>
						  <td class="col_left" style="width:150px">Vùng miền</td>
						  <td class="col_right">
								<select name="region_id">
								<option value="">---</option>
								{html_options options=$region selected=$row.region_id}
							</select>
						  </td>
						</tr>
						<tr>
                            <td class="col_left" valign="top">Thumb (146x217)</td>
                            <td class="col_right">
                                <input name="thumb" type="file" onchange="check_file_upload(this)" /><br />
                                {if $row.thumb!=""}
                                    <img src="upload/showroom/thumb/{$row.thumb}" /> <br />
                                    <input type="checkbox" name="che_delthumb" /> Xóa ảnh này ?
                                    <input type="hidden" name="hid_oldthumb" value="{$row.thumb}" />
                                {/if}                            
                            </td>
						</tr>
						<tr>
						  <td class="col_left">Tiêu đề</td>
						  <td class="col_right">
							<input name="title" type="text"  value="{$row.title}" size="70" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Đường dẫn</td>
						  <td class="col_right">
							<input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="{$row.link}" size="70" /> (Không nhập sẽ tự tạo link)<br />
							{$row.link}
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Địa chỉ</td>
						  <td class="col_right">
							<input name="address" type="text"  value="{$row.address}" size="50" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Email</td>
						  <td class="col_right">
							<input name="email" type="text"  value="{$row.email}" size="50" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Hotline</td>
						  <td class="col_right">
							<input name="hotline" type="text"  value="{$row.hotline}" size="50" />
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Fax</td>
						  <td class="col_right">
							<input name="fax" type="text"  value="{$row.fax}" size="50" />
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Kinh độ</td>
						  <td class="col_right">
							<input name="longitude" type="text"  value="{$row.longitude}" size="50" />
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Vĩ độ</td>
						  <td class="col_right">
							<input name="latitude" type="text"  value="{$row.latitude}" size="50" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Bài viết</td>
						  <td class="col_right">
							{'content'|ckeditor:$row.content:'Full'}
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Thứ tự</td>
						  <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Hiện?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1 || $smarty.get.task=='add'} checked="checked"{/if} /></td>
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




