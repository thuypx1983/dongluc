<style>
.this-box-article:hover {
	overflow:scroll;
	overflow-y: scroll;
	overflow-x: hidden;
}
.box-comment { font-size:13px; }
.box-comment a { color:#0099cc; }
.box-comment h4 { font-weight:normal; font-size:18px !important; }
.box-comment p { margin-bottom:5px; line-height:18px; }
.box-comment strong { font-size:13px; } .col-comment a { color:#0099cc; }
.box-comment ul { margin:10px 0; padding:0; list-style:none; }
.box-comment ul li { padding:0 5px 10px 25px; margin-bottom:10px; border-bottom:#ebebeb 1px solid; background:url({$url}images/bg_li.png) 0 -107px no-repeat; }
.box-comment ul li:hover { background-position: 0 5px; }

</style>
{if $rows}
<ul class="box-article this-box-article box-comment">
    <h4>Bình luận mới nhất</h4>
     {foreach from=$rows item=row} 
        <li>
            <p><strong>Đăng bởi:</strong> <a href="http://{$row.link}">{$row.name}</a> {$row.create_date}</p>
            {$row.content} - <a href="http://{$row.link}" style="color:#C30">{$row.product_title}</a>
        </li>
    {/foreach} 
</ul>
{/if}