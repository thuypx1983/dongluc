<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 14:25:35
         compiled from "admin/modules/layout/templates/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159303348555f6766f95fda1-91828789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1c38bba2fe8c05d2bd54d0a59cc27153922257f' => 
    array (
      0 => 'admin/modules/layout/templates/default.tpl',
      1 => 1353565436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159303348555f6766f95fda1-91828789',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6766f9c0ce',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6766f9c0ce')) {function content_55f6766f9c0ce($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?><?php echo smarty_function_loadModule(array('mod'=>'header'),$_smarty_tpl);?>


<?php echo smarty_function_loadModule(array('mod'=>'rootpath'),$_smarty_tpl);?>


<script type="text/javascript">
	$(function(){
		var temp = $('.test').children();
		//alert(temp.prop("tagName"));
		if(temp.prop("tagName").toLowerCase()=='form')
		{
			$('.test').css('padding', '10px 20px 30px');
		}
			
	});
</script>
<div style="margin-bottom:50px; border:1px solid #d5d5d5; " class="test">
<?php if ($_GET['mod']==''){?>    
    <?php echo smarty_function_loadModule(array('mod'=>'home'),$_smarty_tpl);?>

<?php }else{ ?>   
    <?php echo smarty_function_loadModule(array('mod'=>$_GET['mod'],'task'=>$_GET['task']),$_smarty_tpl);?>

<?php }?>
</div>



<?php echo smarty_function_loadModule(array('mod'=>'footer'),$_smarty_tpl);?>

		
		
		
        
		
<?php }} ?>