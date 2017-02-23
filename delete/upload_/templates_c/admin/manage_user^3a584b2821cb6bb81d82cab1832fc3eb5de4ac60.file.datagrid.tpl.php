<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 10:13:28
         compiled from "/var/www/textlink/beta/dongluc/admin/modules/datagrid/templates/datagrid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94096484455516fd86d9f41-66791867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a584b2821cb6bb81d82cab1832fc3eb5de4ac60' => 
    array (
      0 => '/var/www/textlink/beta/dongluc/admin/modules/datagrid/templates/datagrid.tpl',
      1 => 1431304486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94096484455516fd86d9f41-66791867',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'submit_url' => 0,
    'path' => 0,
    'sort_by' => 0,
    'sort_value' => 0,
    'arr_filter' => 0,
    'row' => 0,
    'local_reset' => 0,
    'arr_cols' => 0,
    'arr_check' => 0,
    'arr_value' => 0,
    'arr_action' => 0,
    'has_action' => 0,
    'action_width' => 0,
    'index_start' => 0,
    'item' => 0,
    'pkey' => 0,
    'ref' => 0,
    'cor' => 0,
    'k' => 0,
    'url' => 0,
    'foo' => 0,
    'number_record' => 0,
    'per_page' => 0,
    'page' => 0,
    'number_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55516fd8cb7b0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55516fd8cb7b0')) {function content_55516fd8cb7b0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/modifier.date_format.php';
?><script type="text/javascript">
	var submit_url= "<?php echo $_smarty_tpl->tpl_vars['submit_url']->value;?>
";
</script>


<script type="text/javascript">

function ajaxSave(id, field, value)
{
	document.getElementById('loader').innerHTML = "<img src='"+url+"admin/images/loader.gif' height='20px' />";
	/*alert(value);*/
	$.post(submit_url+'&ajax=true&task=ajaxSave&id='+id+'&field='+field, {'value':value}, function(result){		
		document.getElementById('loader').innerHTML = "";		
		//if(result!="")
			//alert(result);
	});

}

function scwSave(element)
{
	element.onchange();
}
</script>


<link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/datagrid.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/datagrid.js"></script>

    <form name="for_datagrid" action="" method="get" style="margin:0px;">
    <input type="hidden" name="mod" value="<?php echo $_REQUEST['mod'];?>
">
    <input type="hidden" name="sub" value="<?php echo $_REQUEST['sub'];?>
">
    <input type="hidden" name="mod_id" value="<?php echo $_REQUEST['mod_id'];?>
">
    <input type="hidden" name="sort_by" value="<?php echo $_smarty_tpl->tpl_vars['sort_by']->value;?>
">
    <input type="hidden" name="sort_value" value="<?php echo $_smarty_tpl->tpl_vars['sort_value']->value;?>
">
    
    <?php if ($_smarty_tpl->tpl_vars['arr_filter']->value!=''){?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="div_filter" >
        <tr>
            <td width="100%" >		
                
                  
                        <table>
                        <tr><td>
                        <table cellpadding="" cellspacing="3" border="0">		  		
                            <tr>
                           
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_filter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['filter']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['filter']['index']++;
?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['filter']['index']%5==0){?>							
                                </tr>
                                <tr>
                            <?php }?>
                            <td>&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value['display'];?>
:</td>
                            <td>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['type']=='date'){?>
                            <input onclick='scwShow(this,event);' type="text" name="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" id="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['selected'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['style']!=''){?> style="<?php echo $_smarty_tpl->tpl_vars['row']->value['style'];?>
"<?php }?> />
    
                
                            <?php }elseif($_smarty_tpl->tpl_vars['row']->value['type']=='color'){?>
								<input class="color" type="text" name="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" id="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['selected'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['style']!=''){?> style="<?php echo $_smarty_tpl->tpl_vars['row']->value['style'];?>
"<?php }?> />
								
                            <?php }elseif($_smarty_tpl->tpl_vars['row']->value['type']=='text'){?>
                                <input type="text" name="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['selected'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['row']->value['style'];?>
" />
                            <?php }else{ ?>
                            <select name="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" id="<?php if ($_smarty_tpl->tpl_vars['row']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['row']->value['style']!=''){?> style=" height: 23px; <?php echo $_smarty_tpl->tpl_vars['row']->value['style'];?>
"<?php }?>  onchange="<?php echo $_smarty_tpl->tpl_vars['row']->value['onchange'];?>
" >
                                <?php if ($_smarty_tpl->tpl_vars['row']->value['option_string']==''){?>
                                    <option value="">---</option>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['row']->value['option'],'selected'=>$_smarty_tpl->tpl_vars['row']->value['selected']),$_smarty_tpl);?>
	
                                    						
                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['row']->value['option_string'];?>

                                <?php }?>
                            </select>
                            <?php }?>
                            </td>
                            
                        <?php } ?>
                            </tr>
                        </table>
                        </td>
                        <td>
                        	<?php if ($_GET['mod']!=''){?>
                                <?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable(("?mod=").($_GET['mod']), null, 0);?>
                            <?php }?>
                            <?php if ($_GET['sub']!=''){?>
                                <?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable((($_smarty_tpl->tpl_vars['local_reset']->value).("&sub=")).($_GET['sub']), null, 0);?>
                            <?php }?>
                        	<input type="submit" name="bt_fillter" value="Tìm kiếm"  style="border:1px solid #b0b0b0; background:url(<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/bg_btn_search.png); height:28px; border-radius:5px; cursor:pointer;"/>
                                <input type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['local_reset']->value;?>
'" name="bt_fillter" value="Reset"  style="border:1px solid #b0b0b0; background:url(<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/bg_btn_search.png); height:22px; border-radius:5px; cursor:pointer; margin-top:4px;"/>
                        </td>
    
                        </tr>
                    </table>					
                 
                  
                
            </td>
        </tr>
    </table>
    <?php }?>
    
    
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr class="tr_title"  height="23px">		
        
            <td class="td_index"><?php echo $_smarty_tpl->getConfigVariable('index');?>
</td>
            
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_cols']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value['visible']==''||$_smarty_tpl->tpl_vars['row']->value['visible']!='hidden'){?>			
                    <td width= "<?php echo $_smarty_tpl->tpl_vars['row']->value['width'];?>
px" class="td_border_left" style="color:#000000;text-align: <?php if ($_smarty_tpl->tpl_vars['row']->value['align']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['align'];?>
<?php }else{ ?>left<?php }?>; padding-<?php if ($_smarty_tpl->tpl_vars['row']->value['align']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['align'];?>
<?php }else{ ?>left<?php }?>: 3px;">
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['sortable']){?><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/sort_asc<?php if (($_smarty_tpl->tpl_vars['sort_by']->value==$_smarty_tpl->tpl_vars['row']->value['field'])&&($_smarty_tpl->tpl_vars['sort_value']->value=='asc')){?>_select<?php }?>.gif" onclick="for_datagrid.sort_by.value='<?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
'; for_datagrid.sort_value.value='asc'; for_datagrid.submit();" style="cursor:pointer"/>&nbsp;<?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['display'];?>

                    <?php if ($_smarty_tpl->tpl_vars['row']->value['sortable']){?>&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/sort_desc<?php if (($_smarty_tpl->tpl_vars['sort_by']->value==$_smarty_tpl->tpl_vars['row']->value['field'])&&($_smarty_tpl->tpl_vars['sort_value']->value=='desc')){?>_select<?php }?>.gif" onclick="for_datagrid.sort_by.value='<?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
'; for_datagrid.sort_value.value='desc'; for_datagrid.submit();" style="cursor:pointer"/><?php }?>
    
                </td>
                <?php }?>           
            <?php } ?>    
        
    
            <?php if ($_smarty_tpl->tpl_vars['arr_check']->value!=''&&$_smarty_tpl->tpl_vars['arr_value']->value!=''){?>
            <td class="td_action td_border_left">        	
                <input type="checkbox" name="checkall" onclick="check_all(this)" title="Chọn tất cả"/>
                <input type="hidden" name="task" />        
            </td>
            <?php }?>
            
            <?php if ($_smarty_tpl->tpl_vars['arr_action']->value&&$_smarty_tpl->tpl_vars['has_action']->value==''){?>
            <td class="td_action td_border_left" style="width:<?php echo $_smarty_tpl->tpl_vars['action_width']->value;?>
px;"><?php if ($_smarty_tpl->tpl_vars['arr_action']->value[0]['task']=='add'){?><span style="cursor:pointer" onclick="javascript:redirect_url('<?php echo $_smarty_tpl->tpl_vars['submit_url']->value;?>
&task=<?php echo $_smarty_tpl->tpl_vars['arr_action']->value[0]['task'];?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/add.png" border="0" style="cursor:pointer;" title="<?php echo $_smarty_tpl->tpl_vars['arr_action']->value[0]['tooltip'];?>
" /></span><?php }else{ ?>Chức năng<?php }?></td>
            <?php }?>
    </tr>
    
        
    
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['row']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['row']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['value']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['row']->iteration++;
 $_smarty_tpl->tpl_vars['row']->last = $_smarty_tpl->tpl_vars['row']->iteration === $_smarty_tpl->tpl_vars['row']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['value']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['value']['last'] = $_smarty_tpl->tpl_vars['row']->last;
?>		
        <tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>" onMouseOver="this.className='<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_hover1<?php }else{ ?>tr_hover2<?php }?>'" onMouseOut="this.className='<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>'" >
            
            
                <td class="td_index <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['value']['last']){?> td_border<?php }else{ ?> td_border_left<?php }?>"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']+$_smarty_tpl->tpl_vars['index_start']->value;?>
</td>
                         
                
            
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_cols']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['visible']==''||$_smarty_tpl->tpl_vars['item']->value['visible']!='hidden'){?>				
                    <td width= "<?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px" class="<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['value']['last']){?> td_border<?php }else{ ?> td_border_left<?php }?>" style="text-align: <?php if ($_smarty_tpl->tpl_vars['item']->value['align']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['align'];?>
<?php }else{ ?>left<?php }?>; padding-<?php if ($_smarty_tpl->tpl_vars['item']->value['align']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['align'];?>
<?php }else{ ?>left<?php }?>: 3px; ">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['link']!=''){?> <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
&<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
"><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['value_cores']!=''){?>
                        <?php  $_smarty_tpl->tpl_vars['cor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cor']->_loop = false;
 $_smarty_tpl->tpl_vars['ref'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['value_cores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cor']->key => $_smarty_tpl->tpl_vars['cor']->value){
$_smarty_tpl->tpl_vars['cor']->_loop = true;
 $_smarty_tpl->tpl_vars['ref']->value = $_smarty_tpl->tpl_vars['cor']->key;
?>
                            <?php if ($_smarty_tpl->tpl_vars['ref']->value==$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]){?>
                                <?php echo $_smarty_tpl->tpl_vars['cor']->value;?>

                            <?php }?>					
                        <?php } ?>
                    <?php }else{ ?>
                    
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='img'){?>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]!=''){?>                           						
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
" width="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['img_size'])===null||$tmp==='' ? 100 : $tmp);?>
" border="0" title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['tooltip']];?>
"/>                            
                            <?php }else{ ?>  
                                &nbsp;
                            <?php }?>        
                         
						<?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='color'){?>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?> onchange="ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value) "<?php }?> class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?> color" style="border: none; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
" />
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='lang'){?>
                        	<center>
                            <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['flag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['local_reset']->value;?>
&task=switch_lang&id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
&<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
&swlang=<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
&filter_default=<?php echo $_smarty_tpl->tpl_vars['item']->value['filter_default'];?>
"><img width="<?php if ($_SESSION['lang']==$_smarty_tpl->tpl_vars['k']->value){?>23<?php }else{ ?>18<?php }?>" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" /></a>&nbsp;
                            <?php } ?>
                            </center>
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='date'){?>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?> onclick="scwNextAction=scwSave.runsAfterSCW(this, this); scwShow(this,event);" onchange="ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value) "<?php }?> id="datepicker<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index'];?>
" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>" style="border: none; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']],'%Y-%m-%d');?>
" />
    
    
                            
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='boolean'){?>
                        
                            <div style="border: none; text-align: center; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;"><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?>onchange="if (this.checked) this.value=1; else this.value=0; ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value)"<?php }?> value="$row[$item.field]" <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]==1){?> checked="checked" <?php }?>/></div>
                                                    
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='number'){?>
                        
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?>onchange="ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value)" <?php }else{ ?>readonly="readonly"<?php }?> class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>" style="border: none; text-align: right; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
" />                    
                                                    
                            
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='select'){?>
                            <select <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?>onchange="ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value)" <?php }else{ ?>readonly="readonly"<?php }?> class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>" style="height: 20px; border: 1px solid gray; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;" >
                                <option value="">---</option>
                                <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</option>
                                <?php } ?>
                            </select>
    
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='text'){?>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['item']->value['editable']){?>onchange="ajaxSave('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['field'];?>
', this.value)" <?php }else{ ?>readonly="readonly"<?php }?> class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index']%2==0){?>tr_mau1<?php }else{ ?>tr_mau2<?php }?>" style="border: none; width: <?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
px;" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>
" />
                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['type']=='price'){?>
							<?php echo number_format($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']],0,".",",");?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>

                        
                            
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']];?>

                        <?php }?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['link']!=''){?></a><?php }?>	
                    </td>
                <?php }?>
            <?php } ?>
            
            
            <?php if ($_smarty_tpl->tpl_vars['arr_check']->value!=''){?>
            <td class="td_check <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['value']['last']){?> td_border<?php }else{ ?> td_border_left<?php }?>">
                <input type="checkbox" name="arr_check[]" id="check_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['value']['index'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
" />
            </td>
            <?php }?>
            
            
            
            <?php if ($_smarty_tpl->tpl_vars['has_action']->value==''){?>
            <td class="td_action <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['value']['last']){?> td_border<?php }else{ ?> td_border_left<?php }?>" style="width:<?php echo $_smarty_tpl->tpl_vars['action_width']->value;?>
px;">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_action']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['task']!='add'){?>
                <?php if (($_smarty_tpl->tpl_vars['item']->value['display']=='')||($_smarty_tpl->tpl_vars['item']->value['operation']=='equal'&&$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]==$_smarty_tpl->tpl_vars['item']->value['value'])||($_smarty_tpl->tpl_vars['item']->value['operation']=='notequal'&&$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['item']->value['field']]!=$_smarty_tpl->tpl_vars['item']->value['value'])){?>			
                <span style="cursor:pointer" onclick="
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['confirm']||$_smarty_tpl->tpl_vars['item']->value['action']){?>
                        javascript: 
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['action']!=''){?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
('<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
') 
                        <?php }else{ ?>						
                            confirm_redirect('Bạn có chắc không ?', '<?php echo $_smarty_tpl->tpl_vars['submit_url']->value;?>
&task=<?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
')						
                        <?php }?> 
                    <?php }elseif($_smarty_tpl->tpl_vars['item']->value['mod']!=''){?>		
                        javascript:new_tab_url('?mod=<?php echo $_smarty_tpl->tpl_vars['item']->value['mod'];?>
&mod_id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
')
                    <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['target']=='_blank'){?>
							javascript:new_tab_url('<?php echo $_smarty_tpl->tpl_vars['submit_url']->value;?>
&task=<?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
') 
						<?php }else{ ?>
							javascript:redirect_url('<?php echo $_smarty_tpl->tpl_vars['submit_url']->value;?>
&task=<?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['pkey']->value];?>
') 
						<?php }?>
                    <?php }?> 
                    " title="<?php echo $_smarty_tpl->tpl_vars['item']->value['tooltip'];?>
">
                    
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['icon']){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" border="0" style="cursor:pointer;" />
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>

                        <?php }?>
                           
                </span>
                <?php }?>			
                <?php }?>
            <?php } ?>
            </td>
            <?php }?>
            
            
        </tr>	
        <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
        <tr>
            <td style="text-align: center; color: #FF3333; padding: 15px; border-top: 1px solid gray;" colspan="10">
                <strong><?php echo $_smarty_tpl->getConfigVariable('foundno');?>
	</strong>
            </td>
        </tr>	
        <?php } ?>	
    </table>
    
    
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="clear: both;">
        <tr class="tr_paging">		
            <td valign="middle" align="left">&nbsp;
                
                
            <?php echo $_smarty_tpl->getConfigVariable('number_records');?>
: <strong><?php echo $_smarty_tpl->tpl_vars['number_record']->value;?>
</strong>&nbsp;&nbsp;&nbsp;
                
                    <?php echo $_smarty_tpl->getConfigVariable('record');?>
/<?php echo $_smarty_tpl->getConfigVariable('page');?>
: <input name="per_page" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['per_page']->value)===null||$tmp==='' ? 10 : $tmp);?>
" style="width: 40px; text-align:center;" onKeyPress="if(event.keyCode==13) for_datagrid.submit();">&nbsp;&nbsp;
                    <?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>
                    <span onClick="for_datagrid.page.value=1; for_datagrid.submit();" style="cursor: pointer; padding-top:3px;">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-first.gif" border="0"  style="cursor:pointer;"/>
                    </span>
                    <span onClick="for_datagrid.page.value=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
; for_datagrid.submit();" style="cursor: pointer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-prev.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    <?php }else{ ?>
                    <span>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-first-disabled.gif" border="0" />
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-prev-disabled.gif" border="0" />
                    </span>
                    <?php }?><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/grid-split.gif" border="0" />
                    <?php echo $_smarty_tpl->getConfigVariable('page');?>
: <input name="page" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page']->value)===null||$tmp==='' ? 1 : $tmp);?>
" style="width: 20px; text-align:center;" onKeyPress="if(event.keyCode==13) for_datagrid.submit();">
                    of <strong><?php echo $_smarty_tpl->tpl_vars['number_page']->value;?>
</strong>&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/grid-split.gif" border="0"/>
                    <?php if ($_smarty_tpl->tpl_vars['page']->value<$_smarty_tpl->tpl_vars['number_page']->value){?>
                    <span onClick="for_datagrid.page.value=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
; for_datagrid.submit();" style="cursor: pointer;">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-next.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    <span onClick="for_datagrid.page.value=<?php echo $_smarty_tpl->tpl_vars['number_page']->value;?>
; for_datagrid.submit();" style="cursor: pointer;">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-last.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    <?php }else{ ?>
                    <span>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-next-disabled.gif" border="0" />
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/images/page-last-disabled.gif" border="0" />
                    </span>
                    <?php }?>&nbsp;
            
            </td>
            <td  valign="middle" align="right">
                <div style="float:right; margin-left: 5px;">
                    <?php if ($_smarty_tpl->tpl_vars['arr_check']->value!=''&&$_smarty_tpl->tpl_vars['arr_value']->value!=''){?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_check']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']>0){?>&nbsp;|<?php }?>
                    <span style="cursor:pointer;" class="out" onmouseover="this.className='over'" onmouseout="this.className = 'out'" onclick="event_check('<?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
','Bạn chắc chắn không ?');"><?php echo $_smarty_tpl->tpl_vars['item']->value['display'];?>
</span>
                <?php } ?>
            <?php }?> &nbsp;
                            
                </div>
            </td>
        </tr>
    </table>
    
    
    </form>

<div style="clear: both"></div><?php }} ?>