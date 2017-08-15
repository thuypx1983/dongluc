{if $rows}
<script>
    $(document).ready(function(){
            $('.bxslider').bxSlider({
              minSlides: 2,
              maxSlides: 4,
              slideWidth: 250,
              slideMargin: 20,
			  moveSlides:1,
			  auto: true
            });
    })
 </script>
 
<div class="grid1060">
      <div class="head_bar"><img src="{$url}images/icon_photo.png"/><a href="{$url}photo/"><span>PHOTO</span></a> </div>
      <ul class="bxslider">
		{foreach from=$rows item=row}
			<li><a href="{$url}{$row.link}-{$row.album_id}.html"><img style="width: 250px; height: 163px;" src="{$url}upload/gallery/photo/250x188/{$row.photo}" /></a></li>
		{/foreach}
      </ul>
    </div>
{/if}