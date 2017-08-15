<ul class="popular_product">
{foreach from=$rows item=row key=k}
	<li>
		<div class="p-product-wrapper">
			<div class="p-product-img-wrapper">
				<a href="/san-pham/{$row.id}.html">
					<img class="lazyload" data-src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" />
				</a>
			</div>
			<div class="p-product-info">
				<h3 class="p-product-title">
					<a href="/san-pham/{$row.id}.html">{$row.title}</a>
				</h3>
				<div class="p-product-code">
					Mã: {$row.code}
				</div>
				<div class="p-product-price">
					{$row.price_sale|number_format:0:".":","} vnđ
				</div>
			</div>
			
		</div>
	</li>
{/foreach}
</ul>


