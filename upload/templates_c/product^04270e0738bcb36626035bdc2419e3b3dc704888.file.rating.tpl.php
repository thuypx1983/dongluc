<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 17:45:03
         compiled from "modules/product/templates/rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115053526755f6a52fb44d70-02691793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04270e0738bcb36626035bdc2419e3b3dc704888' => 
    array (
      0 => 'modules/product/templates/rating.tpl',
      1 => 1432021524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115053526755f6a52fb44d70-02691793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a52fba8ab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a52fba8ab')) {function content_55f6a52fba8ab($_smarty_tpl) {?><a href="" class="head_title">Đánh giá sản phẩm</a>

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/raty-master/lib/jquery.raty.css" type="text/css"/>
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/raty-master/lib/jquery.raty.js" type="text/javascript" charset="utf-8"></script>

        
        <script type="text/javascript">
        $.fn.raty.defaults.path = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/raty-master/lib/images';
        $(function(){
            $('#click_to_raty').raty({
                click: function(score, evt) {
                    $('#formRaty_rating').val(score);
                }
            })
            
            $('#formRaty').validationEngine({
                
                ajaxFormValidation: true,
                onBeforeAjaxFormValidation: function () {

                    $.post(url+'?ajax=true&mod=product&task=rating', $('#formRaty').serialize(), function(data){
                        console.log(data);
                        data = data.split("|");
                        if (data[0] == 'false') {
                            alert(data[1]);
                            $('#reload_captcha_raty').html(data[2]);
                        } else {
                            $('#formRaty').slideUp(400, function(){
                                $('#thank_rating').fadeIn(200);
                            }) 
                        }
                           
                    })
                    
                },
                'custom_error_messages': {
                    // Custom Error Messages for Validation Types
                    '#formRaty_subject': {
                        'required': {
                            'message': "Vui lòng nhập chủ đề"
                        }
                    },
                    '#formRaty_content': {
                        'required': {
                            'message': "Vui lòng nhập ý kiến"
                        }
                    },
                    '#formRaty_rating': {
                        'required': {
                            'message': "Vui lòng chọn đánh giá của bạn"
                        }
                    },
                    '#formRaty_captcha': {
                        'required': {
                            'message': "Vui lòng nhập mã bảo mật"
                        }
                    }
                }
            })
        })
        
        /*function click_rating() {
            $("#formRaty").validationEngine({
                'custom_error_messages': {
                    // Custom Error Messages for Validation Types
                    '#formRaty_subject': {
                        'required': {
                            'message': "Vui lòng nhập chủ đề"
                        }
                    },
                    '#formRaty_content': {
                        'required': {
                            'message': "Vui lòng nhập ý kiến"
                        }
                    },
                    '#formRaty_rating': {
                        'required': {
                            'message': "Vui lòng chọn đánh giá của bạn"
                        }
                    }
                }
            });

            //$('#formRaty').slideUp(300);
            //my.LocalStorage.save();
            return false;
        }*/
        </script>
        <div id="thank_rating"><em>Cảm ơn bạn đã đánh giá sản phẩm này</em></div>
        <form id="formRaty" name="" action="" method="post" onSubmit="return false">
            <table width="100%" cellpadding="0" cellspacing="0" class="tbl_rate">
              <tr>
                <td colspan="2">Chủ đề :</td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" id="formRaty_subject" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="subject" class="txt_rate" /></td>
              </tr>
              <tr>
                <td colspan="2">Ý kiến của bạn :</td>
              </tr>
              <tr>
                <td colspan="2"><textarea id="formRaty_content" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="content" class="txt_rate" rows="6"></textarea></td>
              </tr>
              <tr>
                <td colspan="2">
                    <b>Mã bảo mật: <span id="reload_captcha_raty"><?php echo $_SESSION['captcha_raty_a'];?>
+<?php echo $_SESSION['captcha_raty_b'];?>
 =</span> </b>
                    <input type="text" id="formRaty_captcha" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="captcha_raty_c" class="txt_rate" placeholder="Kết quả bảo mật" style="width:76.4%" />
                </td>
              </tr>
              <tr>
                <td>
                    Đánh giá của bạn:&nbsp; <span id="click_to_raty"></span>
                    <input type="hidden" name="product_id" value="<?php echo $_GET['pid'];?>
" />
                    <input type="text" id="formRaty_rating" data-prompt-position="bottomRight" data-validation-engine="validate[required]" name="rating" style="visibility: hidden; height:1px" >
                </td>
                <td align="right">
                    <button name="submit_rating" value="1" type="submit" class="btn_faq" style="padding:8px 19px">Gửi đánh giá</button>
                </td>
              </tr>
            </table>
        </form><?php }} ?>