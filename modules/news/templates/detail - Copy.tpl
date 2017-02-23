
<style>
.customParent {
  width: 780px !important;
}
.customParent li {
  margin-right: 48px;
  width: 320px;
  height:185px;
  overflow:hidden;
  float: left;
  clear:none !important;
}
</style>

<div class="grid1060">
    <div class="breadcumb"><a href="{$url}{$row.menu_type}/">{$row_title}</a>{if $row_title_sub}<a href="{$url}{$row.menu_type}/{$row_title_sub.link}-{$row.news_category_id}/" class="active">{$row_title_sub.title}</a>{/if}</div>
    <div class="maincontent">
      <div class="vanhoa" id="vanhoa">
        <div class="left col690">
          <div class="col700 col700_cate fl">
            <div class="title_detail">{$row.title}</div>
            <div class="box_share pkg">
              <div class="time_detail fl">Ngày đăng: {$row.create_date}</div>
              <div class="fr">
        
        <!--<a><img src="{$url}photo/fb-de.jpg"></a><a><img src="{$url}photo/fbshare-de.jpg"></a><a><img src="{$url}photo/gle.jpg"></a>-->
        
        
        
        
        <div class="fb-like" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.HTTP_X_REWRITE_URL}" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
        &nbsp;&nbsp;
        <div class="fb-share-button" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.HTTP_X_REWRITE_URL}" data-type="button"></div>
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
            <div class="sapo_detail">{$row.description}</div>
            <style>
              #content_detail_news img { margin-top: 20px !important; margin-bottom: 20px !important; }
            </style>
            <div id="content_detail_news">
        {$row.content}
      </div>
      
      
            <div class="box_share pkg">
              <div class="fl">
        
        <div class="fb-like" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
        &nbsp;&nbsp;
        <div class="fb-share-button" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-type="button"></div>
        &nbsp;&nbsp;
        <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
        <div class="g-plusone" data-annotation="none" data-size="medium"></div>
        
        </div>
            </div>
            
          </div>
      
      
      <div class="fb-comments" data-href="http://{$smarty.server.HTTP_HOST}{$smarty.server.HTTP_X_REWRITE_URL}" data-numposts="5" data-colorscheme="light"  data-version="v2.3" data-width="700" ></div>
      
      
          <div class="left other_news"> <span id="">
            <div class="title"> <a><span>Bài viết liên quan</span></a> </div>
            <div class="list">
              <div class="left customParent grid690">
                <ul>
        
          {foreach from=$rows item=row key=k}
            <li>
            <div class="image"><a href="{$url}{$row.link}-{$row.id}.html" title="{$row.title}"><img src="{$url}upload/news/thumb2/{$row.photo|default:'no-image.jpg'}"></a></div>
            <div class="noidung"><a href="{$url}{$row.link}-{$row.id}.html" title="{$row.title}" >{$row.title}</a><span>{$row.description|truncate:220}</span></div>
            </li>
                    {foreachelse}
                      <em>Chưa có bài viết nào</em>
          {/foreach}
        
                </ul>
              </div>
              
            </div>
            </span> </div>
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