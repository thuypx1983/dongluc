<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/ads/templates/banner_small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129284430455f67746392e20-09884990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0046f5df9fbaeb69d1c29bd593f8ffc1cc25a33f' => 
    array (
      0 => 'modules/ads/templates/banner_small.tpl',
      1 => 1432801342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129284430455f67746392e20-09884990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6774640ca9',
  'variables' => 
  array (
    'rows' => 0,
    'k' => 0,
    'row' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6774640ca9')) {function content_55f6774640ca9($_smarty_tpl) {?><style>
.play_show_video{ display: none; overflow: hidden; }
</style>
<script>
$(function(){
	/*$('.box_video_home').find('.this_img').each(function(){
		var width  = $(this).width() - 0;
		var height = $(this).height() - 0;
		console.log(width + 'x' + height);
		$(this).closest('.box_video_home').find('.play_show_video')
			.css('width', width+'px')
			.css('height', height+'px');
	})*/

	$('.video_play_click').click(function(){

		var parent = $(this).closest('.box_video_home');
		var img    = parent.find('.this_img');
		var width  = img.width() + 10;
		var height = img.height() + 10;
		console.log(width + 'x' + height);
		$(this).hide();
		parent.css('border', 'none');
		parent.find('.head_video').hide();
		parent.find('.play_show_video').show();
		
		div = parent.find('.play_show_video').find('div');
		div.attr('data-maxwidth', width);
		div.attr('data-maxheight', height);
		div.find('iframe').attr('width', width);
		div.find('iframe').attr('height', height);
		src_embed = div.find('iframe').attr('src').replace("?", "?autoplay=1&");
		div.find('iframe').attr('src', src_embed);

		return false;
	})
})
</script>
<?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    	<?php if ($_smarty_tpl->tpl_vars['k']->value<3){?>
	    	<?php if ($_smarty_tpl->tpl_vars['row']->value['ads_type']=='flash'){?>
				<li class="box_video_home">
					<div class="head_video">Video</div>
						<a href="" <?php if ($_smarty_tpl->tpl_vars['row']->value['embed']!=''){?>class="video_play_click"<?php }else{ ?>onclick="return false"<?php }?>>
							<span class="icon_play">
								<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_youtube.png"/>
							</span>
							<img class="this_img" id="this_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/ads/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
"/>
						</a>
					<div class="play_show_video" id="psv_<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['embed'];?>
</div>
				</li>
	    	<?php }else{ ?>
	    		<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" <?php if (!$_smarty_tpl->tpl_vars['row']->value['link']){?>onclick="return false"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['row']->value['target'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/ads/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a></li>
	    	<?php }?>
    	<?php }?>
    <?php } ?>
<?php }?>




<?php }} ?>