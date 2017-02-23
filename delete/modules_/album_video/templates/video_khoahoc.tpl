

<style>
#play_show_video {
	display: none; overflow: hidden; border: 7px solid #444444;
}
</style>
<script>
$(function(){

	var img = document.getElementById('this_img'); 
	//or however you get a handle to the IMG
	var width = img.clientWidth;
	var height = img.clientHeight;
	//console.log(width + 'x' + height);
	$('#play_show_video').css('width', width+'px');
	$('#play_show_video').css('height', height+'px');

	$('.video_play_click').click(function(){
		$(this).hide();
		$('#play_show_video').show();
		
		_div = $('#play_show_video').find('div');
		_div.attr('data-maxwidth', width);
		_div.attr('data-maxheight', height);
		_div.find('iframe').attr('width', width);
		_div.find('iframe').attr('height', height);
		_src_embed = _div.find('iframe').attr('src').replace("?", "?autoplay=1&");
		_div.find('iframe').attr('src', _src_embed);
		return false;
	})

	
})
</script>

<div class="head_bar"><img src="{$url}images/icon_video.png"/><span>Video</span> </div>
<div>
	<div class="video_play_click">
		<span class="video_focus thumb_over"><img src="{$url}upload/gallery/video/{$row.photo|default:'no-image.jpg'}" style="width:648px" id="this_img"/> <span class="icon_play"></span><span class="title_thumb_bottom">{$row.title}</span></span>
	</div>
	<div id="play_show_video">
		{$row.embed}
	</div>
</div>

