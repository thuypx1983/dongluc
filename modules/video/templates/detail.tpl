<div class="grid1060">
    <div class="content_cate pkg">

        <div class="col70per fr">
            <!-- <a href="{$url}dich-vu/" class="head_title">Dịch vụ</a> -->

            <div class="breadcumb_product pkg">
                <div class="fl">
                    <a href="{$url}dich-vu/" class="first_bread">
                        Dịch vụ{if count($bread)>0}<span class="arr_bread"><img src="{$url}images/arr_brad.png"/></span>{/if}
                    </a>
                    {foreach from=$bread item=bre key=k}
                        <a href="{$url}{if $bre.pre_link}{$bre.pre_link}-{$bre.id}/{/if}">{$bre.title}</a>
                        {if count($bread)>($k+1)}<span class="arr_bread"><img src="{$url}images/arr_brad.png"/></span>{/if}

                    {/foreach}
                </div>
            </div>

            <div class="inner-post-wrapper" style="margin-top:20px">
                <div class="detail-blog-post">
                    <div class="postWrapper">
                        <div class="postTitle">
                            <h2>{$row.title}</h2>
                            <h3>{$row.create_date}</h3>
                            <div class="social-box">
                                <div class="btn-google-plus">
                                    <!-- Place this tag where you want the +1 button to render. -->
                                    <div class="g-plusone" data-annotation="inline" data-width="45"></div>
                                </div>
                                <div class="btn-facebook">
                                    <div class="fb-like" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                                </div>
                            </div>
                        </div>
                        <div class="postContent">
                            {$row.content}
                        </div>
                        <div class="social-box social-after-content">
                            <div class="btn-google-plus">
                                <!-- Place this tag where you want the +1 button to render. -->
                                <div class="g-plusone" data-annotation="inline" data-width="45"></div>
                            </div>
                            <div class="btn-facebook">
                                <div class="fb-like" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                            </div>
                        </div>

                        <div class="external-comment">
                            <div class="fb-comments" data-width="100%" data-numposts="5"></div>
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
                                        <a href="{$url}{$row.pre_link}-{$row.id}.html"><img src="{$url}upload/news/thumb/{$row.photo|default:'no-img.jpg'}" style="width:100%;"></a>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="product-name">
                                            <h2><a class="title-blog-name" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a></h2>
                                            <!--<h3>3/6/2014 12:58 AM</h3>-->
                                            <div class="info-cat-blog"> {$row.create_date} </div>
                                            <p class="desc_just">{$row.description|truncate:400}</p>
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
            {loadModule mod=news task=category}
            {loadModule mod=news task=list_top}
            {*loadModule mod=product task=list_top*}
            {loadModule mod=ads task=banner_sidebar}
        </div>

    </div>
</div>