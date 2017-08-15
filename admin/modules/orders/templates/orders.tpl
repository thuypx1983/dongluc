<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
  <table border="0" cellpadding="3" cellspacing="0">

<tr>
      <td width="168" class="col_left">&nbsp;</td>
      <td width="463" class="col_right msg">{$msg}</td>
    </tr>

	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right">
		<input type="submit" name="Submit" value="{#button_submit#}" />
	      <input type="button" name="Submit2" value="{#button_back#}" onClick="location.href='{$smarty.session.grid_url}'"/>
	</td>
    </tr>
	<tr>
      <td class="col_left">Tên khách hàng</td>
      <td class="col_right"><input name="cust_name" type="text" class="input_text" id="cust_name" value="{$row.cust_name}" /></td>
    </tr>
	<tr id="price1">
  <td class="col_left">Địa chỉ</td>
	  <td class="col_right"><input name="address" type="text" class="input_text" id="address" value="{$row.address}" /></td>
	  
	  
    </tr>
	<tr>
	  <td class="col_left">Di động</td>
	  <td class="col_right"><input name="phone" type="text" class="input_text" id="phone" value="{$row.phone}" /></td>
    </tr>
	<tr>
	  <td class="col_left">Tỉnh / Thành</td>
	  <td class="col_right"><label for="province_id">
	    <select name="province_id" id="province_id">
        <option value="0">--- Mời bạn chọn ---</option>
        {html_options options=$province selected=$row.province_id}
	      </select>
	  </label></td>
    </tr>
	<tr>
	  <td class="col_left">E-mail</td>
	  <td class="col_right"><input name="email" type="text" class="input_text"value="{$row.email}" /></td>
    </tr>
	<tr>
	  <td class="col_left">Giới tính</td>
	  <td class="col_right">
          <select name="gender" id="gender">
            <option value="1" {if $row.gender=="1"}selected="selected"{/if}>Nam</option>
            <option value="0" {if $row.gender=="0"}selected="selected"{/if}>Nữ</option>
          </select>
      </td>
    </tr>
	<tr>
      <td class="col_left">Ghi chú của khách hàng</td>
     
	   <td class="col_right"><label for="cust_note"></label>
       <textarea name="cust_note" id="cust_note" cols="45" rows="5">{$row.cust_note}</textarea></td>
  
    </tr>
	<tr>
	  <td class="col_left">Ghi chú của người quản lý</td>
	  <td class="col_right"><textarea name="note" id="note" cols="45" rows="5">{$row.note}</textarea></td>
    </tr>
	<tr>
	  <td class="col_left">&nbsp;</td>
	  <td class="col_right">&nbsp;</td>
    </tr>
    <tr>
      <td class="col_left">Ngày tạo</td>
      <td class="col_right">
    {'create_date'|select_date:$row.create_date}
      </td>
    </tr>	
     <tr>
		<td align="right" valign="top"><b>Xử lý </b></td>
		<td valign="top" align="left"><input name="is_processed" type="checkbox" value="1" {if $row.is_processed == "1"} checked="checked" {/if}/></td>
	</tr>
	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit" value="{#button_submit#}" />
     <input type="button" name="Submit2" value="{#button_back#}" onClick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
 
  </table>
</form>