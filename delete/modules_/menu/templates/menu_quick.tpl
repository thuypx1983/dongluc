<!--<div class="pkg menu_main">
      <div class="grid1060">
        <ul>
          <li class="active"><a href="" >Trang chu <span>トップページ</span></a></li>
          <li><a href="">Giới thiệu PLC <span>学校紹介</span></a> </li>
          <li><a href="">Khóa học tiếng Nhật <span>　日本語コース</span></a>
            <ul class="sub_menu">
              <li><a href="">Giới thiệu PLC</a></li>
              <li><a href="">PGiới thiệu PLC</a></li>
            </ul>
          </li>
          <li><a href=""> Du học Nhật Bản <span>日本留学</span></a>
            <ul class="sub_menu">
              <li><a href="">Giới thiệu PLC</a></li>
              <li><a href="">Giới thiệu PLC</a></li>
            </ul>
          </li>
          <li><a href="">Học tiếng Nhật Online<span>オンライン日本語</span> </a> </li>
          <li><a href="" rel="nofollow"> Khám phá Nhật Bản<span>　日本の文化</span></a> </li>
          <li><a href="">Doanh nghiệp<span>日系企業向け</span></a> </li>
          <li><a href="">Galelery<span>　写真</span></a> </li>
          <li><a href="" rel="nofollow">Liên hệ<span>連絡先</span></a> </li>
        </ul>
      </div>
    </div>-->
<style>
pre { color: black !important; width: 500px; background: #fff; margin:auto; }
</style>
{$menu_select = $smarty.get.menu_type}
<div class="pkg menu_main">
      <div class="grid1060">
        <ul>
			{foreach from=$menu_hoz item=row key=k}
				{if isset($row.link_to)}{$menu_com=$row.link_to}{else}{$menu_com=$row.link}{/if}
				<li {if $menu_select==$menu_com}class="active"{/if} {if ($smarty.get.mod=='album_photo' || $smarty.get.mod=='album_video') && $menu_com=='#'}class="active"{/if} {if $k==1 && $smarty.get.mod==about}class="active"{/if}>
					<a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.link}{if $k>0}/{/if}{/if}">{$row.title} <span>{$row.title_jp}</span></a>
					{if $row.sub}
						<ul class="sub_menu">
							{foreach from=$row.sub item=r}
							<li><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.pre_link}-{$r.id}/{/if}">{$r.title}</a></li>
							{/foreach}
						</ul>
					{/if}
				</li>
			{/foreach}
		</ul>
      </div>
    </div>