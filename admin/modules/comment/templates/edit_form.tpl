
<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Sửa câu hỏi</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none;">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						<!-- <tr>
						  <td class="col_left">Type</td>
						  <td class="col_right">
							<input name="type" type="text" readonly="readonly" value="{if $row.type==product}Sản phẩm{else}Bài viết{/if}" />
						  </td>
						</tr> -->
						<!-- <tr>
						  <td class="col_left">Code</td>
						  <td class="col_right">
							<input name="code" type="text" readonly="readonly" value="{$row.id}" />
						  </td>
						</tr> -->
                        <!-- <tr>
						  <td class="col_left">Parent</td>
						  <td class="col_right">
							<input name="parent_id" type="text" readonly="readonly" value="{$row.parent_id}" />
						  </td>
						</tr> -->
						<tr>
						  <td class="col_left">Tên</td>
						  <td class="col_right">
							<input name="name" type="text"  value="{$row.name}" size="80" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Email</td>
						  <td class="col_right">
							<input name="email" type="text" value="{$row.email}" size="80" />
						  </td>
						</tr>
						<tr>
							<td class="col_left">Nội dung</td>
							<td class="col_right">{if $row.reply_to_name!=''}<rep>@{$row.reply_to_name}</rep>{/if}<br/><textarea name="content" rows="10" cols="60">{$row.content}</textarea></td>
						</tr>
										
						<tr>
						  <td class="col_left"><strong>Cho hiện?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1} checked="checked"{/if} /></td>
						</tr>
						<tr>
							<td class="col_left">Comment for</td>
							<td class="col_right"><input name="product_title" type="text" value="{$row.product_title}" readonly="readonly" size="70"/></td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Xem chi tiết</td>
							<td class="col_right"><a href="http://{$row.link}" target="_blank">http://{$row.link}</a></td>
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







