<script type="text/javascript" src="{$url}js/cloudzoom.js"></script>
<script type="text/javascript" src="{$url}js/thumbelina.js"></script>
<div class="grid1060">
    <div class="content_cate pkg">
      <div class="col700 fl">
        <div class="breadcumb_product pkg">
          <div class="fl">
            {foreach from=$bread item=bre key=k}
            <a href="{$url}{if $bre.link}{$bre.link}-{$bre.id}{if count($bread)>($k+1)}/{else}.html{/if}{/if}" {if 1==($k+1)} class="first_bread" {/if}>{$bre.title}</a>
            {if count($bread)>($k+1)}<span class="arr_bread"><img src="{$url}images/arr_brad.png"/></span>{/if}
            {/foreach}
            </div>
        </div>
        <div class="box_detail_product pkg">
          <div class="col500 fl">
            <div id="surround">
              <div class="show_video_product"> <img src="photo/video.jpg" style="max-width:100%"/> </div>
              <img class="cloudzoom" alt="Cloud Zoom small image" id="zoom1" src="photo/image1.jpg" data-cloudzoom="
           zoomSizeMode:&quot;image&quot;,
           autoInside: 550
       " style="-webkit-user-select: none;">
              <div class="fl box_play_video"> <a href="javascript:;" class="show_video"><img src="images/icon_play.png"/></a><a href=""><img src="images/icon_pause.png"/></a> </div>
              <div id="slider1" class="fl">
                <div class="thumbelina-but horiz left">˂</div>
                <div style="position:absolute;overflow:hidden;width:100%;height:100%;">
                  <ul class="thumbelina" style="left: -88px;">
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image11.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image1.jpg&#39; "></li>
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image21.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image2.jpg&#39; "></li>
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image31.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image3.jpg&#39; "></li>
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image41.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image4.jpg&#39; "></li>
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image51.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image5.jpg&#39; "></li>
                    <li style="display: inline-block;"><img class="cloudzoom-gallery" src="photo/image61.jpg" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;photo/image6.jpg&#39; "></li>
                  </ul>
                </div>
                <div class="thumbelina-but horiz right">˃</div>
              </div>
            </div>
          </div>
          <div class="col270 fr">
            <div class="name_detail">{$row.title}</div>
            <div class="view_vote pkg"><span class="star_vote fl"><img src="images/rate1.jpg"/></span><span class="total_vote fl">69 đánh giá</span> </div>
            {$balance_vnd = $row.price - $row.price_sale}
            <div class="old_price">Giá gốc: {$row.price|number_format:0:".":","} vnđ (-{$balance_vnd|number_format:0:".":","} vnđ)</div>
            <div class="new_price">{$row.price_sale|number_format:0:".":","} vnđ</div>
            <div class="option_product">
              <div class="f16gray">Chọn màu của bạn</div>
              <ul class="fill_color">
                <li class="filter_color"> <a href=""><span class="clblack"></span></a><a href=""><span class="clyellow"></span></a><a href=""><span class="clblue"></span></a><a href=""><span class="clgreen"></span></a><a href=""><span class="clbrown"></span></a><a href=""><span class="clwhite"></span></a><a href=""><span class="clblack"></span></a><a href=""><span class="clyellow"></span></a><a href=""><span class="clblue"></span></a><a href=""><span class="clgreen"></span></a><a href=""><span class="clbrown"></span></a> </li>
              </ul>
              <div class="pkg"><span class="fl f16gray">Chọn size của bạn</span><a href="" class="help_size fl"><img src="images/help_size.png"/></a> </div>
              <ul class="list_size">
                <li><a href="">XS</a><a href="">s</a><a href="">m</a><a href="">l</a><a href="">Xl</a><a href="">XXl</a><a href="">XXXl</a></li>
              </ul>
            </div>
            <a href="" class="btn_buy"><span>Mua Hàng</span></a>
            <div class="hotline_detail">Hotline : {$config.hotline_product}</div>
          </div>
        </div>
        <a href="" class="head_title">Chi tiết sản phẩm</a>
        <div class="detail_product">
            {$row.content}
        </div>
      </div>
      <div class="col250 fr">
        {loadModule mod=product task=category}
      </div>
    </div>
    <div class="content_home pkg"> <a href="" class="head_title">Sản phẩm liên quan</a>
      <ul class="hot_product">
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/aothethao-hinhanh-test1_medium.jpg" /> <span class="view_more">chi tiết</span> <span class="price_item">150.000 đ</span> </a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/do-ao-tron-do48_medium.png" /><span class="view_more">chi tiết</span><span class="price_item">150.000 đ</span></a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/den-002_2a43dec0-73fc-4878-69cc-d32fbcba7deb_medium.png" /><span class="view_more">chi tiết</span><span class="price_item">150.000 đ</span></a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/den-002_c9758c0e-37de-42bd-7742-2327c1aaefb9_medium.png" /><span class="view_more">chi tiết</span><span class="price_item">150.000 đ</span></a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/tim-008_medium.png" /><span class="view_more">chi tiết</span><span class="price_item">150.000 đ</span></a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
        <li>
          <div class="box_product"><a class="img_product"><img src="photo/trang-009_72e48700-95d6-4fd0-7bb2-8f90e088daba_medium.png" /><span class="view_more">chi tiết</span><span class="price_item">150.000 đ</span></a>
            <div class="price_product"> <a href="" class="name_product">ÁO tennis nam</a>
              <div class="code_prodcut">Mã: AUDK005-2</div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="content_home pkg"> <a href="" class="head_title">hỏi đáp</a>
      <div class="input_faq">
        <input type="text" class="txt_faq" placeholder="Đặt câu hỏi cho sản phẩm ..."/>
        <input type="submit" value="Gửi câu hỏi" class="btn_faq"/>
        <span class="note_faq">( Bạn cần <a href="">đăng nhập</a> để gửi câu hỏi )</span> </div>
      <div class="list_faq pkg">
        <ul class="content_faq">
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
          </li>
        </ul>
      </div>
    </div>
    <div class="content_home pkg">
      <div class="col570 fl"> <a href="" class="head_title">Bình luận</a>
        <div class="box_cm"> <img src="photo/cm.jpg" style="max-width:100%"/> </div>
      </div>
      <div class="col470 fr"> <a href="" class="head_title">Đánh giá sản phẩm</a>
        <table width="100%" cellpadding="0" cellspacing="0" class="tbl_rate">
          <tr>
            <td colspan="2">Chủ đề :</td>
          </tr>
          <tr>
            <td colspan="2"><input type="text" class="txt_rate" /></td>
          </tr>
          <tr>
            <td colspan="2">Ý kiến của bạn :</td>
          </tr>
          <tr>
            <td colspan="2"><textarea class="txt_rate" rows="6"></textarea></td>
          </tr>
          <tr>
            <td>Đánh giá của bạn:&nbsp; <img src="images/star.jpg"/></td>
            <td align="right"><input type="submit" value="Gửi đánh giá" class="btn_faq"/></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript">
$(document).ready(function(){
  $('.hot_product').bxSlider({
  minSlides: 2,
  maxSlides: 5,
  moveSlides:1,
  slideWidth: 180,
  slideMargin: 39,
  auto:true,
  });
})
</script> 
<script type="text/javascript">
            CloudZoom.quickStart();
            
            // Initialize the slider.
            $(function(){
                $('#slider1').Thumbelina({
                    $bwdBut:$('#slider1 .left'), 
                    $fwdBut:$('#slider1 .right')
                });
            });

            
        </script> 
<script>
            $(document).ready(function(){
                $( ".show_video" ).click(function() {
                    $('.show_video_product').toggleClass('active');
          $('.cloudzoom').toggleClass('active');
          $('.cloudzoom-fade-1').toggleClass('active');
            });
            })
    </script>