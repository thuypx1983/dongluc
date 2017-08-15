<script type="text/javascript" src="{$url}js/jssor.js"></script>
<script type="text/javascript" src="{$url}js/jssor.slider.js"></script>
<script type="text/javascript" src="{$url}js/newsjs-detail.js"></script>

<div class="grid1060">
    <div class="breadcumb"><a href="#">Gallery </a><a href="{$url}photo/" class="active">Thư viện ảnh </a></div>
    <div class="maincontent">
      <div class="vanhoa" id="vanhoa">
      <div class="col700 fl col690">
      <div class="title_detail">{$row.title}</div>
      <div class="box_share pkg">
              <div class="time_detail fl">Ngày đăng: {$row.create_date}</div>
              <div class="fr">
			  
			  <div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=171233966388911&version=v2.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				
				<div class="fb-like" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
				&nbsp;&nbsp;
				<div class="fb-share-button" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-type="button"></div>
				&nbsp;&nbsp;
				<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
				<div class="g-plusone" data-annotation="none" data-size="medium"></div>
				
				<!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
				<script type="text/javascript">
				  window.___gcfg = { lang: 'vi' };
				
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/platform.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			  
			  </div>
            </div>
      		<div id="slider_detail_container" style="position: relative; top: 0px; left: 0px; width: 700px;
        height: 457px; background: #191919; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 700px; height: 525px; overflow: hidden;">
		{foreach from=$row.album_photo item=alp}
            <div>
				<img u="image" src="{$url}upload/gallery/photo/700x525/{$alp.photo}" alt="{$row.title}">
				<img u="thumb" src="{$url}upload/gallery/photo/100x75/{$alp.photo}" alt="{$row.title}">
            </div>
        {/foreach}
            
        </div>
        
        <!-- Arrow Navigator Skin Begin -->
       
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 208px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 208px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        
        <!-- Thumbnail Navigator Skin Begin -->
        <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 1060px; height: 100px; left: 0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
           
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 100px; height: 65px; top: 0; left: 0;">
                    <div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>
                    <div class=c>
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
   
    </div>
            <div class="left"><div class="title"> <a href="" title=""><span>Thư viện ảnh khác</span></a> </div></div>
            <div class="list_photo pkg">
            
				{if $rows}
				 
					{foreach from=$rows item=row}
        	
						<a href="{$url}{$row.pre_link}-{$row.id}.html" class="thumb250x188 thumb_over fl"><img src="{$url}upload/gallery/album/{$row.photo}"> <span class="title_thumb_bottom">{$row.title}</span> </a>
					{/foreach}
				 {else}
                 	<em style="padding-left:35px;">Chưa có album nào</em>
				 {/if}
            </div>
            
      </div>
        
        {loadModule mod=box_right}
      </div>
      
      <p class="clear"> </p>
    </div>
  </div>

{*
<style>
.h1_album_detail { font-size:20px; padding:0; margin:0; font-weight:normal; }
.h3_album_detail { font-size:16px; padding:0; margin:0; font-weight:normal; }
</style>

<link href="{$url}css/jquery.fancybox.css" type="text/css" rel="stylesheet">
<link href="{$url}css/jquery.fancybox-buttons.css" type="text/css" rel="stylesheet">
<link href="{$url}css/jquery.bxslider.css" type="text/css" rel="stylesheet">

{if $row.album_photo}
<script>
$(function(){
	$('.pix_diapo').diapo();
});
</script>
<div class="slide clearfix">
    <div class="pix_diapo">
    	{foreach from=$row.album_photo item=alp}
      		<div>
            	<a class="fancybox-button" rel="fancybox-button" href="{$url}upload/gallery/photo/{$alp.photo}">
            		<img src="{$url}upload/gallery/photo/{$alp.photo}" alt="{$row.title}">
               	</a>
            </div>  	
        {/foreach}
    </div>
    
    
  </div>
  {/if}
  <div class="content_detail_album clearfix ">

  <div class="col830 fl">
   <div class="head_title_right"><h1 class="h1_album_detail">{$row.title}</h1></div>
    <div class="box_830 clearfix">
    <ul class="thumbnails detail-page">
    	{foreach from=$row.album_photo item=alp}
        	<li class="span2"><a class="fancybox-button" rel="fancybox-button" href="{$url}upload/gallery/photo/{$alp.photo}"><img src="{$url}upload/gallery/photo/thumb/{$alp.photo}" alt="{$row.title}"></a></li>
        {foreachelse}
        	<em style="display:block ;padding:0 0 20px 10px;">Album đang cập nhật...</em>
        {/foreach}
    </ul>

    <div class="box_share" align="center">
            {loadModule mod=social taks=fanpage}
    </div>
        </div>
    </div>
    
    <div class="col290 fr">
    	 <div class="head_title_right">Xem Album khác</div>
         
         {if $rows}
         <ul class="slide_photo clearfix">
         	{foreach from=$rows item=other}
            	<li>
                	{foreach from=$other item=r}
              		<div class="box_slide clearfix"><a href="{$url}{$r.link}-{$r.id}.html" class="thumb170 thumb_over"><img  src="{$url}upload/gallery/album/{$r.photo}"/> </a>
                    	<a href="{$url}{$r.link}-{$r.id}.html" class="a_upper"><h3 class="h3_album_detail">{$r.title}</h3></a>
                        <div class="address_pose">{$r.description}</div>
                    </div>
                    {/foreach}
              </li>
            {/foreach}
         </ul>
         {/if}
    </div>
  </div>
  

<script type='text/javascript' src="{$url}js/jquery.bxslider.js"></script>
  <script type='text/javascript' src="{$url}js/jquery.fancybox.pack.js"></script>
<script type='text/javascript' src="{$url}js/jquery.fancybox-buttons.js"></script>
<script type='text/javascript' src="{$url}js/jquery.fancybox-media.js"></script>
  <script>
  
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
  
  	$(function(){
		
		
	$('.slide_photo').bxSlider({
		
		  slideMargin: 5,
 		  auto:true,
	
		  speed: 1000,
		  pause: 10000,
		});
	});
</script>

*}