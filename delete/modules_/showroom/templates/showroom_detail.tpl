<div class="grid1060">
  <div class="content_cate"> <a href="{$url}showroom/" class="head_title">Showroom {$region.title}</a>
      <div class="pkg">
          <div class="info_showroom fl info_company" style="margin-left:0">
           
            <ul>
              <li><a href="" class="f26">{$row.title}</a></li>
              <li class="address">{$row.title}</li>
              <li class="email">Email: {$row.email}</li>
              <li class="phone">Hotline: {$row.hotline}</li>
            </ul>
          </div>

          <div style="margin-left:0px; padding:10px 0 20px;">
              {$row.content}
          </div>
       
      </div>
    </div>
    <div class="content_cate"> <a href="{$url}showroom/" class="head_title">Showroom khác</a>
      <div class="pkg">
        {foreach from=$rows item=row}
        <div class="box_showroom pkg">

          <div class="img_showroom fl"> <a href="{$url}{$row.pre_link}-{$row.id}.html"><img  src="{$url}upload/showroom/thumb/{$row.thumb}" style="max-width:100%"/> </a></div>
          <div class="info_showroom fl info_company">
           
            <ul>
              <li><a href="{$url}{$row.pre_link}-{$row.id}.html" class="f26">{$row.title}</a></li>
              <li class="address">{$row.title}</li>
              <li class="email">Email: {$row.email}</li>
              <li class="phone">Hotline: {$row.hotline}</li>
            </ul>
          </div>
           </div>
        {foreachelse}
            <div style="margin-left:0px; padding:10px 0 20px;">
                <em><p>Chưa cập nhật nội dung</p></em>
            </div>
        {/foreach}
      </div>
    </div>
  </div>