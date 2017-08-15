<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 22:39:39
         compiled from "modules/news/templates/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2800295185550cd3beaa9b0-09361671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f4733d64a4d21fe06a13946230a4f6ca4d2df2' => 
    array (
      0 => 'modules/news/templates/detail.tpl',
      1 => 1431164325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2800295185550cd3beaa9b0-09361671',
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
  'unifunc' => 'content_5550cd3c008ad',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5550cd3c008ad')) {function content_5550cd3c008ad($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.loadModule.php';
?><div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dich-vu/" class="head_title">Dịch vụ trên <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
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
        <?php }?>
        
      </div>

      <div class="col30per fl">
          <?php echo smarty_function_loadModule(array('mod'=>'news','task'=>'list_top'),$_smarty_tpl);?>

        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'list_top'),$_smarty_tpl);?>

        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>

      </div>

    </div>
  </div><?php }} ?>