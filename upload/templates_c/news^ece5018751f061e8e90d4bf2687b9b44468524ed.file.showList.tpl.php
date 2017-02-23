<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 10:05:47
         compiled from "modules/news/templates/showList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189396642055f6a4cf93dee3-09454556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ece5018751f061e8e90d4bf2687b9b44468524ed' => 
    array (
      0 => 'modules/news/templates/showList.tpl',
      1 => 1432811906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189396642055f6a4cf93dee3-09454556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a4cfa4bc7',
  'variables' => 
  array (
    'url' => 0,
    'bread' => 0,
    'bre' => 0,
    'k' => 0,
    'rows' => 0,
    'row' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a4cfa4bc7')) {function content_55f6a4cfa4bc7($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/modifier.truncate.php';
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

        <ol id="blog-list" class="products-list" style="margin-top:20px">
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
                        <div class="col-lg-3" style="padding-left:0"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/news/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" class="img_list_news"></a> </div>
                        <div class="col-lg-9">
                          <div class="product-name">
                            <h2><a class="title-blog-name" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h2>
                            <!-- <h3>3/6/2014 12:58 AM</h3> -->
                            <div class="info-cat-blog"><?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
</div>
                            <p  class="desc_just"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['description'],400);?>
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
            <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
                <div style="margin-left:0px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            <?php } ?>
          
        </ol>
        <div class="paging">
            <?php echo $_smarty_tpl->tpl_vars['paging']->value;?>

        </div>
      </div>
      <div class="col30per fl">
        <?php echo smarty_function_loadModule(array('mod'=>'news','task'=>'category'),$_smarty_tpl);?>

        <?php echo smarty_function_loadModule(array('mod'=>'news','task'=>'list_top'),$_smarty_tpl);?>

        
        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>


      </div>
    </div>
  </div><?php }} ?>