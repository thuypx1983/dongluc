<?php /* Smarty version Smarty-3.1.7, created on 2016-10-06 11:20:24
         compiled from "modules/product/templates/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69143923055f6a52f718a90-01427029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d1aa85976a40f67fa25b9c3b2bec3899a42ff6f' => 
    array (
      0 => 'modules/product/templates/detail.tpl',
      1 => 1475726919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69143923055f6a52f718a90-01427029',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a52f98b7d',
  'variables' => 
  array (
    'url' => 0,
    'bread' => 0,
    'bre' => 0,
    'k' => 0,
    'config' => 0,
    'row' => 0,
    'p' => 0,
    'balance_vnd' => 0,
    'c' => 0,
    's' => 0,
    'rows' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a52f98b7d')) {function content_55f6a52f98b7d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/cloudzoom.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/thumbelina.js"></script>

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
            <?php  $_smarty_tpl->tpl_vars['bre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bre']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bread']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bre']->key => $_smarty_tpl->tpl_vars['bre']->value){
$_smarty_tpl->tpl_vars['bre']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['bre']->key;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php if ($_smarty_tpl->tpl_vars['bre']->value['link']){?><?php echo $_smarty_tpl->tpl_vars['bre']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['bre']->value['id'];?>
<?php if (count($_smarty_tpl->tpl_vars['bread']->value)>($_smarty_tpl->tpl_vars['k']->value+1)){?>/<?php }else{ ?>.html<?php }?><?php }?>" <?php if (1==($_smarty_tpl->tpl_vars['k']->value+1)){?> class="first_bread" <?php }?>><?php echo $_smarty_tpl->tpl_vars['bre']->value['title'];?>
</a>
            <?php if (count($_smarty_tpl->tpl_vars['bread']->value)>($_smarty_tpl->tpl_vars['k']->value+1)){?><span class="arr_bread"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/arr_brad.png"/></span><?php }?>
            <?php } ?>
            </div>
        </div>
        <div class="box_detail_product pkg">
          <div id="guide_size_hidden">
              <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_delete.png" id="close_guide" onclick="$('#guide_size_hidden').hide()" />
              <?php echo $_smarty_tpl->tpl_vars['config']->value['guide_size'];?>

          </div>
          <div class="col500 fl">
            <div id="surround">
                <div class="show_video_product">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['embed'];?>

                </div>
              
              <?php if ($_smarty_tpl->tpl_vars['row']->value['photos']){?>
                <img class="cloudzoom"  id="zoom1" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/photo/<?php echo $_smarty_tpl->tpl_vars['row']->value['photos'][0]['photo'];?>
" data-cloudzoom="
           zoomSizeMode:&quot;image&quot;,
           autoInside: 550
       " style="-webkit-user-select: none;">

                <?php }else{ ?>
                <img class="cloudzoom_avatar" width="100%" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/product/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" >
              <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['row']->value['embed']!=''){?>
            <div class="fl box_play_video">
                <a href="javascript:;" class="show_video"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_play.png"/></a>
                <a href="javascript:;" class="hide_video"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_pause.png"/></a>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['row']->value['photos']){?>
              <div id="slider1" class="fl <?php if ($_smarty_tpl->tpl_vars['row']->value['embed']==''){?>no-embed-in<?php }?>">
                <div class="thumbelina-but horiz left">˂</div>
                <div style="position:absolute;overflow:hidden;width:100%;height:100%;">
                  <ul class="thumbelina" style="left: -88px;">

                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <li style="display: inline-block;">
                        <img class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/photo/thumb/<?php echo $_smarty_tpl->tpl_vars['p']->value['photo'];?>
" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:&#39;<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/photo/<?php echo $_smarty_tpl->tpl_vars['p']->value['photo'];?>
&#39; ">
                    </li>
                    <?php } ?>
                    
                  </ul>
                </div>
                <div class="thumbelina-but horiz right">˃</div>
              </div>
            
            <?php }?>

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
            <div class="name_detail"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</div>
            <div class="view_vote pkg">
                <span class="star_vote fl">
                    <span id="raty"></span>
                    <script type="text/javascript">
                        $(function(){
                            $('#raty').raty({
                                readOnly: true,
                                <?php if ($_smarty_tpl->tpl_vars['row']->value['rate_score']>0){?>
                                score: <?php echo $_smarty_tpl->tpl_vars['row']->value['rate_score'];?>

                                <?php }?>
                            })
                        })
                    </script>
                </span>
                <a class="total_vote fl" href="#danhgia"><?php echo $_smarty_tpl->tpl_vars['row']->value['rate_count'];?>
 đánh giá</a>
            </div>
            <?php $_smarty_tpl->tpl_vars['balance_vnd'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['price']-$_smarty_tpl->tpl_vars['row']->value['price_sale'], null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['discount']>0){?>
            <div class="old_price">Giá gốc: <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price'],0,".",",");?>
 vnđ (-<?php echo number_format($_smarty_tpl->tpl_vars['balance_vnd']->value,0,".",",");?>
 vnđ)</div>
            <?php }?>
            <div class="new_price"><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price_sale'],0,".",",");?>
 vnđ</div>
            <div class="option_product">
              <?php if ($_smarty_tpl->tpl_vars['row']->value['color']){?>
              <div class="f16gray">Chọn màu của bạn</div>
              <ul class="fill_color">
                <li class="filter_color" id="filter_color">
                    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['color']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><a href="" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['color_code'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
"><span style="background:<?php echo $_smarty_tpl->tpl_vars['c']->value['color_code'];?>
"></span></a><?php } ?>
                </li>
              </ul>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['row']->value['size']){?>
              <div class="pkg"><span class="fl f16gray">Chọn size của bạn</span><a href="" class="help_size fl" onclick="$('#guide_size_hidden').slideToggle(500);return false"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/help_size.png"/></a> </div>
              <ul class="list_size">
                <li id="filter_size"><?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['size']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
?><a href="" value="<?php echo $_smarty_tpl->tpl_vars['s']->value['title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['s']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['title'];?>
</a><?php } ?></li>
              </ul>
              <?php }?>
            </div>
            <a href="" class="btn_buy add_cart"><span>Mua Hàng</span></a>
            <div class="hotline_detail">Hotline : <?php echo $_smarty_tpl->tpl_vars['config']->value['hotline_product'];?>
</div>

            <form id="formAddCart" action="" method="post" onsubmit="return false;">
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html" name="link" />
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" name="id" />
                <input type="hidden" name="color_code" value="">
                <input type="hidden" name="color_name" value="">
                <input type="hidden" name="size" value="">
            </form>
			     
          </div>
        </div>
        <a href="" class="head_title">Chi tiết sản phẩm</a>
        <div class="detail_product">
            <?php if ($_smarty_tpl->tpl_vars['row']->value['content']){?>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>

            <?php }else{ ?>
                <div style="margin-left:0px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            <?php }?>
        </div>
      </div>
      <div class="col250 fr">
        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'category'),$_smarty_tpl);?>

      </div>
    </div>
    <div class="content_home pkg"> <a href="" class="head_title">Sản phẩm liên quan</a>
        <?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
        <ul class="hot_product">

            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
            <li>
                <div class="box_product"><a class="img_product" href="<?php if ($_smarty_tpl->tpl_vars['row']->value['link_out']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['link_out'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html<?php }?>"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/product/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" /><span class="view_more">chi tiết</span><span class="price_item"><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price_sale'],0,".",",");?>
 vnđ</span></a>
                  <div class="price_product"> <a href="<?php if ($_smarty_tpl->tpl_vars['row']->value['link_out']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['link_out'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html<?php }?>" class="name_product"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a>
                    <div class="code_prodcut">Mã: <?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
</div>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        
        <?php }else{ ?>
            <div style="margin-left:0px; padding:10px 0 20px;">
            <em><p>Chưa cập nhật nội dung</p></em>
        </div>  
        <?php }?>
    </div>
    <?php echo smarty_function_loadModule(array('mod'=>'comment','task'=>'load_comment'),$_smarty_tpl);?>

	<div class="content_home pkg">
      <div class="col570 fl"> <a href="" class="head_title">Bình luận</a>
        <div class="box_cm">
          <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
photo/cm.jpg" style="max-width:100%"/> -->

          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=663238610442515";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" data-numposts="5" data-colorscheme="light"></div>

        </div>
      </div>
      <div class="col470 fr" id="danhgia">
        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'rating'),$_smarty_tpl);?>

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
</script><?php }} ?>