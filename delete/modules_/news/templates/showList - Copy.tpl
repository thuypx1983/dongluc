<div class="grid1060">
    <div class="breadcumb"><a href="{$url}{$smarty.get.menu_type}/">{$row_title}</a><a href="{$url}{$smarty.get.menu_type}/{$smarty.get.cate}-{$smarty.get.id}/" class="active">{$row_title_sub}</a></div>
    <div class="maincontent">
      <div class="vanhoa" id="vanhoa">
        <div class="list_cate col690">
        
          {foreach from=$rows item=row}
              <div class="left grid690">
                  <span id="">
                    <div class="top pkg"><a href="{$url}{$row.link}-{$row.id}.html" ><img src="{$url}upload/news/thumb/{$row.photo|default:'no-image.jpg'}"></a>
                      <div class="noidung">
                        <p class="title_sub"><a href="{$url}{$row.link}-{$row.id}.html">{$row.title}</a></p>
                        <div class="description">{$row.description|truncate:350}</div>
                        <span class="binhluan"><a href="{$url}{$row.link}-{$row.id}.html" style="font-size:11px;">Chi tiết</a></span></div>
                    </div>
                    </span>
                </div>
          {/foreach}
          <div class="pkg"> </div>
          <!--<div class="paging "><a href="" class="current">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a></div>-->
          <style>
      .span_select_class {
        border: 1px solid #cc0000;
        color: #cc0000 !important;
        font-weight:normal !important;
        padding: 5px 12px;
        font-size:16px;
        margin-left:7px;
      }
      }
          </style>
          <div class="paging">
            {$paging}
          </div>
        </div>
        {loadModule mod=box_right}
      </div>
      <div class="doisong" id="doisong">
        <p class="clear"> </p>
      </div>
      <p class="clear"> </p>
    </div>
  </div>