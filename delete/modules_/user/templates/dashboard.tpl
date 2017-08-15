<style type="text/css">
	
	.div_wrapper { padding:10px; }
	.div_left { float:left; width:200px; }
	.div_right { float:right; width:770px; }
	.div { padding:10px; border:1px solid red; margin-bottom:10px; }

</style>

<a href="{$url}?mod=user&task=dashboard" title="" class="a_menu">Dashboard</a>(Bảng quản trị)



<div class="div_wrapper">
	<div class="div_left">
    
    	<div class="div">
        	<h3>Xin chào: {$smarty.session.user.username}</h3> <a href="#">[Sửa thông tin]</a> | <a href="{$url}?mod=user&task=logout" title="">
[Đăng xuất]</a>

		{if $smarty.session.user.utype=='pub+adv'}
        	<p>Tài khoản Advertiser: ${$smarty.session.user.adv_money}</p>
            <p>Tài khoản Publisher: ${$smarty.session.user.pub_money}</p>
        {elseif $smarty.session.user.utype=='adv'}
        	<p>Tài khoản Advertiser: ${$smarty.session.user.adv_money}</p>
        {elseif $smarty.session.user.utype=='pub'}
            <p>Tài khoản Publisher: ${$smarty.session.user.pub_money}</p>
        {/if}
            <p>Có 10 tin chưa đọc</p>
        </div>
        
        <!-- Chuc nang advertiser -->
        
        {if $smarty.session.user.utype=='pub+adv'}
            <!--<div class="div">
                <h3>Chức năng dành cho ADV</h3>
                <a href="{$url}?mod=advertiser" class="a_right_menu">Mua textlink</a><br />
                <a href="{$url}?mod=advertiser&task=textlink_running"  class="a_right_menu">Quản lý textlink</a><br />
                <a href="{$url}?mod=advertiser&bookmark=1" class="a_right_menu">Site được đánh dấu</a><br />
       			<a href="{$url}" class="a_right_menu">Nạp tiền</a><br />
                <a href="{$url}" class="a_right_menu">Chuyển tiền</a><br />
                <a href="{$url}" class="a_right_menu">Lịch sử giao dịch</a><br />
            </div>
            
            
            <div class="div">
                <h3>Chức năng dành cho PUB</h3>
                <a href="{$url}?mod=publisher" class="a_right_menu">Website của bạn</a>
                <a href="{$url}?mod=publisher&task=textlink_on_site" class="a_right_menu">Textlink đang chạy trên site của bạn</a>
                

            </div>-->
            {include file='adv_board.tpl'}
            
            {include file='pub_board.tpl'}
            
		{elseif $smarty.session.user.utype=='adv'}
        
        	{include file='adv_board.tpl'}
            
        {elseif $smarty.session.user.utype=='pub'}
        
        	{include file='pub_board.tpl'}
            
        {/if}
        
        
        
        <!-- Ho tro truc tuyen -->
        <div class="div">
        	<h3>Hỗ trợ trực tuyến</h3>
            -	Điện thoại<br>

            -	Yahoo / Skype<br>
            -	Email<br>


        </div>
        
    </div>
    <div class="div_right">
    	<div class="div">
        	<h3>Thống kê nhanh</h3>
            	Số dư tk ADV<br>
            	Số dư tk PUB<br>
            	Tổng số textlink đang có: <a href="#" title="">
{$count_all}</a><br>
            	Textlink đang chạy : <a href="#" title="">
{$count_running}</a><br>
            	Textlink hết hạn : <a href="#" title="">
{$count_expired}</a><br>
				Textlink bị hủy : <a href="#" title="">
{$count_cancel}</a><br>
				Textlink bị dừng lại : <a href="#" title="">
{$count_stop}</a><br>
            Tin nhắn: show các tin chưa đọc<br>
            -	Bạn có 3 textlink sẽ hết hạn trong 7 ngày<br>

        </div>
        
        {if $smarty.session.user.utype=='pub+adv'}
        	<div class="div">
                <h3>Gợi ý mua textlink: chỉ dành cho ADV</h3>
                1.	Premium sites: <br>
                2.	New sites<br>
                *) site: tên trang, PR, Alexa, TLD, Language, Price<br>
    
            </div>
            
            <div class="div">
                <h3>Add site: chỉ dành cho PUB</h3>
                -	Site name<br>
                -	Site URL<br>
                -	Site category
    <br>
            </div>
            
        {elseif $smarty.session.user.utype=='adv'}
        	<div class="div">
                <h3>Gợi ý mua textlink: chỉ dành cho ADV</h3>
                1.	Premium sites: <br>
                2.	New sites<br>
                *) site: tên trang, PR, Alexa, TLD, Language, Price<br>
    
            </div>

        {elseif $smarty.session.user.utype=='pub'}
        	<div class="div">
                <h3>Add site: chỉ dành cho PUB</h3>
                -	Site name<br>
                -	Site URL<br>
                -	Site category
    <br>
            </div>
        {/if}
        
        
        
        

    </div>
    <div class="clear"></div>
</div>