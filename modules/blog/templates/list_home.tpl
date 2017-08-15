<div class="content">
	<h2 class="tle">thông tin khuyến mãi</h2>
	{if $rows}
		<div class="media"> <a class="pull-left" href="{$url}{$root_link}/{$rows[0].parent_link}/{$rows[0].link}.html"> <img src="{$url}upload/news/{$rows[0].photo}" class="img-polaroid"  width="240" alt=""/> </a>
		  <div class="media-body">
			<h4 class="media-heading">{$rows[0].title}</h4>
			<p>
				{$rows[0].description|strip_tags|truncate:370}
				<a href="{$url}{$root_link}/{$rows[0].parent_link}/{$rows[0].link}.html">xem chi tiết</a>
			</p>
		  </div>
		  <div class="clearfix"></div>
		  <ul class="media-li">
			{section name=foo loop=$rows start=1}
				<li><a href="{$url}{$root_link}/{$rows[foo].parent_link}/{$rows[foo].link}.html">{$rows[foo].title}</a></li>
			{/section}
		  </ul>
		</div>
	{else}
		Chưa có bài viết nào
	{/if}
  </div>