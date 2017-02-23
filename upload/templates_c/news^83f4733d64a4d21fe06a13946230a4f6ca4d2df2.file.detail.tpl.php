<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 10:05:49
         compiled from "modules/news/templates/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152907299755f7bcf7a10d82-80394976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f4733d64a4d21fe06a13946230a4f6ca4d2df2' => 
    array (
      0 => 'modules/news/templates/detail.tpl',
      1 => 1432802820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152907299755f7bcf7a10d82-80394976',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f7bcf7c7aeb',
  'variables' => 
  array (
    'url' => 0,
    'bread' => 0,
    'bre' => 0,
    'k' => 0,
    'row' => 0,
    'rows' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f7bcf7c7aeb')) {function content_55f7bcf7c7aeb($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_loadModule')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/function.loadModule.php';
?><div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr">
        <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dich-vu/" class="head_title">Dịch vụ</a> -->

        <div class="breadcumb_product pkg">
          <div class="fl">
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dich-vu/" class="first_bread">
                Dịch vụ<?php if (count($_smarty_tpl->tpl_vars['bread']->value)>0){?><span class="arr_bread"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/arr_brad.png"/></span><?php }?>
            </a>
            <?php  $_smarty_tpl->tpl_vars['bre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bre']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bread']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bre']->key => $_smarty_tpl->tpl_vars['bre']->value){
$_smarty_tpl->tpl_vars['bre']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['bre']->key;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php if ($_smarty_tpl->tpl_vars['bre']->value['pre_link']){?><?php echo $_smarty_tpl->tpl_vars['bre']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['bre']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['bre']->value['title'];?>
</a>
            <?php if (count($_smarty_tpl->tpl_vars['bread']->value)>($_smarty_tpl->tpl_vars['k']->value+1)){?><span class="arr_bread"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/arr_brad.png"/></span><?php }?>
                
            <?php } ?>
            </div>
        </div>

        <div class="inner-post-wrapper" style="margin-top:20px">
          <div class="detail-blog-post">
            <div class="postWrapper">
              <div class="postTitle">
                <h2><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h2>
                <h3><?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
</h3>
              </div>
              <div class="postContent">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>

                </div>
            </div>
          </div>
        </div>
        
        <?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
        <a href="" class="head_title">Bài viết khác</a>
        <ol id="blog-list" class="products-list">


          <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
          <li class="postWrapper item">
            <div class="item-inner">
              <div class="product-info row">
                <div class="col-lg-3" style="padding-left:0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/news/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" style="width:100%;"></a>
                </div>
                <div class="col-lg-9">
                  <div class="product-name">
                    <h2><a class="title-blog-name" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h2>
                    <!--<h3>3/6/2014 12:58 AM</h3>-->
                    <div class="info-cat-blog"> <?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
 </div>
                    <p class="desc_just"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['description'],400);?>
</p>
                  </div>
                </div>
                <div class="clear"></div>
                <?php if (($_smarty_tpl->tpl_vars['k']->value+1)<count($_smarty_tpl->tpl_vars['rows']->value)){?>
                <div class="postContent ">
                  <div class="bottom-info-blog"> </div>
                </div>
                <?php }?>
              </div>
            </div>
          </li>
           <?php } ?>
          
        </ol>
        <?php }?>
        
      </div>

      <div class="col30per fl">
        <?php echo smarty_function_loadModule(array('mod'=>'news','task'=>'category'),$_smarty_tpl);?>

          <?php echo smarty_function_loadModule(array('mod'=>'news','task'=>'list_top'),$_smarty_tpl);?>

        
        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>

      </div>

    </div>
  </div><?php }} ?>