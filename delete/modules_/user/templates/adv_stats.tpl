<div class="box-content">
    <ul class="blocks sub1">
        <li class="icon-pub">Số dư tài khoản Advertiser <a href="{$url}?mod=advertiser&task=income_money" class="blue right bold mtext">${$smarty.session.user.adv_money}</a></li>
        <li class="icon-link-run">Textlink đang chạy <a href="{$url}?mod=advertiser&task=textlink_running" class="blue right bold">{$row.textlink_running}</a></li>
        <li class="icon-link-end">Textlink đã hết hạn: <a href="{$url}?mod=advertiser&task=textlink_expired" class="blue right bold">
        {$row.textlink_expired}</a></li>
    </ul> 
    </div><!-- end box-content -->