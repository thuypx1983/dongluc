<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin chung</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
						<tr>
							<td class="col_left">Tiêu đề</td>
							<td class="col_right"><input name="title" type="text" value="{$row.title}" size="70" /></td>
						</tr>
						<tr>
							<td class="col_left">Link</td>
							<td class="col_right"><input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="{$row.link}" size="70" /><br />{$row.link}</td>
						</tr>
						<tr>
						  <td class="col_left">Thứ tự</td>

						  <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
						</tr>
						<tr>
						  <td class="col_left">Ngày tạo</td>
						  <td class="col_right"><input name="create_date" type="text" value="{$row.create_date|default:$smarty.now|date_format:'%Y-%m-%d'}" readonly="readonly" /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1} checked="checked"{/if} /></td>
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