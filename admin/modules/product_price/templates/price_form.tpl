

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
      <td class="col_left" valign="top">Khoảng giá</td>
      <td class="col_right"><input name="title" value="{$row.title}"><br/>Là đoạn mô tả hiện để lọc sản phẩm;<br/>Nhập ví dụ: <big>0 vnđ - 50.000 vnđ</big></td>
    </tr>
    <tr>
      <td class="col_left">Giá từ</td>
      <td class="col_right">
        <input name="from_val" class="format" type="text" value="{$row.from_val}" />&nbsp;<span class="price_thumb">{$row.from_val|number_format:0:".":","}</span>&nbsp;vnđ
      </td>
    </tr>
    <tr>
      <td class="col_left">Giá đến</td>
      <td class="col_right">
        <input name="to_val" class="format" type="text" value="{$row.to_val}" />&nbsp;<span class="price_thumb">{$row.to_val|number_format:0:".":","}</span>&nbsp;vnđ
      </td>
    </tr>
    <tr>
      <td class="col_left">Thứ tự</td>
      <td class="col_right"><input name="z_index" type="text" value="{$row.z_index}" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>

</form>

<script type="text/javascript">

$(function(){
  $('.format').keyup(function(){
    $(this).parent().find('.price_thumb').html(accounting.formatNumber( $(this).val() ) );
  })
})

</script>