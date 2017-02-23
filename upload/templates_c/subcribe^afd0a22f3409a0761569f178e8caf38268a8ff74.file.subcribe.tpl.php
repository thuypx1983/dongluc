<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 10:00:40
         compiled from "modules/subcribe/templates/subcribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131826771455f789d8d06523-50807700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd0a22f3409a0761569f178e8caf38268a8ff74' => 
    array (
      0 => 'modules/subcribe/templates/subcribe.tpl',
      1 => 1432026484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131826771455f789d8d06523-50807700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg_error' => 0,
    'msg_success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f789d8d7f18',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f789d8d7f18')) {function content_55f789d8d7f18($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
        jQuery("#formRegister").validationEngine({
            'custom_error_messages': {
                '#formRegister_email': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_email_require');?>
"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#formRegister_captcha': {
                    'required': {
                        'message': "Vui lòng nhập mã bảo mật"
                    }
                }
            }
        })
    })
</script>
<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="" style="width:50%;margin:auto"> <a href="" class="head_title">Đăng ký nhận tin</a>
          <div class="f16gray">Nhập địa chỉ email của bạn để nhận tin hàng ngày</div>
          
          <div style="color:red; font-weight:bold; margin-top:20px"><?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
</div>
            <div style="color:green; font-weight:bold; margin-top:20px"><?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>
</div>
          
          <form id="formRegister" class="" name="" action="" method="post">
        <table width="100%" cellpadding="0" cellspacing="0" class="tbl_login">
        
        
        <tr>
        <td>Email</td>
        <td><input type="text" id="formRegister_email" data-validation-engine="validate[required,custom[email]]" name="register_email" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_email');?>
" value="<?php echo $_GET['register_email'];?>
" /></td>
        </tr>
        
        
        <tr>
           <td>Mã bảo mật</td>
        <td>
          <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height: 27px; width:110px; float:right; margin-top:7px;" id="imgCaptcha">
          <input name="register_captcha" id="formRegister_captcha" data-validation-engine="validate[required]" type="text" class="txt_cart" style="width:58%!important; float:left; margin-left:2px;" placeholder="Mã bảo mật">
        </td> 
        </tr>
        <tr>
        <td align="right"></td>
        <td><button type="submit" class="btn_buy_cart" name="submit_register" value="submit_register">Đăng ký</button></td>
        </tr>
        </table>
      </form>
          
        </div>
      </div>
    </div>
  </div><?php }} ?>