<style>
.play_show_video{ display: none; overflow: hidden; }
</style>
<script>
$(function(){
	/*$('.box_video_home').find('.this_img').each(function(){
		var width  = $(this).width() - 0;
		var height = $(this).height() - 0;
		console.log(width + 'x' + height);
		$(this).closest('.box_video_home').find('.play_show_video')
			.css('width', width+'px')
			.css('height', height+'px');
	})*/

	$('.video_play_click').click(function(){

		var parent = $(this).closest('.box_video_home');
		var img    = parent.find('.this_img');
		var width  = img.width() + 10;
		var height = img.height() + 10;
		console.log(width + 'x' + height);
		$(this).hide();
		parent.css('border', 'none');
		parent.find('.head_video').hide();
		parent.find('.play_show_video').show();
		
		div = parent.find('.play_show_video').find('div');
		div.attr('data-maxwidth', width);
		div.attr('data-maxheight', height);
		div.find('iframe').attr('width', width);
		div.find('iframe').attr('height', height);
		src_embed = div.find('iframe').attr('src').replace("?", "?autoplay=1&");
		div.find('iframe').attr('src', src_embed);

		return false;
	})
})
</script>
{if $rows}
	{foreach from=$rows item=row key=k}
    	{if $k < 3}
	    	{if $row.ads_type == flash}
				<li class="box_video_home">
					<div class="head_video">Video</div>
						<a href="" {if $row.embed != ''}class="video_play_click"{else}onclick="return false"{/if}>
							<span class="icon_play">
								<img src="{$url}images/icon_youtube.png"/>
							</span>
							<img class="this_img" id="this_img_{$row.id}" src="{$url}upload/ads/{$row.photo}"/>
						</a>
					<div class="play_show_video" id="psv_{$row.id}">{$row.embed}</div>
				</li>
	    	{else}
	    		<li><a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/{$row.photo}" alt="{$row.title}"/></a></li>
	    	{/if}
    	{/if}
    {/foreach}
{/if}




{*if $rows}
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
  		<img src="{$url}images/icon_youtube.png" />
  	</span>
  	<img id="this_img" src="{$url}upload/ads/{$rows[0].photo}"/>
  </a>
  <div id="play_show_video">
	{$rows[0].embed}
</div>
</li>
{/if*}