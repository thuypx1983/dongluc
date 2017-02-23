<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 08:31:44
         compiled from "admin/modules/rootpath/templates/rootpath.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100207438755515800a4fcd0-46126934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83cdd5f6a4c92ef73c7e9bf295fccb8859f237da' => 
    array (
      0 => 'admin/modules/rootpath/templates/rootpath.tpl',
      1 => 1430791055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100207438755515800a4fcd0-46126934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'rootpath' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55515800a8f0c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55515800a8f0c')) {function content_55515800a8f0c($_smarty_tpl) {?><style type="text/css">
#rootpath
{		
	color: #477900;
	width: 100%;
	height: 40px;	
	text-align: left;
	font-weight: bold;		
	background-color:#03F;


	background:url(<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/modules/rootpath/templates/images/rootpath2.gif) repeat-x;
	
}
</style>

<table cellspacing="0" cellpadding="0" width="100%" style="	border:1px solid #d5d5d5; border-bottom:none;">
	<tr>
		<td valign="middle" id="rootpath">
			&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>

		</td>
        <td valign="middle" align="right" id="rootpath" width="100px">
		<div id="loader" style="float: right; margin-right: 10px; font-weight: normal; color: white;">
		
		</div>
		
		</td>
	</tr>
</table>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div style="width:100%; position:fixed; top:80px;left:0;" id="msg">
	<div style="margin:auto; padding:6px 0 0px;  border:1px solid #a2d246; border-radius:4px; -moz-border-radius:4px; box-shadow:0px 0px 20px #ccc; -moz-box-shadow:0px 0px 20px #ccc; background:#ebf8a4; width:300px; height:24px; text-align:center; ">
    	<?php if ($_smarty_tpl->tpl_vars['msg']->value=="add"){?>
            Thêm thành công
        <?php }elseif($_smarty_tpl->tpl_vars['msg']->value=="edit"){?>
            Cập nhật thành công
		<?php }elseif($_smarty_tpl->tpl_vars['msg']->value=="send"){?>
            Gửi email thành công
		<?php }elseif($_smarty_tpl->tpl_vars['msg']->value=="send_error"){?>
            Chưa gửi được email, vui lòng kiểm tra lại
		<?php }elseif($_smarty_tpl->tpl_vars['msg']->value=="refused"){?>
            Từ chối thành công
        <?php }elseif($_smarty_tpl->tpl_vars['msg']->value=="copy"){?>
            Sao chép thành công
        <?php }else{ ?>
        	Xóa thành công
        <?php }?>
    </div>
</div>
 
<?php }?>

<script>
var test = 0;
function hideMSG()
{
	$("#msg").fadeOut(500);
}

setTimeout("hideMSG()", 3000);
</script>

 




<?php }} ?>