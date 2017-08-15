<div class=" menu_main">
          <ul>
            <li><a href="{$url}gioi-thieu/" {if $smarty.get.mod=='about'}class="active"{/if}>Giới thiệu</a> </li>
            <li><a href="{$url}san-pham/" {if $smarty.get.mod=='product'}class="active"{/if}>Sản phẩm</a>
            {if $rows}
              <ul class="sub_menu_main 1">
                {foreach from=$rows item=row key=k}
                <li><a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.link}-{$row.id}/{/if}">{$row.title}</a>
                    {if $row.sub}
                  <ul class="sub_menu_main2">
                        {foreach from=$row.sub item=r}
                        <li><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.link}-{$r.id}/{/if}">{$r.title}</a>
                            {if $r.sub}
                              <ul class="sub_menu_main3">
                                    {foreach from=$r.sub item=endsub}
                                    <li><a href="{if $endsub.link_to!=''}{$endsub.link_to}{else}{$url}{$endsub.link}-{$endsub.id}/{/if}">{$endsub.title}</a></li>
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
            {/if}
                
            </li>
            <li class="service">
				<a href="{$url}dich-vu/" {if $smarty.get.mod=='news'}class="active"{/if}>Dịch vụ</a>
				<ul class="sub_menu_main 1">
					{foreach from=$cats item=row key=k}
                        {if $row.id!=18}
                             <li>
                             <a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}dich-vu/{$row.link}-{$row.id}/{/if}">{$row.title}</a>
                              {if $row.children}
                              <ul class="sub_menu_main2">
                                    {foreach from=$row.children item=r}
                                    <li><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}dich-vu/{$r.link}-{$r.id}/{/if}">{$r.title}</a>

                                    </li>
                                    {/foreach}
                              </ul>
                            {/if}
                             </li>
                        {/if}
					{/foreach}
				</ul>
			</li>
            <li>
                <a href="{$url}showroom/" {if $smarty.get.mod=='showroom'}class="active"{/if}>Showroom</a>
                {if $region}
                <ul class="sub_menu">
                    {foreach from=$region item=re}
                    <li><a href="{$url}showroom/{$re.link}-{$re.id}/">{$re.title}</a></li>
                    {/foreach}
                </ul>
                {/if}
            </li>
            <!-- <li><a href="{$url}doi-tac/"  {if $smarty.get.mod=='partner'}class="active"{/if}>Đối tác</a></li> -->
			<li>
                <a href="/dich-vu/tin-tuc-18/">Tin tức</a>
                <ul class="sub_menu">
                    {foreach from=$subnews item=re}
                        <li><a href="/dich-vu/{$re.link}-{$re.id}/">{$re.title}</a></li>
                    {/foreach}

                </ul>
            </li>
            <li><a href="https://donglucsport.com/" target="_blank" title="Xuất khẩu" rel="nofollow">Xuất khẩu</a></li>
            <li><a href="{$url}lien-he.html"  {if $smarty.get.mod=='contact'}class="active"{/if}>Liên hệ</a></li>
          </ul>
        </div>