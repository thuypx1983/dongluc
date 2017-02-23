

<div class="grid1060">
    <div class="breadcumb"><a href="">{#text_menu_about#}</a></div>
    <div class="maincontent">
      <div class="vanhoa" id="vanhoa">
        <div class="left">
          <div class="col700 col700_cate fl">
            <div class="title_detail">{$about.title}</div>
            <div class="box_share pkg">
              <div class="time_detail fl">Ngày đăng: {$about.create_date}</div>
              <div class="fr">
              
              <!--<a><img src="{$url}photo/fb-de.jpg"></a><a><img src="{$url}photo/fbshare-de.jpg"></a><a><img src="{$url}photo/gle.jpg"></a>-->
              
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
            <div id="content_detail_news">
                {$about.content}
            </div>
            
            
          </div>
          
          <div class="pkg"> </div>
        </div>
        {loadModule mod=box_right}
      </div>
      <div class="doisong" id="doisong">
        <p class="clear"> </p>
      </div>
      <p class="clear"> </p>
    </div>
  </div>
  