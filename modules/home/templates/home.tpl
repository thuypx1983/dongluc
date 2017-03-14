<!-- <div class="grid1060"> -->
{loadModule mod=ads task=home}
<div class="news-highlight">
    {loadModule mod=news task=highlight_left}
    {loadModule mod=news task=highlight_right}
</div>
<div class="news-category">
    {loadModule mod=news task=news_block_sport}
    <!--{loadModule mod=product task=slider_left}-->
    {loadModule mod=ads task=homecategory}
</div>


<div class="videos">
    <div class="block-title">
        <span>Video</span>
    </div>
    {loadModule mod=ads task=video}
</div>
<div class="news-service">
    <div class="block-title">
        <span>Dịch vụ</span>
    </div>
    {loadModule mod=news task=news_service}
</div>

<div class="grid1060">
{loadModule mod=product task=list_top_home}
</div>
<div class="partner">
    <div class="block-title">
        <span>Đối tác</span>
    </div>
    {loadModule mod=ads task=partner}
</div>