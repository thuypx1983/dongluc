<?php /* Smarty version Smarty-3.1.7, created on 2016-10-06 11:21:13
         compiled from "modules/product/templates/showList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180234535455f6a4236eb108-66612843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa80c0ef0b540fa529ad31c692d6f6d809a4c86f' => 
    array (
      0 => 'modules/product/templates/showList.tpl',
      1 => 1475724933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180234535455f6a4236eb108-66612843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a423859f2',
  'variables' => 
  array (
    'bread' => 0,
    'url' => 0,
    'bre' => 0,
    'k' => 0,
    'rows' => 0,
    'row' => 0,
    'paging' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a423859f2')) {function content_55f6a423859f2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?>
<div class="grid1060">
    <div class="content_cate pkg">

        <div class="col700 fr">
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
/<?php }?>" <?php if (1==($_smarty_tpl->tpl_vars['k']->value+1)){?> class="first_bread" <?php }?>><?php echo $_smarty_tpl->tpl_vars['bre']->value['title'];?>
</a>
            <?php if (count($_smarty_tpl->tpl_vars['bread']->value)>($_smarty_tpl->tpl_vars['k']->value+1)){?><span class="arr_bread"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/arr_brad.png"/></span><?php }?>
			<?php }
if (!$_smarty_tpl->tpl_vars['bre']->_loop) {
?>
				<a href="" class="first_bread">
				<?php if ($_GET['keyword']!=''){?>
					Kết quả tìm kiếm cho "<?php echo $_GET['keyword'];?>
"
				<?php }else{ ?>
					Sản phẩm
				<?php }?>
				</a>
            <?php } ?>
            </div>
          <div class="fr slt_option"><span>SẮP XẾP THEO: </span>
            <select class="slt_filter" id="slt_filter" name="sort">
              <option value="new" <?php if ($_GET['sort']=='new'){?>selected<?php }?>>Mới nhất</option>
              <option value="old" <?php if ($_GET['sort']=='old'){?>selected<?php }?>>Cũ nhất</option>
              <option value="pdesc" <?php if ($_GET['sort']=='pdesc'){?>selected<?php }?>>Giá giảm dần</option>
              <option value="pasc" <?php if ($_GET['sort']=='pasc'){?>selected<?php }?>>Giá tăng dần</option>
            </select>
          </div>
        </div>
        <ul class="list_product_cate pkg">
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
            <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
                <div style="margin-left:25px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            <?php } ?>
          
        </ul>

        <div class="paging">
            <?php echo $_smarty_tpl->tpl_vars['paging']->value;?>

        </div>

      </div>

      <div class="col250 fl"> 

        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'category'),$_smarty_tpl);?>

        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'filter'),$_smarty_tpl);?>

        
        <div class="hotline_left">
          <table>
            <tr>
              <td><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/iconhotline.png"/></td>
              <td>Hotline: <br/>
                <p class="f24"><?php echo $_smarty_tpl->tpl_vars['config']->value['hotline_product'];?>
</p></td>
            </tr>
          </table>
        </div>
      </div>
      
    </div>
  </div><?php }} ?>