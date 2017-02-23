{*
<style>
.h1_album { font-size:24px; padding:0; margin:0; font-weight:normal; }
.h2_album { font-size:16px; padding:0; margin:0; font-weight:normal; }
</style>
<div class="content clearfix ">
    <div class="head_right_full"><span><h1 class="h1_album">ALBUM ẢNH CƯỚI ĐẸP</h1></span></div>
    <div class="content_album clearfix">
    <ul class="list_album clearfix">
    	{foreach from=$rows item=row}
        	<li>
            	<a href="{$url}{$row.link}-{$row.id}.html" class="thumb_over thumb190"><img src="{$url}upload/gallery/album/{$row.photo}" alt="{$row.title}"/></a>
                <a href="{$url}{$row.link}-{$row.id}.html" class="a_upper"><h2 class="h2_album">{$row.title}</h2></a>
                <div class="address_pose">{$row.description}</div>
            </li>
        {foreachelse}
            <em>Chưa có Album nào</em>
        {/foreach}
    </ul>
    </div>
     <!--<div class="paging paging_album" align="center">
        <a href="" class="active">1</a><a href="">2</a><a href="">3</a><a href="">4</a>
    </div>-->
    <div class="paging paging_album" align="center">
        {$paging}
    </div>
</div>

*}

<link href="{$url}css/jquery.fancybox.css" type="text/css" rel="stylesheet">
<link href="{$url}css/jquery.fancybox-buttons.css" type="text/css" rel="stylesheet">

<style>
.h1_news { font-size:24px; padding:0; margin:0; font-weight:normal; }
.h2_news { font-size:18px; padding:0; margin:0; font-weight:normal; }
.h3_news { font-size:14px; padding:0; margin:0; font-weight:normal; display:inline-block; }

.thum180x267 {
	width: 180px;
	height: 267px;
	display: inline-block;
	border: 2px solid #fff;
	margin-right: 20px;
}
</style>
<div class="content_cate clearfix">
    <div class="content_cate_left fl">
    
    <div class="box_left">
        <div class="head_left a_upper">Catalogue váy cưới</div>
      </div>
      
      
      <div class="box_left" align="center" style="">
      	{loadModule mod=social task=fanpage}
      </div>
      
    </div>
    <div class="content_cate_right fr">
    	<div class="box_right">
        	<div class="head_right"><span><h1 class="h1_news">Catalogue váy cưới</h1></span></div>
            <ul class="list_news">
            	{foreach from=$rows item=row key=k}	
            	<li class="clearfix">             
                	<a href="{$url}upload/catalogue/{$row.photo|default:'../../../images/logo.png'}" rel="fancybox-button" class="fancybox-button thumb_over fl thum180x267"><img src="{$url}upload/catalogue/thumb/{$row.photo|default:'../../../images/logo.png'}" alt="{$row.title}"/> </a>
                    <div class="info_news">
                    	<a href="{$url}upload/catalogue/{$row.photo|default:'../../../images/logo.png'}" rel="fancybox-button" class="fancybox-button title_news"><h2 class="h2_news">Mã váy: {$row.title}</h2></a>
                        <!--<div class="time_news">({$row.create_date|date_format:'%d/%m/%Y'})</div>-->
                        <div class="sapo_news">
                        	{$row.content|truncate:650}
                        </div>
                    </div>
                </li>
                {foreachelse}
                <li class="clearfix">
                	<em style="color:#fff;">Chưa có bài viết</em>
                </li>
                {/foreach}
               
            </ul>
            <div class="paging paging_album" align="right">
            	{$paging}
            </div>
        </div>
    		
    
    </div>
  </div>
  
    <script type='text/javascript' src="{$url}js/jquery.fancybox.pack.js"></script>
<script type='text/javascript' src="{$url}js/jquery.fancybox-buttons.js"></script>
<script type='text/javascript' src="{$url}js/jquery.fancybox-media.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function() {
			$(".fancybox-button").fancybox({
                prevEffect		: 'elastic',
                nextEffect		: 'elastic',
                openEffect		: 'elastic',
                closeEffect		: 'elastic',
                closeBtn		: false,
                helpers		: {
                    title	: { type : 'inside' },
                    buttons	: { position   : 'bottom'}
                }
            });
      });
  </script>