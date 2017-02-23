{literal}
<style type="text/css">
.col_left
{
	width: 100px;
	text-align: right;
	font-weight: bold;
}
.col_right
{
	text-align: left;
}
</style>
{/literal}
<form id="form1" name="form1" method="post" action="">
  <table border="0" cellpadding="3" cellspacing="0">
  	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit" value="{#button_submit#}" />
      <input type="button" name="Submit2" value="{#button_back#}" onclick="history.go(-1)"/></td>
    </tr>    
  	
    <tr>
      <td class="col_left">Title</td>
      <td class="col_right"><input type="text" name="title" style="width: 400px; " value="{$row.title}" /> </td>
    </tr> 
    <tr>
      <td class="col_left">Link</td>
      <td class="col_right"><input type="text" name="link" style="width: 400px; " value="{$row.link}" /> </td>
    </tr>
    <tr>
      <td class="col_left">Order</td>
      <td class="col_right"><input type="text" name="z_index" style="width: 400px; " value="{$row.z_index}" /> </td>
    </tr>
    <tr>
      <td class="col_left">Active ?</td>
      <td class="col_right">	 
	  		<input name="is_show" type="checkbox" value="1" {if $row.is_show ==1} checked="checked" {/if}/></td>
    </tr>
    <tr>
      <td class="col_left">Parent menu</td>
      <td class="col_right">
      <select name="parent_id">
	  <option value="">---</option>
      {html_options  options=$parent selected=$row.parent_id}
      </select>
      </td>
    </tr>

    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit" value="{#button_submit#}" />
      <input type="button" name="Submit2" value="{#button_back#}" onclick="history.go(-1)"/></td>
    </tr>
  </table>
</form>