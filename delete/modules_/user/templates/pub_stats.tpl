<div class="box-content">
    <ul class="blocks sub1">
        <li class="icon-pub">Số dư tài khoản Publisher <a href="{$url}?mod=publisher&task=withdraw" class="blue right bold mtext">${$smarty.session.user.pub_money}</a></li>
        <li class="icon-link-run">Tổng số website <a href="{$url}?mod=publisher&task=lists" class="blue right bold">{$row.site}</a></li>
        <li class="icon-link-end">Tổng số textlink trên website <a href="{$url}?mod=publisher&task=textlink_running" class="blue right bold">{$row.textlink_on_site}</a></li>
    </ul> 
    </div><!-- end box-content -->