

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="15%" class="col_left">&nbsp;</td>
      <td width="85%" class="col_right"><div style="color: red;">{$msg}</div></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}"onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
    <tr>
      <td class="col_left">Vị trí</td>
      <td class="col_right">
			<select name="position">
				<option value="">---</option>
				{html_options options=$position selected=$row.position}
			</select>
      <input type="hidden" value="{$row.position}" name="position_old" />
      <input type="hidden" value="" name="description" />
			<input type="hidden" value="0" name="news_category_id" />
      </td>
    </tr>
	<!-- <tr>
      <td class="col_left">Chuyên mục</td>
      <td class="col_right">
		<div id="div_news_category">
			<select name="news_category_id">
				<option value="">---</option>
				{html_options options=$news_category selected=$row.news_category_id}
			</select>
		</div>
      </td>
    </tr> -->
    
	<tr>
      <td class="col_left">Ads type</td>
      <td class="col_right">
	  	<select name="ads_type" onchange="showEmbed(this.value)">
			{html_options options=$ads_type selected=$row.ads_type}
		</select>	
	</td>
    </tr>
    
	 <tr id="div_embed" style="display:{if $row.ads_type=='flash'}table-row{else}none{/if}">
      <td class="col_left">Mã video</td>
      <td><div style="width:70%">{'embed'|ckeditor:$row.embed:'Video':500:500}</div></td>
    </tr>
    
    <tr>
      <td class="col_left">Ảnh</td>
      <td class="col_right">
      <input name="photo" type="file" onchange="check_file_upload(this)" /><br />
      {if $row.photo!=""}
			<img src="upload/ads/thumb/{$row.photo}" style="max-height:300;max-width:300" /> <br />
			<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
			<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
		{/if}
      </td>
    </tr>

    <!--<tr>
      <td class="col_left">Embed (Dành cho flash)</td>
      <td class="col_right">
		<textarea name="embed">{$row.embed}</textarea>
	</td>
    </tr>-->
    <tr>
      <td class="col_left">Tiêu đề</td>
      <td class="col_right"><input name="title" type="text" value="{$row.title}" /></td>
    </tr>
	
	<!--<tr>
      <td class="col_left">Mô tả</td>
      <td class="col_right">
		<textarea name="description">{$row.description}</textarea>
	</td>
    </tr>-->
	<tr>
      <td class="col_left">Liên kết ngoài</td>
      <td class="col_right">
		<input type="text" name="link" value="{$row.link}" size="80" />
	</td>
    </tr>
	<tr>
      <td class="col_left">Target</td>
      <td class="col_right">
		<select name="target">
			{html_options options=$target selected=$row.target}
		</select>
	</td>
    </tr>
	<tr>
      <td class="col_left"><strong>Active?</strong></td>
      <td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active==1 || $smarty.get.task=='add'} checked="checked"{/if} /></td>
    </tr>
	<tr>
      <td class="col_left">Thứ tự</td>
      <td class="col_right">
		<input type="text" name="z_index" value="{$row.z_index}" />
	</td>
    </tr>
    <tr>
      <td class="col_left">Ngày tạo</td>
      <td class="col_right"><input name="create_date" type="text" value="{$row.create_date|default:$smarty.now|date_format:'%Y-%m-%d'}" readonly="readonly" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>

  
</form>
<script type="text/javascript">
function showEmbed(value) {
  if(value=='flash')
    $('#div_embed').show();
  else
    $('#div_embed').hide();

}
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