<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 08:31:44
         compiled from "admin/modules/user/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208845949255515800b25385-69059751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db53f2575cea0eeaacba0c2a36ab4a027b8e51ed' => 
    array (
      0 => 'admin/modules/user/templates/login.tpl',
      1 => 1397456984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208845949255515800b25385-69059751',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_echo' => 0,
    'error' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55515800b65e0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55515800b65e0')) {function content_55515800b65e0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_redirect')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.redirect.php';
?><form action="" method="post" style="margin: 0px; padding: 0px;">
    <table width="100%" border="0" style="height:auto">
    	<tr>
        	<td align="center" valign="top">
            	
                <?php if ($_smarty_tpl->tpl_vars['error_echo']->value!=''){?>
                    <?php if ($_smarty_tpl->tpl_vars['error']->value=='success'){?>
                        <div style="color:green">[<?php echo $_smarty_tpl->tpl_vars['error_echo']->value;?>
]</div>
                    <?php }else{ ?>
                        <div style="color:red">[<?php echo $_smarty_tpl->tpl_vars['error_echo']->value;?>
]</div>
                    <?php }?>
                <?php }?>
                <div style="width:434px; height:214px; position:relative; margin-top:160px;">
                    
                    <div style="background:url(<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/1.jpg) repeat-x; height:200px; float:left; width:420px; border-left:2px solid #b1b1b1; border-right:2px solid #b1b1b1; text-align:left; padding-left:10px; position:relative">
                        <div style="font-size: 14px; font-weight: bold; margin-top: 10px;">Đăng nhập hệ thống quản trị [ <a style="font-size: 12px; font-weight: normal; margin-top: 5px; color: #FFF; text-decoration: none;" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"> Trang chủ</a> ]</div> 
                                <div style="height:108px; position:absolute; left: 2px; top: 45px; width: 423px;">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/lock.jpg" align="left">
                            <div style="float:left; width:320px; height:90px; font-size:12px; margin-left:10px; padding-top:20px;">
                                <table width="100%" border="0" cellspacing="3" cellpadding="3">
                                	<tr>
                                    	<td>Tên đăng nhập</td>
                                    	<td><input name="tex_username" id="tex_username" style="width:200px" placeholder="Username" type="text" ></td>
                                  	</tr>
                                  	<tr>
                                        <td>Mật khẩu</td>
                                        <td><input name="tex_password" placeholder="Password" type="password" style="width:200px"></td>
                                	</tr>
                            	</table>
                            </div>
                        </div>
                        <div style="position:absolute; left: 33px; top: 144px; width: 422px; height: 44px;">
                            <div style="position:absolute;  position:absolute; width:205px; left: 218px; height: 30px;  padding-top:6px;">
                                <input type="submit" value="login" style="background:url(<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/button.jpg); height:29px; width:105px; border:none; margin-left:50px; font-size:14px; color:#fff; font-weight:bold;">
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
    		</td>
    	</tr>
    </table>
</form>
<?php if ($_smarty_tpl->tpl_vars['error']->value!="success"&&$_smarty_tpl->tpl_vars['error']->value!="logout_success"){?>
<?php }else{ ?>
    <?php echo smarty_function_redirect(array('url'=>'?','time'=>1),$_smarty_tpl);?>

<?php }?><?php }} ?>