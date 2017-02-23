<div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr"> <a href="{$url}dich-vu/" class="head_title">Dịch vụ trên {$alias}</a>
        <ol id="blog-list" class="products-list">
            {foreach from=$rows item=row key=k}
                <li class="postWrapper item">
                    <div class="item-inner">
                      <div class="product-info row">
                        <div class="col-lg-3" style="padding-left:0"> <a href="{$url}{$row.pre_link}-{$row.id}.html"><img src="{$url}upload/news/thumb/{$row.photo|default:'no-img.jpg'}" style="width:100%;"></a> </div>
                        <div class="col-lg-9">
                          <div class="product-name">
                            <h2><a class="title-blog-name" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a></h2>
                            <!-- <h3>3/6/2014 12:58 AM</h3> -->
                            <div class="info-cat-blog">{$row.create_date}</div>
                            <p>{$row.description}</p>
                          </div>
                        </div>
                        <div class="clear"></div>
                        {if ($k+1) < count($rows)}
                        <div class="postContent ">
                          <div class="bottom-info-blog"> </div>
                        </div>
                        {/if}
                      </div>
                    </div>
                  </li>
            {foreachelse}
                <div style="margin-left:0px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            {/foreach}
          
        </ol>
        <div class="paging">
            {$paging}
        </div>
      </div>
      <div class="col30per fl">
        {loadModule mod=news task=list_top}
        {loadModule mod=product task=list_top}
        {loadModule mod=ads task=banner_sidebar}

      </div>
    </div>
  </div>