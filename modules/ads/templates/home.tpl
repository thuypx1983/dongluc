
{if $rows}

<div class="slide_home">
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.list_slide').bxSlider({
			  //adaptiveHeight: true,
			  controls:false,
			  auto:true,
			  autoHover:false,
			  pager:true,
			  pause:3000,
			  autoStart:true,
		  });
		})
	</script>
      <ul class="list_slide">
        {foreach from=$rows item=row key=k}
			<li><a class="thumb300 thumbblock" href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/{$row.photo}" alt="{$row.title}"/></a></li>
		{/foreach}
      </ul>
</div>

{/if}