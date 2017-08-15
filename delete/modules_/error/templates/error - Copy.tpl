<div class="right_wrapper" style="padding-bottom:200px;">
    <div class="row-fluid">
        <div class="span12">
            <h1>Ooops!</h1>
            <div class="newsitems">
				<div style="text-align:center;"><img src="{$url}images/404error.png"></div>
                <div class="item">
                    <h2><a>Nội dung không tìm thấy!</a></h2>

                    <p class="newsdate"></p>
                    <div class="newsdetails" style="font-size:1.1em;line-heigh:150%;margin-right:80px;">
                        Xin lỗi,nội dung bạn đang tìm kiếm hiện tại không tìm thấy. Hãy quay về trang chủ, <a href="{$url}">tại đây</a> hoặc các chuyên mục khác để tìm thấy nội dung của mình,hoặc bạn có thể liên hệ với chúng tôi để được trợ giúp thông qua Hotline {#vn_phone_contact#}.
						<br>
						<h3>Có thể bạn quan tâm</h3>
						<ul style="list-style:none; padding-left:0; margin-left:0;">
							<li><a href="{$url}">» Trang chủ</a></li>
							<li><a href="{$url}thuong-hieu/">» Thương hiệu</a></li>
							{foreach from=$rows item=row key=k}
								<li><a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.link}-{$row.id}/{/if}">» {$row.title}</a></li>
                            {/foreach}
							<li><a href="{$url}lien-he-bao-chi/">» Văn phòng báo chí của Frost of London</a></li>
							<li><a href="{$url}sitemap.html" target="_blank" title="Sitemap">» Sitemap</a></li>
						</ul>

						<br><br>
						Trân trọng!!!
					</div>
				</div>
			</div>
        </div>
    </div>
</div>