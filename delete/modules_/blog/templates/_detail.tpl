
<link href="{$url}style_cust/news_style.css" rel="stylesheet" />

<div class="content-header">
    <div class="container">
      <div class="row" style="position:relative;">
	      <h2 class="span12 head-tittle">blog</h2>
		  <div style="position:absolute; bottom:44px; left:20px; color:#fff;">
				{$category_title}
			</div>
      </div>
    </div>
  </div>
</div>

<div style="height:24px;"></div>

<div class="container">
    <div class="row">
       	
		
		<div id="h_main">
		
			<div class="h_item_readmore">
				<span>Ngày đăng : {$row.create_date|date_format:"%d/%m/%Y"}</span>
				<span class="h_a_readmore"><a onclick="parent.back();return false;" href="#" title="Quay lại">&#171;&nbsp;Quay lại</a></span>
			</div>
			
			<img src="{$url}upload/blog/{$row.photo|default:'../../img_cust/default2.jpg'}" class="h_content_img" alt="{$row.seo_photo_alt}">
			
			<div style="height:10px;"></div>
			<a href="{$url}{$row.pre_link}.html" title="{$row.title}"><h3>{$row.title}</h3></a>
			
			<div style="margin-bottom:15px;">{$row.description|strip_tags}</div>
			<div>{$row.content}</div>
			
			<div class="h_noibat">
				{if $smarty.get.link!=''}
					Bài viết liên quan
				{else}
					Kênh truyền thông khác
				{/if}
			</div>
			
			<div class="h_hotpost">
				{foreach from=$rows item=row key=k}
					<div class="h_hotpost_item {if $k==0}no-border{/if}"><a href="{$url}{$row.pre_link}.html" title="{$row.title}"><h4>&bull;&nbsp;&nbsp;&nbsp;&nbsp;{$row.title}&nbsp;({$row.create_date|date_format:"%d/%m/%Y"})</h4></a></div>
				{foreachelse}		
					Chưa có bài viết nào
				{/foreach}
			</div>
			
			
			{loadModule mod=blog task=list_new}
			
		</div>
		
		<div id="h_right">
			{loadModule mod=blog task=category}
			{loadModule mod=blog task=list_top}
		</div>
		
		
    	<div class="clearfix"></div>
    </div>
</div>
