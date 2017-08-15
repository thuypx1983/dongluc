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
        	<li class="span2"><a class="fancybox-button" rel="fancybox-button" href="{$url}upload/gallery/photo/{$alp.photo}"><img src="{$url}upload/gallery/photo/{$alp.photo}" alt="{$row.title}"></a></li>
        {foreachelse}
        	<em style="display:block ;padding:0 0 20px 10px;">Album đang cập nhật...</em>
        {/foreach}
    </ul>

    <div class="box_share" align="center">
    	
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