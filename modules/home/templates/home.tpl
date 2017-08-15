<!-- <div class="grid1060"> -->
{loadModule mod=ads task=home}
<div class="news-highlight">
    {loadModule mod=news task=highlight_left}
    {loadModule mod=news task=highlight_right}
    {loadModule mod=ads task=banner_highlight_left}
</div>
<div class="videos">
    <div class="block-title">
        <h2><span>Video</span></h2>
    </div>
    {loadModule mod=ads task=video}
</div>
<div class="news-category">
    {loadModule mod=ads task=homecategory}
	{loadModule mod=news task=news_block_sport}
</div>


<div class="news-service">
    <div class="block-title">
        <h2><span>Dịch vụ</span></h2>
    </div>
    {loadModule mod=news task=news_service}
</div>

<div class="popular-product">
	<div class="block-title">
        <h2><span>Sản phẩm nổi bật</span></h2>
    </div>
{loadModule mod=product task=list_top_home}
</div>
<div class="partner">
    <div class="block-title">
        <h2><span>Đối tác</span></h2>
    </div>
    {loadModule mod=ads task=partner}
</div>