<div class="grid1060">
    <div class="content_cate pkg">
      
      <div class="col70per fr"> <a href="{$url}gioi-thieu/" class="head_title">Giới thiệu về {$alias}</a>
        <div class="inner-post-wrapper">
          <div class="detail-blog-post">
            <div class="postWrapper">
              <div class="postTitle">
                <h2>{$row.title}</h2>
                <h3>{$row.create_date}</h3>
              </div>
              <div class="postContent">

                  {$row.content}
              </div>
              
            </div>
          </div>
          
        </div>
        {if $rows}
        <a href="" class="head_title">Bài viết khác</a>
        <ol id="blog-list" class="products-list">


          {foreach from=$rows item=row key=k}
          <li class="postWrapper item">
            <div class="item-inner">
              <div class="product-info row">
                <div class="col-lg-3" style="padding-left:0">
                    <a href="{$url}{$row.pre_link}-{$row.id}.html"><img src="{$url}upload/about/thumb/{$row.photo|default:'no-img.jpg'}" style="width:100%;"></a>
                </div>
                <div class="col-lg-9">
                  <div class="product-name">
                    <h2><a class="title-blog-name" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a></h2>
                    <!--<h3>3/6/2014 12:58 AM</h3>-->
                    <div class="info-cat-blog"> {$row.create_date} </div>
                    <p class="desc_just">{$row.description}</p>
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
           {/foreach}
          
        </ol>
        {/if}
      </div>
      <div class="col30per fl">
        {loadModule mod=ads task=banner_sidebar}
      </div>
    </div>
  </div>