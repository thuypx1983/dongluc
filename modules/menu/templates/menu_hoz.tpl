
<ul>
	<li {if $smarty.get.mod==""} class="active"{/if}><a href="{$url}">{$smarty.const.TEXT_HOME}</a></li>
    <li {if $smarty.get.mod==album} class="active"{/if}><a href="{$url}{$smarty.const.LINK_ALBUM}/">Album ảnh</a></li>
    <li {if $smarty.get.mod==catalogue} class="active"{/if}><a href="{$url}{$smarty.const.LINK_CATA}/">Váy cưới</a></li>
    {$menu_select = $smarty.get.menu_type}
    {foreach from=$menu_hoz item=row key=k}
        <li {if $menu_select==$row.link}class="active"{/if}>
            <a {if $row.link=='tuyen-dung'}rel="nofollow"{/if} href="{$url}{$row.link}/">{$row.title}</a>
        </li>
    {/foreach}
    <li {if $smarty.get.mod==contact} class="active"{/if}><a href="{$url}{$link_contact}.html" rel="nofollow">Liên Hệ</a></li>
</ul>


{*foreach from=$menu_hoz item=row key=k}
    <li {if $menu_select==$row.link}class="active"{/if}>
        <a href="{$url}{$row.link}/">{$row.title}</a>
        {if $row.sub}
        <ul class="sub_menu">
            {foreach from=$row.sub item=r}
            <li><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.pre_link}-{$r.id}/{/if}">{$r.title}</a>
                {if $r.sub}
                <ul class="sub_cate_menu">
                    {foreach from=$r.sub item=r1}
                        <li><a href="{if $r1.link_to!=''}{$r1.link_to}{else}{$url}{$r1.pre_link}-{$r1.id}/{/if}">{$r1.title}</a></li>
                    {/foreach}
                </ul>
                {/if}
            </li>
            {/foreach}
        </ul>    	
        {/if}
    </li>
{/foreach*}

<!--<ul>
    <li><a href="">Trang chủ  </a></li>
    <li><a href="">Giới thiệu</a></li>
    <li><a href="">Dịch vụ </a></li>
    <li><a href="">Báo giá</a></li>
    <li><a href="">Album ảnh</a></li>
    <li><a href="">Tư vấn </a></li>
    <li><a href="">Liên hệ </a></li>
    <li><a href="">Tuyển dụng</a></li>
</ul>-->