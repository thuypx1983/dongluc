
{if $rows}
<style>
#play_show_video{ display: none; overflow: hidden; }
</style>
<script>
$(function(){

	var img = document.getElementById('this_img'); 
	//or however you get a handle to the IMG
	var width = img.clientWidth + 7;
	var height = img.clientHeight + 7;
	//console.log(width + 'x' + height);
	$('#play_show_video').css('width', width+'px');
	$('#play_show_video').css('height', height+'px');

	$('.video_play_click').click(function(){
		$(this).hide();
		$('.head_video').hide();
		$('.box_video_home').css('border', 'none');
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
<li class="box_video_home">
  <div class="head_video">Video</div>
  <a href="" class="video_play_click">
  	<span class="icon_play">
  		<img src="{$url}images/icon_youtube.png"/>
  	</span>
  	<img id="this_img" src="{$url}upload/ads/{$rows[0].photo}"/>
  </a>
  <div id="play_show_video">
	{$rows[0].embed}
</div>
</li>
{/if}