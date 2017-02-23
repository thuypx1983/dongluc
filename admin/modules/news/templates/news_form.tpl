<script type="text/javascript">
function getNewsCategory(value) {
	$.get("?ajax=true&mod=news&task=getNewsCategory&menu_type="+value, function(data){
		$('#div_news_category').html(data);
	});
}
</script>
<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin bài viết</li>
				<li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
                    	<!-- <tr>
						  <td class="col_left">Nhóm danh mục</td>
						  <td class="col_right">
                            <select name="menu_type" onchange="getNewsCategory(this.value)">
                                <option value="">---</option>
                                {html_options options=$menu_type selected=$row.menu_type}
                            </select>							
						  </td>
						</tr>
						 -->
						<tr>
						  <td class="col_left">Danh mục</td>
						  <td class="col_right">
                          	<div id="div_news_category">
	                            <select name="news_category_id">
	                                <option value="">---</option>
	                                {html_options options=$parent selected=$row.news_category_id}
	                            </select>
	                            <input name="menu_type" type="hidden" value="" />
                            </div>
						  </td>
						</tr>
                        <!-- <tr>
                        	<td><hr/></td>
                            <td><hr/></td>
                        </tr> -->
						<tr>
							<td class="col_left">Tiêu đề</td>
							<td class="col_right"><input name="title" type="text" value="{$row.title}" size="70" /></td>
						</tr>
						<tr>
							<td class="col_left">Link</td>
							<td class="col_right"><input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="{$row.link}" size="70" /><br />{$row.link}</td>
						</tr>
                        <tr>
						  <td class="col_left">Ảnh</td>
						  <td class="col_right">
						  <input name="photo" type="file" id="photo" /><br />
                          <em>Vui lòng chọn ảnh đúng kích thước: 200x130</em><br>
							{if $row.photo!=""}
								<img src="upload/news/thumb/{$row.photo}" style="max-width:500px;" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
							{/if}
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Mô tả</td>
						  <td><textarea name="description" cols="100" rows="8">{$row.description}</textarea></td>
						</tr>
						<tr>
						  <td class="col_left">Nội dung</td>
						  <td>{'content'|ckeditor:$row.content:'Full':850:800}</td>
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
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1 || $smarty.get.task=='add'} checked="checked"{/if} /></td>
						</tr>
                        <tr>
						  <td class="col_left"><strong>Nổi bật?</strong></td>
						  <td class="col_right"><input name="is_top" type="checkbox" value="1" {if $row.is_top==1} checked="checked"{/if} /></td>
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
							<td><textarea name="seo_description" class="input" style="width:500px; height:100px;">{$row.seo_photo_alt}</textarea></td>
						</tr>
						<tr>
							<td>Từ khóa (Meta)</td>
							<td><textarea name="seo_keyword" class="input"  style="width:500px; height:100px;">{$row.seo_photo_alt}</textarea></td>
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