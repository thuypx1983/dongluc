
<script type="text/javascript" src="{$url}SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="{$url}SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	    <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/>
		<div style="color:red; margin-top:10px;">{$msg}</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Trả lời</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none;">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						
						<tr>
							<td class="col_left">Câu hỏi</td>
							<td class="col_right" style="color:green">{$row.content}</td>
						</tr>
						<tr>
							<td class="col_left">Comment for</td>
							<td class="col_right">{$row.product_title}</td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Xem chi tiết</td>
							<td class="col_right"><a href="http://{$row.link}" target="_blank">http://{$row.link}</a></td>
						</tr>

						<tr>
						  <td class="col_left">Trả lời với tên</td>
						  <td class="col_right">
							<input name="name" type="text"  value="Admin" size="80" />
							<input type="hidden" name="reply_to_name" value="{$row.name}" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Email</td>
						  <td class="col_right">
							<input name="email" type="text" value="{$email_contact}" size="80" />
						  </td>
						</tr>
						<tr>
							<td class="col_left">Trả lời:</td>
							<td class="col_right">
								{if $row.parent_id > 0}
								<textarea name="content" rows="10" cols="60" disabled="disabled">Đây đã là câu trả lời, vui lòng quay trở lại</textarea>
								{elseif $row.is_replied==1}
								<textarea name="content" rows="10" cols="60" disabled="disabled">Câu hỏi này đã có trả lời</textarea>
								{else}
								<textarea name="content" rows="10" cols="60"	></textarea>
								{/if}
							</td>
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







