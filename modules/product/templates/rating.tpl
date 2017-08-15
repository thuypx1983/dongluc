<a href="" class="head_title">Đánh giá sản phẩm</a>

        <link rel="stylesheet" href="{$url}plugin/raty-master/lib/jquery.raty.css" type="text/css"/>
        <script src="{$url}plugin/raty-master/lib/jquery.raty.js" type="text/javascript" charset="utf-8"></script>

        
        <script type="text/javascript">
        $.fn.raty.defaults.path = '{$url}plugin/raty-master/lib/images';
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
                    <b>Mã bảo mật: <span id="reload_captcha_raty">{$smarty.session.captcha_raty_a}+{$smarty.session.captcha_raty_b} =</span> </b>
                    <input type="text" id="formRaty_captcha" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="captcha_raty_c" class="txt_rate" placeholder="Kết quả bảo mật" style="width:76.4%" />
                </td>
              </tr>
              <tr>
                <td>
                    Đánh giá của bạn:&nbsp; <span id="click_to_raty"></span>
                    <input type="hidden" name="product_id" value="{$smarty.get.pid}" />
                    <input type="text" id="formRaty_rating" data-prompt-position="bottomRight" data-validation-engine="validate[required]" name="rating" style="visibility: hidden; height:1px" >
                </td>
                <td align="right">
                    <button name="submit_rating" value="1" type="submit" class="btn_faq" style="padding:8px 19px">Gửi đánh giá</button>
                </td>
              </tr>
            </table>
        </form>