<div class="fr col300">
		{if $has_box_parent}
          <div class="right">
          	{loadModule mod=news task=baivietmoinhat param='1|'|cat:$smarty.get.menu_type}
          </div>
          <p class="clear">&nbsp; </p>
		  {/if}
		  
          <div id="nhieunguoixemnhat">
			{if $row_boxs}
            <p class="title"> • Nhiều người xem nhất</p>
            <div class="content_sub"> <span id="">
              <div class="top xemnhieuvanhoa"><a href="{$url}{$row_boxs[0]['link']}-{$row_boxs[0]['id']}.html" title="{$row_boxs[0]['title']}"><span>{$row_boxs[0]['title']}</span><img src="{$url}upload/news/thumb/{$row_boxs[0]['photo']|default:'no-image.jpg'}"></a>
                <div>{$row_boxs[0]['description']|truncate:300}</div>
                
			{if $row_boxs}
              <div class="list">
                <ul>
					{foreach from=$row_boxs item=box key=k}
						{if $k >0}
						<li style="clear: none !important;"><a href="{$url}{$box.link}-{$box.id}.html" ><img src="{$url}upload/news/thumb2/{$box.photo|default:'no-image.jpg'}"><span>{$box.title}</span></a><span style="margin-top:-39px;"><a style="font-size:11px;" href="{$url}{$box.link}-{$box.id}.html">Chi tiết</a> </span></li>
						{/if}
					{/foreach}
                </ul>
              </div>
			 {/if}
              </span>
              <p class="clear"> </p>
            </div>
          </div>
		  {/if}
          <div style="clear:both;"></div>
		  {if $has_box_gallery}
          <p class="clear">&nbsp; </p>
          <script type="text/javascript">
        $(function () {
            $("#thuvienanhvideo .title p").click(function () {
                $("#thuvienanhvideo .title p").removeClass("active");
                var clas = $(this).attr("class");
                $("#thuvienanhvideo .noidung div").hide();
                $("#thuvienanhvideo .noidung ." + clas).show();
                $(this).addClass("active");
            });
        })(jquery);
    </script>
          <div id="thuvienanhvideo">
            <div class="title active">
              <p class="image active"> • Thư Viện Hình Ảnh </p>
              <p class="video"> • Thư Viện Video </p>
            </div>
            <div class="noidung">
              <div class="image">
				{loadModule mod=album_photo task=right}
              </div>
              <div class="video" style="display:none">
                {loadModule mod=album_video task=right}
              </div>
              <p class="clear"> </p>
            </div>
            <div class="img"> </div>
          </div>
		  {/if}
          
        </div>