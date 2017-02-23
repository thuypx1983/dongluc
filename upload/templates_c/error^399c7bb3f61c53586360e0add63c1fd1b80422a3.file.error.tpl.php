<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 14:28:55
         compiled from "modules/error/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184897432655f67737683884-19895051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '399c7bb3f61c53586360e0add63c1fd1b80422a3' => 
    array (
      0 => 'modules/error/templates/error.tpl',
      1 => 1431564924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184897432655f67737683884-19895051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f677376bd36',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f677376bd36')) {function content_55f677376bd36($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?><div class="grid1060">
    <div class="content_cate pkg">
      <div class="col30per fl">        
        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_sidebar'),$_smarty_tpl);?>

      </div>
      <div class="col70per fr"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="head_title">Lỗi 404</a>
        <div class="inner-post-wrapper">
          <div class="detail-blog-post">
            <div class="postWrapper">
              <div class="postTitle">
                <h2><?php echo $_smarty_tpl->getConfigVariable('404_title');?>
</h2>
                
              </div>
              <div class="postContent">
                 <?php echo $_smarty_tpl->getConfigVariable('404_content');?>

              </div>
              <?php echo $_smarty_tpl->getConfigVariable('404_title_thank');?>

            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div><?php }} ?>