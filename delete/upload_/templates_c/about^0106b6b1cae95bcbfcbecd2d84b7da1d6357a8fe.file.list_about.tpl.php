<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:47
         compiled from "modules/about/templates/list_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123812614355508ab332b9c2-37147684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0106b6b1cae95bcbfcbecd2d84b7da1d6357a8fe' => 
    array (
      0 => 'modules/about/templates/list_about.tpl',
      1 => 1431331445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123812614355508ab332b9c2-37147684',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'alias' => 0,
    'rows' => 0,
    'row' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508ab33a1c8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508ab33a1c8')) {function content_55508ab33a1c8($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.loadModule.php';
?>


<div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
gioi-thieu/" class="head_title">Giới thiệu về <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
</a>
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
                <div class="col-lg-3" style="padding-left:0"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/about/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" style="width:100%;"></a> </div>
                <div class="col-lg-9">
                  <div class="product-name">
                    <h2><a class="title-blog-name" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h2>
                    <!--<h3>3/6/2014 12:58 AM</h3>-->
                    <div class="info-cat-blog"><?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
</div>
                    <p><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
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
      </div>
      <div class="col30per fl">
        
        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>


      </div>
    </div>
  </div><?php }} ?>