<link rel="stylesheet" href="{$url}plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="{$url}plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="{$url}plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="{$url}plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

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
                        'message': "{#form_contact_email_require#}"
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
                <input type="text" id="formComment_content" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="content" class="txt_faq txt_fag_show" placeholder="Đặt câu hỏi cho sản phẩm ..." value="{$smarty.post.content}" />
                <button name="submit_comment" value="1" type="submit" class="btn_faq">Gửi câu hỏi</button>
                <div id="show_more_txt_faq" {if $msg_error!=''}style="display:block"{/if}>

                    <input type="hidden" name="product_id" value="{$smarty.get.pid}"/>
                    <input type="hidden" name="product_title" value="{$row.title}"/>
                    <input type="hidden" name="type" value="{$smarty.get.mod}"/>
                    <input type="hidden" name="link" value="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
                    <input type="hidden" name="parent_id" value="0" />

                    {if !$smarty.session.user}
                    <input type="text" id="formComment_name" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="name" class="txt_faq" placeholder="Tên của bạn" value="{$smarty.post.name}"  />
                    <input type="text" id="formComment_email" data-prompt-position="bottomCenter" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_faq" placeholder="Email của bạn" value="{$smarty.post.email}" />
                    {else}
                    <input type="text" id="formComment_name" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="name" class="txt_faq" placeholder="Tên của bạn" value="{$smarty.session.user.fullname}" readonly="readonly" />
                    <input type="text" id="formComment_email" data-prompt-position="bottomCenter" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_faq" placeholder="Email của bạn" value="{$smarty.session.user.email}" readonly="readonly" />
                    {/if}

                    <div>
                        <b>Mã bảo mật: {$smarty.session.captcha_a}+{$smarty.session.captcha_b} = </b>
                        <input type="text" id="formComment_captcha" data-prompt-position="bottomCenter" data-validation-engine="validate[required]" name="captcha_c" class="txt_faq" placeholder="Kết quả bảo mật" style="width:77.4%" />
                    </div>
                </div>
                <!-- <span class="note_faq">( Bạn cần <a href="">đăng nhập</a> để gửi câu hỏi )</span> -->
            </form>
            
        </div>
        
        
      <div class="list_faq pkg">
        <ul class="content_faq">
            {foreach from=$comment item=cmt key=k}
            <li class="box_question pkg">
                <span class="icon_ques_ans fl"><img src="{$url}images/icon_answer.png"/> </span>
                <div class="content_ques fl">
                    <div><span class="name_ques">{$cmt.name}</span><span class="time_ques"> - Vào lúc {$cmt.create_date|date_format:"%d/%m/%Y %H:%m:%S"}</span></div>
                    <div class="question">{$cmt.content}</div>
                </div>
            </li>
            
            <li class="box_answer pkg" {if !$cmt.sub}style="padding-bottom:0"{/if}>
                {foreach from=$cmt.sub item=cm}
                <span class="icon_ques_ans fl"><img src="{$url}images/icon_ques.png"/> </span>
                <div class="content_answer fl">
                    <div class="answer">{$cm.content}</div>
                    <div><span class="time_ques">Trả lời bởi</span> <span class="name_ques">Admin</span><span class="time_ques"> - Vào lúc {$cm.create_date|date_format:"%d/%m/%Y %H:%M:%S"}</span></div>
                </div>
                {/foreach}
            </li>
            {/foreach}

          <!-- <li class="box_question pkg"> <span class="icon_ques_ans fl"><img src="images/icon_answer.png"/> </span>
            <div class="content_ques fl">
              <div><span class="name_ques">Vũ Hoàng</span><span class="time_ques">- ngày 29 tháng 11 năm 2014</span></div>
              <div class="question"> Tôi thường từ 36 đến 38 eo. Với sự mở rộng eo, tôi nên đi với vòng eo 36 </div>
            </div>
          </li>
          <li class="box_answer pkg" style="padding-bottom:0">
            {*<span class="icon_ques_ans fl"><img src="images/icon_ques.png"/> </span>
             <div class="content_answer fl">
              <div class="answer"> Bạn sẽ đi với 38, chồng tôi là 38, và tôi đã trao đổi hai cặp cho vòng eo 40, kể từ 38 thắt lưng là một chút quá chặt chẽ. tôi hy vọng điều này giúp </div>
              <div><span class="time_ques">Trả lời bởi</span> <span class="name_ques">Admin</span><span class="time_ques">- ngày 29 tháng 11 năm 2014</span></div>
            </div> *}
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
    {if $msg_error!=''}
        $('html,body').animate({
            scrollTop: $("#formComment").offset().top},
        'slow');
        alert('{$msg_error}');
    {/if}
    {if $msg_success!=''}
        alert('{$msg_success}');
    {/if}
})
</script>