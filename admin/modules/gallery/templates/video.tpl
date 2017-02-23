<script type="text/javascript">
function getThumbAlbum(value) {
	$.get("?ajax=true&mod=gallery&sub=video&task=getThumbAlbum&id="+value, function(data){
		$('#div_album').html(data);
	});
}
</script>
<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
 {if $row.last_photo!=''}
 <div style="margin-left:20px;">    
    <p>Ảnh vừa thêm mới</p>
    <img src="upload/gallery/video/thumb/{$row.last_photo}" style="max-width:500px; opacity:0.5;" /> <br />
    <em>Mời bạn chọn tiếp ảnh vào album tại form bên dưới</em>
   </div>
{/if}
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
       
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin video</li>
                <li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
                    	<tr>
							<td class="col_left" valign="bottom">Tiêu đề</td>
							<td class="col_right">
                           	 <input name="title" type="text" value="{$row.title}" size="70" />
                           </td>
						</tr>
						<tr>
							<td class="col_left">Link</td>
							<td class="col_right">
                                <input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="{$row.link}" size="70" /><br />{$row.link}
                                <!-- Hien tai fix all video with album id = 1 -->
                                <input type="hidden" name="album_id" value="1"/>
                            </td>
						</tr>
						<tr>
						  <td class="col_left" style="width: 200px;">Chuyên mục</td>
						  <td class="col_right">
							<div id="div_news_category">
								<select name="news_category_id">
									<option value="">---</option>
									{html_options options=$news_category selected=$row.news_category_id}
								</select>
							</div>
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Ảnh thumb cho video</td>
						  <td class="col_right">
						  <input name="photo" type="file" id="photo" /><br />
                          <em>Vui lòng chọn ảnh đúng kích thước: 300x186</em><br>
							{if $row.photo!=""}
								<img src="upload/gallery/video/thumb/{$row.photo}" style="max-width:500px;" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
							{/if}
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Mã video</td>
						  <td width="800px">{'embed'|ckeditor:$row.embed:'Video':850:500}</td>
                          <!--<td><input name="embed" type="text" value="{$row.embed}" size="70" /></td>-->                          
						</tr>
						<tr>
						  <td class="col_left">Thứ tự</td>

						  <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
						</tr>
						<tr>
						  <td class="col_left">Ngày tạo</td>
						  <td class="col_right"><input name="create_date" type="text" value="{$row.create_date|default:$smarty.now|date_format:'%Y-%m-%d'}" readonly /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Hiện?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1 || $smarty.get.task==add} checked="checked"{/if} /></td>
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