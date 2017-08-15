<script type="text/javascript" src="{$url}js/cloudzoom.js"></script>
<script type="text/javascript" src="{$url}js/thumbelina.js"></script>

<script type="text/javascript">

$(function(){
  $('.add_cart').click(function(){
    $.post(url+"?ajax=true&mod=product&task=cart_add", $('#formAddCart').serialize(), function(){
      window.location.href= url+'gio-hang.html';
    });
    return false;
  });
});

$(function(){
  $('#filter_color a').click(function(){
    $('#filter_color a').removeClass('active');
    $(this).addClass('active');
    $('input[name="color_code"]').val($(this).attr('value'));
    $('input[name="color_name"]').val($(this).attr('title'));
      return false;
  })
  $('#filter_size a').click(function(){
    $('#filter_size a').removeClass('active');
    $(this).addClass('active');
    $('input[name="size"]').val($(this).attr('value'));
      return false;
  })
})

</script>

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
          <div id="guide_size_hidden">
              <img src="{$url}images/icon_delete.png" id="close_guide" onclick="$('#guide_size_hidden').hide()" />
              {$config.guide_size}
          </div>
          <div class="col500 fl">
            <div id="surround">
                <div class="show_video_product">
                    {$row.embed}
                </div>
              
              {if $row.photos}
                <img class="cloudzoom"  id="zoom1" src="{$url}upload/photo/{$row.photos[0].photo}" data-cloudzoom="
           zoomSizeMode:&quot;image&quot;,
           autoInside: 550
       " style="-webkit-user-select: none;">

                {else}
                <img class="cloudzoom_avatar" width="100%" src="{$url}upload/product/{$row.photo}" >
              {/if}

            {if $row.embed!=''}
            <div class="fl box_play_video">
                <a href="javascript:;" class="show_video"><img src="{$url}images/icon_play.png"/></a>
                <a href="javascript:;" class="hide_video"><img src="{$url}images/icon_pause.png"/></a>
            </div>
            {/if}

            {if $row.photos}
              <div id="slider1" class="fl {if $row.embed==''}no-embed-in{/if}">
                <div class="thumbelina-but horiz left">˂</div>
                <div style="position:absolute;overflow:hidden;width:100%;height:100%;">
                  <ul class="thumbelina" style="left: -88px;">

                    {foreach from=$row.photos item=p}
                    <li style="display: inline-block;">
                        <img class="cloudzoom-gallery" src="{$url}upload/photo/thumb/{$p.photo}" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;{$url}upload/photo/{$p.photo}&#39; ">
                    </li>
                    {/foreach}
                    
                  </ul>
                </div>
                <div class="thumbelina-but horiz right">˃</div>
              </div>
            
            {/if}

            </div>
            <script type="text/javascript">
            $('.cloudzoom').hover(function(){
                $('.cloudzoom-blank').css('z-index', 999999);
                //console.log($('.cloudzoom-blank').html());
                var _html = $('.cloudzoom-blank').html();
                _html = _html.replace('<div style="position: absolute; left: 10px; bottom: 40px; z-index: 100000; visibility: visible; display: block; color: rgb(255, 255, 255); text-shadow: none; font-family: sans-serif; font-size: 10px; font-weight: bold; padding: 2px; border: 1px solid rgb(68, 0, 0); background-color: rgb(221, 0, 0);">Unlicensed Cloud Zoom</div>', '');
                $('.cloudzoom-blank').html(_html);

            })
            </script>
          </div>
          <div class="col270 fr">
            <div class="name_detail">{$row.title}</div>
            <div class="view_vote pkg">
                <span class="star_vote fl">
                    <span id="raty"></span>
                    <script type="text/javascript">
                        $(function(){
                            $('#raty').raty({
                                readOnly: true,
                                {if $row.rate_score>0}
                                score: {$row.rate_score}
                                {/if}
                            })
                        })
                    </script>
                </span>
                <a class="total_vote fl" href="#danhgia">{$row.rate_count} đánh giá</a>
            </div>
            {$balance_vnd = $row.price - $row.price_sale}
            {if $row.discount>0}
            <div class="old_price">Giá gốc: {$row.price|number_format:0:".":","} vnđ (-{$balance_vnd|number_format:0:".":","} vnđ)</div>
            {/if}
            <div class="new_price">{$row.price_sale|number_format:0:".":","} vnđ</div>
            <div class="option_product">
              {if $row.color}
              <div class="f16gray">Chọn màu của bạn</div>
              <ul class="fill_color">
                <li class="filter_color" id="filter_color">
                    {foreach from=$row.color item=c}<a href="" value="{$c.color_code}" title="{$c.title}"><span style="background:{$c.color_code}"></span></a>{/foreach}
                </li>
              </ul>
              {/if}
              {if $row.size}
              <div class="pkg"><span class="fl f16gray">Chọn size của bạn</span><a href="" class="help_size fl" onclick="$('#guide_size_hidden').slideToggle(500);return false"><img src="{$url}images/help_size.png"/></a> </div>
              <ul class="list_size">
                <li id="filter_size">{foreach from=$row.size item=s}<a href="" value="{$s.title}" title="{$s.title}">{$s.title}</a>{/foreach}</li>
              </ul>
              {/if}
            </div>
            <a href="" class="btn_buy add_cart"><span>Mua Hàng</span></a>
            <div class="hotline_detail">Hotline : {$config.hotline_product}</div>

            <form id="formAddCart" action="" method="post" onsubmit="return false;">
                <input type="hidden" value="{$url}{$row.link}-{$row.id}.html" name="link" />
                <input type="hidden" value="{$row.id}" name="id" />
                <input type="hidden" name="color_code" value="">
                <input type="hidden" name="color_name" value="">
                <input type="hidden" name="size" value="">
            </form>
			     
          </div>
        </div>
        <a href="" class="head_title">Chi tiết sản phẩm</a>
        <div class="detail_product">
            {if $row.content}
                {$row.content}
            {else}
                <div style="margin-left:0px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            {/if}
        </div>
      </div>
      <div class="col250 fr">
        {loadModule mod=product task=category}
      </div>
    </div>
    <div class="content_home pkg"> <a href="" class="head_title">Sản phẩm liên quan</a>
        {if $rows}
        <ul class="hot_product">

            {foreach from=$rows item=row key=k}
            <li>
                <div class="box_product"><a class="img_product" href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}"><img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" /><span class="view_more">chi tiết</span><span class="price_item">{$row.price_sale|number_format:0:".":","} vnđ</span></a>
                  <div class="price_product"> <a href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}" class="name_product">{$row.title}</a>
                    <div class="code_prodcut">Mã: {$row.code}</div>
                  </div>
                </div>
              </li>
            {/foreach}
          </ul>
        
        {else}
            <div style="margin-left:0px; padding:10px 0 20px;">
            <em><p>Chưa cập nhật nội dung</p></em>
        </div>  
        {/if}
    </div>
    {loadModule mod=comment task=load_comment}
	<div class="content_home pkg">
      <div class="col570 fl"> <a href="" class="head_title">Bình luận</a>
        <div class="box_cm">
          <!-- <img src="{$url}photo/cm.jpg" style="max-width:100%"/> -->

          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=663238610442515";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-comments" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-numposts="5" data-colorscheme="light"></div>

        </div>
      </div>
      <div class="col470 fr" id="danhgia">
        {loadModule mod=product task=rating}
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
<style>
/*a.hide_video {
    display: none;
}*/
</style>
<script>
$(document).ready(function(){
    $( ".hide_video" ).click(function() {
        $('.show_video_product').removeClass('active');
        $('.cloudzoom').removeClass('active');
        $('.cloudzoom_avatar').show();
        $('.cloudzoom-fade-1').removeClass('active');
        return false;
    })
    $( ".show_video" ).click(function() {
        $('.show_video_product').addClass('active');
        var width  = 460;
        var height = 286;
        _div = $('.show_video_product').find('div');
        _div.attr('data-maxwidth', width);
        _div.attr('data-maxheight', height);
        _div.find('iframe').attr('width', width);
        _div.find('iframe').attr('height', height);
        _src_embed = _div.find('iframe').attr('src').replace("?", "?autoplay=1&");
        _div.find('iframe').attr('src', _src_embed);

        $('.cloudzoom').addClass('active');
        $('.cloudzoom_avatar').hide();
        $('.cloudzoom-fade-1').addClass('active');
        return false;
    });
})
</script>