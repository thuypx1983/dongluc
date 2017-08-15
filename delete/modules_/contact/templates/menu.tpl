<ul class="menu_220">
    <li {if $smarty.get.task==ask}class="active"{/if}><a href="{$url}hoi-chuyen-gia/">Hỏi chuyên gia</a></li>
    <li {if $smarty.get.mod==product}class="active"{/if}><a href="{$url}mua-hang-truc-tuyen/">Mua hàng trực tuyến</a>
    	{if $smarty.get.mod==product|| $smarty.get.mod==article}
	    	{loadModule mod=article task=menu}
        {/if}
    </li>
    <li {if $smarty.get.task==map}class="active"{/if}><a href="{$url}mang-luoi-phan-phoi/">Mạng lưới phân phối</a></li>
</ul>