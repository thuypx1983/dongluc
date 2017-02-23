<?php /* Smarty version Smarty-3.1.7, created on 2015-09-16 11:55:51
         compiled from "modules/about/templates/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187829376155f8f657ce91b5-04880651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a785400df8ee70bddba791a7fc2e6c1d9f0e792' => 
    array (
      0 => 'modules/about/templates/about.tpl',
      1 => 1432720132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187829376155f8f657ce91b5-04880651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'alias' => 0,
    'row' => 0,
    'rows' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f8f657ddd24',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f8f657ddd24')) {function content_55f8f657ddd24($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?><div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
gioi-thieu/" class="head_title">Giới thiệu về <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
</a>
        <div class="inner-post-wrapper">
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
upload/about/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
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
                    <p class="desc_just"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
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
        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>

      </div>
    </div>
  </div><?php }} ?>