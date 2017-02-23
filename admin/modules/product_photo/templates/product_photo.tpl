
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="15%" class="col_left">&nbsp;</td>
      <td width="85%" class="col_right"><div style="color: red;">{$msg}</div></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}"onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
    <tr style="font-style:oblique; font-size:14px; font-weight:bold; color:#666;">
      <td class="col_left">Ảnh của</td>
      <td class="col_right">
      	{$product_info.title} ({$product_info.code})
        <input name="title" type="hidden" value="" />
      </td>
    </tr>
    <tr>
      <td class="col_left">Photo</td>
      <td class="col_right">
      	<input type="file" name="photo" onchange="check_file_upload(this)" id="photo" />
      </td>
    </tr>
    <!-- <tr>
      <td class="col_left">Tiêu đề</td>
      <td class="col_right"><input name="title" type="text"  id="title" value="{$row.title}" size="80"/></td>
    </tr> -->
    <tr>
      <td class="col_left">Thứ tự</td>
      <td class="col_right"><input name="z_index" type="text"  id="z_index" value="{$row.z_index}" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>
</form>

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