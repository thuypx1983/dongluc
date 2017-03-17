<ul class="popular_product">
{foreach from=$rows item=row key=k}
	<li>
		<div class="p-product-wrapper">
			<div class="p-product-img-wrapper">
				<a href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}">
					<img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" />
				</a>
			</div>
			<div class="p-product-info">
				<div class="p-product-title">
					<a href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}">{$row.title}</a>
				</div>
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


