<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;" onsubmit="return validForm()">
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
						  <td class="col_left">Mạng lưới</td>
						  <td class="col_right">
								<select name="mangluoi_id">
								<option value="">---</option>
								{html_options options=$parent selected=$row.mangluoi_id}
							</select>
							
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Địa chỉ</td>
						  <td class="col_right">
							<input name="address" id="map_address" type="text" value="{$row.address}" size="50" />
                            <button class="getGeo" type="button">Get location</button>
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Vĩ độ</td>
						  <td class="col_right">
							<input id="map_lat" name="lat" type="text" value="{$row.lat}"/>
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Kinh độ</td>
						  <td class="col_right">
							<input id="map_lon" name="lon" type="text" value="{$row.lon}"/>
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Tiêu đề</td>
						  <td class="col_right">
							<input name="title" type="text" value="{$row.title}" size="50" />
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Mô tả</td>
						  <td>{'content'|ckeditor:$row.content:'Full':850:300}</td>
						</tr>
                        <tr>
						  <td class="col_left">Icon</td>
						  <td class="col_right">
						  <input name="photo" type="file" id="photo" /><br />
							{if $row.photo!=""}
								<img src="upload/network/{$row.photo}" style="max-width:32px" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
							{/if}
						  </td>
						</tr>
                        <tr>
						  <td class="col_left"><strong>Vị trí chính?</strong></td>
						  <td class="col_right"><input name="is_primary" type="checkbox" value="1" {if $row.is_primary==1} checked="checked" {/if} /></td>
						</tr>
                        <tr>
						  <td class="col_left"><strong>Active?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1} checked="checked" {/if} /></td>
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

$(function(){
	$('.getGeo').click(function(){
		address = $("#map_address").val();
		if (address.length<=0) alert("Nhập chính xác địa chỉ!");
		else {
			$.post("?ajax=true&mod=network_vitri&task=getGeo&address="+address, function(data){
				_split = data.split("|");
				$("#map_lat").val(_split[0]);
				$("#map_lon").val(_split[1]);
				pop_url = "?ajax=true&mod=network_vitri&task=geoPreview&lat="+_split[0]+"&lon="+_split[1];
				popupwindow(pop_url, "pop", 500, 500);		
			});
		}
		return false;
	});
});

function validForm()
{
	if($("#map_lat").val().length<=0 || $("#map_lon").val().length<=0) {
		alert("Vĩ độ hoặc kinh độ không hợp lệ!");
		return false;
	}
	return true;
}

function popupwindow(address, title, w, h) {
	console.log(address, title, w, h);
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	newwindow = window.open(address, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	
	if (window.focus) { newwindow.focus() }
	return false;
}
</script>