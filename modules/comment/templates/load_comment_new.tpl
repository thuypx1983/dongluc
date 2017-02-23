{if $rows}

<div class="col-comment">

<h4>bình luận mới</h4>

    <ul>

        {foreach from=$rows item=row} 

            <li>

            	<p><strong>Đăng bởi:</strong> <a href="http://{$row.link}">{$row.name}</a> {$row.create_date}</p>

            	{$row.content} - <a href="http://{$row.link}" style="color:#C30">{$row.product_title}</a>

            </li>

        {/foreach} 

    </ul>

</div>

{/if}