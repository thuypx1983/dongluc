<script type="text/javascript">
	var submit_url= "{$submit_url}";
</script>

{literal}
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
{/literal}

<link href="{$path}/datagrid.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{$path}/datagrid.js"></script>

    <form name="for_datagrid" action="" method="get" style="margin:0px;">
    <input type="hidden" name="mod" value="{$smarty.request.mod}">
    <input type="hidden" name="sub" value="{$smarty.request.sub}">
    <input type="hidden" name="mod_id" value="{$smarty.request.mod_id}">
    <input type="hidden" name="sort_by" value="{$sort_by}">
    <input type="hidden" name="sort_value" value="{$sort_value}">
    
    {if $arr_filter != ''}
    <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="div_filter" >
        <tr>
            <td width="100%" >		
                {*<div id="msg" style="margin-right: 10px; margin-top: 10px; float: right; height: 25px;"></div>*}
                  
                        <table>
                        <tr><td>
                        <table cellpadding="" cellspacing="3" border="0">		  		
                            <tr>
                           
                        {foreach item=row from=$arr_filter name=filter}
                            {if $smarty.foreach.filter.index % 5 == 0}							
                                </tr>
                                <tr>
                            {/if}
                            <td>&nbsp;{$row.display}:</td>
                            <td>
                            {if $row.type == 'date'}
                            <input onclick='scwShow(this,event);' type="text" name="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" id="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" value="{$row.selected}" {if $row.style != ''} style="{$row.style}"{/if} />
    
                
                            {elseif $row.type=='color'}
								<input class="color" type="text" name="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" id="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" value="{$row.selected}" {if $row.style != ''} style="{$row.style}"{/if} />
								
                            {elseif $row.type=='text'}
                                <input type="text" name="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" value="{$row.selected}" style="{$row.style}" />
                            {else}
                            <select name="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" id="{if $row.name != ''}{$row.name}{else}{$row.field}{/if}" {if $row.style != ''} style=" height: 23px; {$row.style}"{/if}  onchange="{$row.onchange}" >
                                {if $row.option_string == ''}
                                    <option value="">---</option>
                                    {html_options options = $row.option selected = $row.selected}	
                                    {*foreach key=k item=foo from=$row.option}
                                        <option value="{$k}" {if $k==$row.selected}selected{/if}>{$foo}</option>
                                    {/foreach*}						
                                {else}
                                    {$row.option_string}
                                {/if}
                            </select>
                            {/if}
                            </td>
                            
                        {/foreach}
                            </tr>
                        </table>
                        </td>
                        <td>
                        	{if $smarty.get.mod!=''}
                                {$local_reset = "?mod="|cat:$smarty.get.mod}
                            {/if}
                            {if $smarty.get.sub!=''}
                                {$local_reset = $local_reset|cat:"&sub="|cat:$smarty.get.sub}
                            {/if}
                        	<input type="submit" name="bt_fillter" value="Tìm kiếm"  style="border:1px solid #b0b0b0; background:url({$path}/images/bg_btn_search.png); height:28px; border-radius:5px; cursor:pointer;"/>
                                <input type="button" onclick="location.href='{$local_reset}'" name="bt_fillter" value="Reset"  style="border:1px solid #b0b0b0; background:url({$path}/images/bg_btn_search.png); height:22px; border-radius:5px; cursor:pointer; margin-top:4px;"/>
                        </td>
    
                        </tr>
                    </table>					
                 
                  
                
            </td>
        </tr>
    </table>
    {/if}
    
    
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr class="tr_title"  height="23px">		
        
            <td class="td_index">{#index#}</td>
            
            {foreach item=row from=$arr_cols}
                {if $row.visible == '' || $row.visible != 'hidden'}			
                    <td width= "{$row.width}px" class="td_border_left" style="color:#000000;text-align: {if $row.align}{$row.align}{else}left{/if}; padding-{if $row.align}{$row.align}{else}left{/if}: 3px;">
                    {if $row.sortable}<img src="{$path}/images/sort_asc{if ($sort_by==$row.field) && ($sort_value=='asc')}_select{/if}.gif" onclick="for_datagrid.sort_by.value='{$row.field}'; for_datagrid.sort_value.value='asc'; for_datagrid.submit();" style="cursor:pointer"/>&nbsp;{/if}
                    {$row.display}
                    {if $row.sortable}&nbsp;<img src="{$path}/images/sort_desc{if ($sort_by==$row.field) && ($sort_value=='desc')}_select{/if}.gif" onclick="for_datagrid.sort_by.value='{$row.field}'; for_datagrid.sort_value.value='desc'; for_datagrid.submit();" style="cursor:pointer"/>{/if}
    
                </td>
                {/if}           
            {/foreach}    
        
    
            {if $arr_check!= '' && $arr_value!=''}
            <td class="td_action td_border_left">        	
                <input type="checkbox" name="checkall" onclick="check_all(this)" title="Chọn tất cả"/>
                <input type="hidden" name="task" />        
            </td>
            {/if}
            
            {if $arr_action && $has_action ==''}
            <td class="td_action td_border_left" style="width:{$action_width}px;">{if $arr_action[0].task=='add'}<span style="cursor:pointer" onclick="javascript:redirect_url('{$submit_url}&task={$arr_action[0].task}')"><img src="{$path}/images/add.png" border="0" style="cursor:pointer;" title="{$arr_action[0].tooltip}" /></span>{else}Chức năng{/if}</td>
            {/if}
    </tr>
    
        
    
    {foreach name=value item=row from=$arr_value}		
        <tr class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}" onMouseOver="this.className='{if $smarty.foreach.value.index % 2 ==0}tr_hover1{else}tr_hover2{/if}'" onMouseOut="this.className='{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}'" >
            
            {* begin of index *}
                <td class="td_index {if !$smarty.foreach.value.last} td_border{else} td_border_left{/if}">{$smarty.foreach.value.index+$index_start}</td>
                {* end of index *}         
                
            
            {foreach key=key item=item from=$arr_cols name=col}
                {if $item.visible == '' || $item.visible != 'hidden'}				
                    <td width= "{$item.width}px" class="{if !$smarty.foreach.value.last} td_border{else} td_border_left{/if}" style="text-align: {if $item.align}{$item.align}{else}left{/if}; padding-{if $item.align}{$item.align}{else}left{/if}: 3px; ">
                    {if $item.link != ''} <a href="{$item.link}&{$item.field}={$row[$item.field]}&id={$row[$pkey]}">{/if}
                    {if $item.value_cores != ''}
                        {foreach key=ref item=cor from=$item.value_cores}
                            {if $ref == $row[$item.field]}
                                {$cor}
                            {/if}					
                        {/foreach}
                    {else}
                    
                        {if $item.type=='img'}
                            {if $row[$item.field] != ''}                           						
                                    <img src="{$item.img_path}{$row[$item.field]}" width="{$item.img_size|default:100}" border="0" title="{$row[$item.tooltip]}"/>                            
                            {else}  
                                &nbsp;
                            {/if}        
                         
						{elseif $item.type=='color'}
                            <input type="text" {if $item.editable} onchange="ajaxSave('{$row[$pkey]}', '{$item.field}', this.value) "{/if} class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if} color" style="border: none; width: {$item.width}px;" value="{$row[$item.field]}" />
                        {elseif $item.type=='lang'}
                        	<center>
                            {foreach key=k item=foo from=$item.flag}
                                <a href="{$local_reset}&task=switch_lang&id={$row[$pkey]}&{$item.field}={$row[$item.field]}&swlang={$k}&filter_default={$item.filter_default}"><img width="{if $smarty.session.lang==$k}23{else}18{/if}" src="{$url}{$foo}" /></a>&nbsp;
                            {/foreach}
                            </center>
                        {elseif $item.type=='date'}
                            <input type="text" {if $item.editable} onclick="scwNextAction=scwSave.runsAfterSCW(this, this); scwShow(this,event);" onchange="ajaxSave('{$row[$pkey]}', '{$item.field}', this.value) "{/if} id="datepicker{$smarty.foreach.value.index}" class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}" style="border: none; width: {$item.width}px;" value="{$row[$item.field]|date_format:'%Y-%m-%d'}" />
    
    
                            
                        {elseif $item.type=='boolean'}
                        
                            <div style="border: none; text-align: center; width: {$item.width}px;"><input type="checkbox" {if $item.editable}onchange="if (this.checked) this.value=1; else this.value=0; ajaxSave('{$row[$pkey]}', '{$item.field}', this.value)"{/if} value="$row[$item.field]" {if $row[$item.field]==1} checked="checked" {/if}/></div>
                                                    
                        {elseif $item.type=='number'}
                        
                            <input type="text" {if $item.editable}onchange="ajaxSave('{$row[$pkey]}', '{$item.field}', this.value)" {else}readonly="readonly"{/if} class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}" style="border: none; text-align: right; width: {$item.width}px;" value="{$row[$item.field]}" />                    
                                                    
                            
                        {elseif $item.type=='select'}
                            <select {if $item.editable}onchange="ajaxSave('{$row[$pkey]}', '{$item.field}', this.value)" {else}readonly="readonly"{/if} class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}" style="height: 20px; border: 1px solid gray; width: {$item.width}px;" >
                                <option value="">---</option>
                                {foreach key=k item=foo from=$item.option}
                                    <option value="{$k}" {if $k==$row[$item.field]}selected{/if}>{$foo}</option>
                                {/foreach}
                            </select>
    
                        {elseif $item.type=='text'}
                            <input type="text" {if $item.editable}onchange="ajaxSave('{$row[$pkey]}', '{$item.field}', this.value)" {else}readonly="readonly"{/if} class="{if $smarty.foreach.value.index % 2 ==0}tr_mau1{else}tr_mau2{/if}" style="border: none; width: {$item.width}px;" value="{$row[$item.field]}" />
                        {elseif $item.type=='price'}
							{$row[$item.field]|number_format:0:".":","}{$item.unit}
                        {* EDIT on 216-217 *}
                            
                        {else}
                            {$row[$item.field]}
                        {/if}
                    {/if}
                    {if $item.link != ''}</a>{/if}	
                    </td>
                {/if}
            {/foreach}
            
            {* begin of check *}
            {if $arr_check!= ''}
            <td class="td_check {if !$smarty.foreach.value.last} td_border{else} td_border_left{/if}">
                <input type="checkbox" name="arr_check[]" id="check_{$smarty.foreach.value.index}" value="{$row[$pkey]}" />
            </td>
            {/if}
            {* end of check *}
            
            {* begin of action *}
            {if  $has_action ==''}
            <td class="td_action {if !$smarty.foreach.value.last} td_border{else} td_border_left{/if}" style="width:{$action_width}px;">
            {foreach item=item from=$arr_action}
                {if $item.task!='add'}
                {if ($item.display == '') || ($item.operation == 'equal' && $row[$item.field]==$item.value) || ($item.operation == 'notequal' && $row[$item.field]!=$item.value)}			
                <span style="cursor:pointer" onclick="
                    {if $item.confirm || $item.action}
                        javascript: 
                        {if $item.action!=''}
                            {$item.action}('{$row[$pkey]}') 
                        {else}						
                            confirm_redirect('Bạn có chắc không ?', '{$submit_url}&task={$item.task}&id={$row[$pkey]}')						
                        {/if} 
                    {elseif $item.mod!=''}		
                        javascript:new_tab_url('?mod={$item.mod}&mod_id={$row[$pkey]}')
                    {else}
                        {if $item.target=='_blank'}
							javascript:new_tab_url('{$submit_url}&task={$item.task}&id={$row[$pkey]}') 
						{else}
							javascript:redirect_url('{$submit_url}&task={$item.task}&id={$row[$pkey]}') 
						{/if}
                    {/if} 
                    " title="{$item.tooltip}">
                    
                        {if $item.icon}
                            <img src="{$path}/images/{$item.icon}" border="0" style="cursor:pointer;" />
                        {else}
                            {$item.text}
                        {/if}
                           
                </span>
                {/if}			
                {/if}
            {/foreach}
            </td>
            {/if}
            {* end of action *}
            
        </tr>	
        {foreachelse}
        <tr>
            <td style="text-align: center; color: #FF3333; padding: 15px; border-top: 1px solid gray;" colspan="10">
                <strong>{#foundno#}	</strong>
            </td>
        </tr>	
        {/foreach}	
    </table>
    
    
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="clear: both;">
        <tr class="tr_paging">		
            <td valign="middle" align="left">&nbsp;
                
                
            {#number_records#}: <strong>{$number_record}</strong>&nbsp;&nbsp;&nbsp;
                
                    {#record#}/{#page#}: <input name="per_page" value="{$per_page|default:10}" style="width: 40px; text-align:center;" onKeyPress="if(event.keyCode==13) for_datagrid.submit();">&nbsp;&nbsp;
                    {if $page > 1}
                    <span onClick="for_datagrid.page.value=1; for_datagrid.submit();" style="cursor: pointer; padding-top:3px;">
                        <img src="{$path}/images/page-first.gif" border="0"  style="cursor:pointer;"/>
                    </span>
                    <span onClick="for_datagrid.page.value={$page-1}; for_datagrid.submit();" style="cursor: pointer">
                        <img src="{$path}/images/page-prev.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    {else}
                    <span>
                        <img src="{$path}/images/page-first-disabled.gif" border="0" />
                        <img src="{$path}/images/page-prev-disabled.gif" border="0" />
                    </span>
                    {/if}<img src="{$path}/images/grid-split.gif" border="0" />
                    {#page#}: <input name="page" value="{$page|default:1}" style="width: 20px; text-align:center;" onKeyPress="if(event.keyCode==13) for_datagrid.submit();">
                    of <strong>{$number_page}</strong>&nbsp;&nbsp;<img src="{$path}/images/grid-split.gif" border="0"/>
                    {if $page < $number_page}
                    <span onClick="for_datagrid.page.value={$page+1}; for_datagrid.submit();" style="cursor: pointer;">
                        <img src="{$path}/images/page-next.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    <span onClick="for_datagrid.page.value={$number_page}; for_datagrid.submit();" style="cursor: pointer;">
                        <img src="{$path}/images/page-last.gif" border="0"  style="cursor:pointer"/>
                    </span>
                    {else}
                    <span>
                        <img src="{$path}/images/page-next-disabled.gif" border="0" />
                        <img src="{$path}/images/page-last-disabled.gif" border="0" />
                    </span>
                    {/if}&nbsp;
            
            </td>
            <td  valign="middle" align="right">
                <div style="float:right; margin-left: 5px;">
                    {if $arr_check!= '' && $arr_value!=''}
                {foreach name=foo from=$arr_check item=item}
                    {if $smarty.foreach.foo.index > 0}&nbsp;|{/if}
                    <span style="cursor:pointer;" class="out" onmouseover="this.className='over'" onmouseout="this.className = 'out'" onclick="event_check('{$item.task}','Bạn chắc chắn không ?');">{$item.display}</span>
                {/foreach}
            {/if} &nbsp;
                            
                </div>
            </td>
        </tr>
    </table>
    
    
    </form>

<div style="clear: both"></div>