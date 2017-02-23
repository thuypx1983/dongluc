<div class=" menu_main">
          <ul>
            <li><a href="{$url}" {if $smarty.get.mod==''}class="active"{/if}>Trang chủ</a></li>
            <li><a href="{$url}gioi-thieu/" {if $smarty.get.mod=='about'}class="active"{/if}>Giới thiệu</a> </li>
            <li><a href="{$url}san-pham/" {if $smarty.get.mod=='product'}class="active"{/if}>Sản phẩm</a>
            {if $rows}
              <ul class="sub_menu_main">
                {foreach from=$rows item=row key=k}
                <li><a href="{$url}{$row.link}-{$row.id}/">{$row.title}</a>
                    {if $row.sub}
                  <ul class="sub_menu_main2">
                        {foreach from=$row.sub item=r}
                        <li><a href="{$url}{$r.link}-{$r.id}/">{$r.title}</a></li>
                        {/foreach}
                  </ul>
                  {/if}
                </li>
                {/foreach}
                </ul>
            {/if}
                
            </li>
            <li><a href="{$url}dich-vu/" {if $smarty.get.mod=='news'}class="active"{/if}>Dịch vụ</a></li>
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
            <li><a href="{$url}doi-tac/"  {if $smarty.get.mod=='partner'}class="active"{/if}>Đối tác</a></li>
            <li><a href="{$url}lien-he.html"  {if $smarty.get.mod=='contact'}class="active"{/if}>Liên hệ</a></li>
          </ul>
        </div>