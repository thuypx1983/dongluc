{if $rows}



<div class="col47per fl">
	<div class="head_bar"><img src="{$url}images/icon_photo.png"/><span>PHOTO</span> </div>
	 <script>
	$(document).ready(function(){
			$('.bxslider').bxSlider({
			pager:false,
			captions: true
			});
	})
 </script>
 <div class="slide_photo">
	<ul class="bxslider">
		{foreach from=$rows item=row}
			<li><a href="{$url}photo/{$album_info.link}-{$album_info.id}.html"><img src="{$url}upload/gallery/photo/700x525/{$row.photo}" style="width: 462px" /></a></li>
		{/foreach}
	</ul>
   </div>
  </div>
  
  {/if}