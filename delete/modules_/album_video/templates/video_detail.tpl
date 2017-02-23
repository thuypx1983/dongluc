<script type="text/javascript" src="{$url}js/jssor.js"></script>
<script type="text/javascript" src="{$url}js/jssor.slider.js"></script>
<script type="text/javascript" src="{$url}js/newsjs-detail.js"></script>

<div class="grid1060">
    <div class="breadcumb"><a href="#">Gallery </a><a href="{$url}video/" class="active">Thư viện video </a></div>
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
            
      		<div>
				{$row.embed}
            </div>
            
            <div class="left"><div class="title"> <a href="" title=""><span>Video khác</span></a> </div></div>
            <div class="list_photo pkg">
            
				{if $rows}
				 
					{foreach from=$rows item=row}
        	
						<a href="{$url}{$row.pre_link}-{$row.id}.html" class="thumb250x188 thumb_over fl"><span class="icon_play_small"></span><img style="width: 210px;" src="{$url}upload/gallery/video/thumb/{$row.photo}"> <span class="title_thumb_bottom">{$row.title}</span> </a>
					{/foreach}
				 
				 {/if}
            </div>
            
      </div>
        
        {loadModule mod=box_right}
      </div>
      
      <p class="clear"> </p>
    </div>
  </div>
