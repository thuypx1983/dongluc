<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 17:40:35
         compiled from "modules/product/templates/filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99188776755f6a423a16971-89947612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa544b3823da44527b28567b72ebf3ba7d3fd802' => 
    array (
      0 => 'modules/product/templates/filter.tpl',
      1 => 1431909066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99188776755f6a423a16971-89947612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'filter' => 0,
    'c' => 0,
    'k' => 0,
    's' => 0,
    'p' => 0,
    'm' => 0,
    'matr_get' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a423b18e2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a423b18e2')) {function content_55f6a423b18e2($_smarty_tpl) {?>


<script type="text/javascript">
$(function(){
    $('#filter_color a').click(function(){
        $('#filter_color a').removeClass('active');
        $(this).addClass('active');
        $('input[name="color_id"]').val($(this).attr('value'));

        submitFilter();

        return false;
    })
    $('#filter_price .ck_price').click(function(){
        $('#filter_price li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('input[name="price_id"]').val($(this).val());

        submitFilter();
    })
    $('#filter_price li').each(function(){
        if($(this).hasClass('active'))
        {
            $(this).find('input').attr('checked', true);
        }
    })
    $('#filter_material .ck_price').click(function(){

        var val = "0";
        $('#filter_material .ck_price').each(function(){
            if($(this).prop('checked') == true) {
                val += "-" + $(this).val();
            }    
        })
        val = val.replace('0-', '');
        val = val.replace('0', '');
        $('input[name="matr_id"]').val(val);

        submitFilter();
    })
    $('#slt_filter').change(submitFilter);
})

function submitFilter(){
    
	var link_cate = url + "<?php echo $_GET['cate'];?>
-<?php echo $_GET['id'];?>
/";
	
	var get_cate = "<?php echo $_GET['cate'];?>
";
	if (get_cate == '')
		link_cate = url + "san-pham/";
    
    var c_id    = $('input[name="color_id"]').val();
    var pr_id   = $('input[name="price_id"]').val();
    var m_id    = $('input[name="matr_id"]').val();
    var so      = $('select[name="sort"]').val();
    var query   = '';

    if (c_id    != '') query += '&color_id=' + c_id;
    if (pr_id   != '') query += '&price_id=' + pr_id;
    if (m_id    != '') query += '&matr_id=' + m_id;
    if (so      != '') query += '&sort=' + so;

    location.href = link_cate + query;
}
</script>

<div>
    <input type="hidden" name="color_id" value="<?php echo $_GET['color_id'];?>
">
    <input type="hidden" name="price_id" value="<?php echo $_GET['price_id'];?>
">
    <input type="hidden" name="matr_id" value="<?php echo $_GET['matr_id'];?>
">
    <!-- <button type="button" onclick="submitFilter()">Submit</button> -->
</div>
<a href="" class="head_title">lọc sản phẩm</a>
<ul class="list_filter">
  <li> <a class="head_filter" href="">Màu sắc</a>
    <ul class="sub_filter">
      <li class="filter_color" id="filter_color">
        <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['color']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
            <a href="" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
" <?php if ($_smarty_tpl->tpl_vars['c']->value['id']==$_GET['color_id']){?>class="active"<?php }?>><span style="background:<?php echo $_smarty_tpl->tpl_vars['c']->value['color_code'];?>
"></span></a>
        <?php } ?>
    </li>
    </ul>
  </li>
  <!--<li> <a class="head_filter" href="">Kích cỡ</a>
    <ul class="sub_filter">
        <ul class="list_size">
            <li>
                <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['size']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
                <a href="" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['title'];?>
</a>
                <?php } ?>
            </li>
          </ul>
    </ul>
  </li> -->
  <li> <a class="head_filter" href="">Giá</a>
    <ul class="sub_filter" id="filter_price">
      <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
        <li class="pkg <?php if ($_smarty_tpl->tpl_vars['p']->value['id']==$_GET['price_id']){?>active<?php }?>">
            <label>
                <input type="radio" name="r1" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['p']->value['id']==$_GET['price_id']){?>checked<?php }?> class="ck_price fl"/>
                <span class="fill_price fl"><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
</span>
            </label>
        </li>
        <?php } ?>
    </ul>

  </li>
  <li> <a class="head_filter" href="">Chất liệu</a>
    <ul class="sub_filter" id="filter_material">
        <?php $_smarty_tpl->tpl_vars['matr_get'] = new Smarty_variable(explode("-",$_GET['matr_id']), null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['material']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <li class="pkg <?php if (in_array($_smarty_tpl->tpl_vars['m']->value['id'],$_smarty_tpl->tpl_vars['matr_get']->value)){?>active<?php }?>">
            <label>
                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['m']->value['id'],$_smarty_tpl->tpl_vars['matr_get']->value)){?>checked<?php }?> class="ck_price fl"/>
                <span class="fill_price fl"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</span>
            </label>
        </li>
        <?php } ?>
    </ul>
  </li>
</ul><?php }} ?>