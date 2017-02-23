<style type="text/css">
#rootpath
{literal}{{/literal}		
	color: #477900;
	width: 100%;
	height: 40px;	
	text-align: left;
	font-weight: bold;		
	background-color:#03F;


	background:url({$url}admin/modules/rootpath/templates/images/rootpath2.gif) repeat-x;
	
{literal}}{/literal}
</style>

<table cellspacing="0" cellpadding="0" width="100%" style="	border:1px solid #d5d5d5; border-bottom:none;">
	<tr>
		<td valign="middle" id="rootpath">
			&nbsp;&nbsp;{$rootpath}
		</td>
        <td valign="middle" align="right" id="rootpath" width="100px">
		<div id="loader" style="float: right; margin-right: 10px; font-weight: normal; color: white;">
		{*{if $arr_check!= '' && $arr_value!=''}
			{foreach name=foo from=$arr_check item=item}
            	{if $smarty.foreach.foo.index > 0}&nbsp;|{/if}
				<span style="cursor:pointer;" class="out" onmouseover="this.className='over'" onmouseout="this.className = 'out'" onclick="event_check('{$item.task}','{$item.confirm}');">{$item.display}</span>
			{/foreach}
		{/if}*}
		</div>
		
		</td>
	</tr>
</table>

{if $msg!=""}
<div style="width:100%; position:fixed; top:80px;left:0;" id="msg">
	<div style="margin:auto; padding:6px 0 0px;  border:1px solid #a2d246; border-radius:4px; -moz-border-radius:4px; box-shadow:0px 0px 20px #ccc; -moz-box-shadow:0px 0px 20px #ccc; background:#ebf8a4; width:300px; height:24px; text-align:center; ">
    	{if $msg=="add"}
            Thêm thành công
        {elseif $msg=="edit"}
            Cập nhật thành công
		{elseif $msg=="send"}
            Gửi email thành công
		{elseif $msg=="send_error"}
            Chưa gửi được email, vui lòng kiểm tra lại
		{elseif $msg=="refused"}
            Từ chối thành công
        {elseif $msg=="copy"}
            Sao chép thành công
        {else}
        	Xóa thành công
        {/if}
    </div>
</div>
 
{/if}
{literal}
<script>
var test = 0;
function hideMSG()
{
	$("#msg").fadeOut(500);
}

setTimeout("hideMSG()", 3000);
</script>

{/literal} 




