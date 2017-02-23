<div class="col_left fl">
    <div class="title_left">{$menu_type.title}</div>
    <ul class="menu_left">
        {if $smarty.get.mod=='product'}{$menu_select=$smarty.get.id}{/if}
        {foreach from=$rows item=row key=k}
        <li {if $menu_select==$row.id || $row.sub}class="active"{/if}><a href="{$url}{$row.pre_link}-{$row.id}/" {if $menu_select==$row.id || $row.sub}class="active"{/if}>{$row.title}</a>
            {if $row.sub}
            <ul class="list_sub_menu">
                {foreach from=$row.sub item=r}
                <li {if $menu_select==$r.id}class="active"{/if}><a href="{$url}{$r.pre_link}-{$r.id}/" {if $menu_select==$r.id}class="active"{/if}>-&nbsp;&nbsp;{$r.title}</a>
                    {if $r.sub}
                    <ul class="list_sub_cate">
                        {foreach from=$r.sub item=r1}
                        <li {if $menu_select==$r1.id}class="active"{/if}><a href="{$url}{$r1.pre_link}-{$r1.id}/" {if $menu_select==$r1.id}class="active"{/if}>+ {$r1.title}</a></li>
                            {if $r1.sub}
                            <ul class="list_sub_cate">
                                {foreach from=$r1.sub item=r2}
                                <li {if $menu_select==$r2.id}class="active"{/if}><a href="{$url}{$r2.pre_link}-{$r2.id}/" {if $menu_select==$r2.id}class="active"{/if}>+ {$r2.title}</a></li>
                                    {if $r2.sub}
                                    <ul class="list_sub_cate">
                                        {foreach from=$r2.sub item=r3}
                                        <li {if $menu_select==$r3.id}class="active"{/if}><a href="{$url}{$r3.pre_link}-{$r3.id}/" {if $menu_select==$r3.id}class="active"{/if}>+ {$r3.title}</a></li>
                                        {/foreach}
                                    </ul>
                                    {/if}
                                {/foreach}
                            </ul>
                            {/if}
                        {/foreach}
                    </ul>
                    {/if}
                </li>
                {/foreach}
            </ul>
            {/if}
        </li>
        {/foreach}
    </ul>
</div>