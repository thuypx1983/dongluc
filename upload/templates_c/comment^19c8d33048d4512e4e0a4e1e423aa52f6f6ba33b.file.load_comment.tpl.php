<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 17:45:03
         compiled from "modules/comment/templates/load_comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61151836855f6a52fa17f44-89375859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19c8d33048d4512e4e0a4e1e423aa52f6f6ba33b' => 
    array (
      0 => 'modules/comment/templates/load_comment.tpl',
      1 => 1432001822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61151836855f6a52fa17f44-89375859',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg_error' => 0,
    'row' => 0,
    'comment' => 0,
    'cmt' => 0,
    'cm' => 0,
    'msg_success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a52fb3f76',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a52fb3f76')) {function content_55f6a52fb3f76($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.date_format.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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
        jQuery("#formComment").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#formComment_content': {
                    'required': {
                        'message': "Vui lòng đặt câu hỏi"
                    }
                },
                '#formComment_name': {
                    'required': {
                        'message': "Vui lòng nhập tên của bạn"
                    }
                },
                '#formComment_email': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_email_require');?>
"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#formComment_captcha': {
                    'required': {
                        'message': "Vui lòng nhập mã bảo mật"
                    }
                }
            }
        })
    })
</script>


<div class="content_home pkg">
        <a href="" class="head_title">hỏi đáp</a>
        <div class="input_faq">
            <form id="formComment" name="" action="" method="post">
                <input type="text" id="formComment_content" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="content" class="txt_faq txt_fag_show" placeholder="Đặt câu hỏi cho sản phẩm ..." value="<?php echo $_POST['content'];?>
" />
                <button name="submit_comment" value="1" type="submit" class="btn_faq">Gửi câu hỏi</button>
                <div id="show_more_txt_faq" <?php if ($_smarty_tpl->tpl_vars['msg_error']->value!=''){?>style="display:block"<?php }?>>

                    <input type="hidden" name="product_id" value="<?php echo $_GET['pid'];?>
"/>
                    <input type="hidden" name="product_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/>
                    <input type="hidden" name="type" value="<?php echo $_GET['mod'];?>
"/>
                    <input type="hidden" name="link" value="<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
"/>
                    <input type="hidden" name="parent_id" value="0" />

                    <?php if (!$_SESSION['user']){?>
                    <input type="text" id="formComment_name" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="name" class="txt_faq" placeholder="Tên của bạn" value="<?php echo $_POST['name'];?>
"  />
                    <input type="text" id="formComment_email" data-prompt-position="bottomCenter" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_faq" placeholder="Email của bạn" value="<?php echo $_POST['email'];?>
" />
                    <?php }else{ ?>
                    <input type="text" id="formComment_name" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="name" class="txt_faq" placeholder="Tên của bạn" value="<?php echo $_SESSION['user']['fullname'];?>
" readonly="readonly" />
                    <input type="text" id="formComment_email" data-prompt-position="bottomCenter" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_faq" placeholder="Email của bạn" value="<?php echo $_SESSION['user']['email'];?>
" readonly="readonly" />
                    <?php }?>

                    <div>
                        <b>Mã bảo mật: <?php echo $_SESSION['captcha_a'];?>
+<?php echo $_SESSION['captcha_b'];?>
 = </b>
                        <input type="text" id="formComment_captcha" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="captcha_c" class="txt_faq" placeholder="Kết quả bảo mật" style="width:77.4%" />
                    </div>
                </div>
                <!-- <span class="note_faq">( Bạn cần <a href="">đăng nhập</a> để gửi câu hỏi )</span> -->
            </form>
            
        </div>
        
        
      <div class="list_faq pkg">
        <ul class="content_faq">
            <?php  $_smarty_tpl->tpl_vars['cmt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cmt']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cmt']->key => $_smarty_tpl->tpl_vars['cmt']->value){
$_smarty_tpl->tpl_vars['cmt']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cmt']->key;
?>
            <li class="box_question pkg">
                <span class="icon_ques_ans fl"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_answer.png"/> </span>
                <div class="content_ques fl">
                    <div><span class="name_ques"><?php echo $_smarty_tpl->tpl_vars['cmt']->value['name'];?>
</span><span class="time_ques"> - Vào lúc <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cmt']->value['create_date'],"%d/%m/%Y %H:%m:%S");?>
</span></div>
                    <div class="question"><?php echo $_smarty_tpl->tpl_vars['cmt']->value['content'];?>
</div>
                </div>
            </li>
            
            <li class="box_answer pkg" <?php if (!$_smarty_tpl->tpl_vars['cmt']->value['sub']){?>style="padding-bottom:0"<?php }?>>
                <?php  $_smarty_tpl->tpl_vars['cm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cmt']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cm']->key => $_smarty_tpl->tpl_vars['cm']->value){
$_smarty_tpl->tpl_vars['cm']->_loop = true;
?>
                <span class="icon_ques_ans fl"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_ques.png"/> </span>
                <div class="content_answer fl">
                    <div class="answer"><?php echo $_smarty_tpl->tpl_vars['cm']->value['content'];?>
</div>
                    <div><span class="time_ques">Trả lời bởi</span> <span class="name_ques">Admin</span><span class="time_ques"> - Vào lúc <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cm']->value['create_date'],"%d/%m/%Y %H:%M:%S");?>
</span></div>
                </div>
                <?php } ?>
            </li>
            <?php } ?>

          <!-- <li class="box_question pkg"> <span class="icon_ques_ans fl"><img src="images/icon_answer.png"/> </span>
            <div class="content_ques fl">
              <div><span class="name_ques">Vũ Hoàng</span><span class="time_ques">- ngày 29 tháng 11 năm 2014</span></div>
              <div class="question"> Tôi thường từ 36 đến 38 eo. Với sự mở rộng eo, tôi nên đi với vòng eo 36 </div>
            </div>
          </li>
          <li class="box_answer pkg" style="padding-bottom:0">
            
          </li>
          <li class="box_question pkg"> <span class="icon_ques_ans fl"><img src="images/icon_answer.png"/> </span>
            <div class="content_ques fl">
              <div><span class="name_ques">Vũ Hoàng</span><span class="time_ques">- ngày 29 tháng 11 năm 2014</span></div>
              <div class="question"> Tôi thường từ 36 đến 38 eo. Với sự mở rộng eo, tôi nên đi với vòng eo 36 </div>
            </div>
          </li>
          <li class="box_answer pkg"> <span class="icon_ques_ans fl"><img src="images/icon_ques.png"/> </span>
            <div class="content_answer fl">
              <div class="answer"> Bạn sẽ đi với 38, chồng tôi là 38, và tôi đã trao đổi hai cặp cho vòng eo 40, kể từ 38 thắt lưng là một chút quá chặt chẽ. tôi hy vọng điều này giúp </div>
              <div><span class="time_ques">Trả lời bởi</span> <span class="name_ques">Admin</span><span class="time_ques">- ngày 29 tháng 11 năm 2014</span></div>
            </div>
          </li> -->
        </ul>
      </div>

    </div>

<script type="text/javascript">
$(function(){
    $('.txt_fag_show').focus(function(){
        $('#show_more_txt_faq').slideDown(200);
    })
    <?php if ($_smarty_tpl->tpl_vars['msg_error']->value!=''){?>
        $('html,body').animate({
            scrollTop: $("#formComment").offset().top},
        'slow');
        alert('<?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
');
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msg_success']->value!=''){?>
        alert('<?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>
');
    <?php }?>
})
</script><?php }} ?>