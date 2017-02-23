<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/product/templates/list_top_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17912820755508a99450841-86650334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '039b5788892d6575f9066b516dc03aef049f7450' => 
    array (
      0 => 'modules/product/templates/list_top_home.tpl',
      1 => 1431336322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17912820755508a99450841-86650334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'url' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a99496d1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a99496d1')) {function content_55508a99496d1($_smarty_tpl) {?><div class="content_home pkg"> <a href="" class="head_title">Sản phẩm nổi bật</a>

      <ul class="hot_product">
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
        <li>
                <div class="box_product"><a class="img_product" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/product/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" /><span class="view_more">chi tiết</span><span class="price_item"><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price_sale'],0,".",",");?>
 vnđ</span></a>
                  <div class="price_product"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html" class="name_product"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a>
                    <div class="code_prodcut">Mã: <?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
</div>
                  </div>
                </div>
              </li>
        <?php } ?>
      </ul>
    </div>

    <script type="text/javascript">
  $(document).ready(function(){
    $('.hot_product').bxSlider({
    minSlides: 2,
    maxSlides: 5,
    moveSlides:4,
    slideWidth: 180,
    slideMargin: 39,
    auto:true,
    });
  })
  </script>

  <?php }} ?>