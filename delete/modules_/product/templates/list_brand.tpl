<div class="right_wrapper">
    <div class="right_inner">
        <div class="row-fluid">
            <div class="span12">
            	<div class="titlebar">
					<h1 class="titlebar" style="padding:0px; margin:0px">Thương hiệu</h1>
		        </div>
                <!-- Brand logo -->
                <img src="{$url}images/brands.png" alt="Brands" style="width:760px;">
                <!-- Intro text -->
                <p>Khởi nghiệp từ New Bond street - một trong những con phố mua sắm hấp dẫn nhất trên thế giới, Frost of London là thách thức lớn với những nhà cung cấp đồng hồ và trang sức tên tuổi từ trước đến nay. Phương châm của chúng tôi là sưu tập phiên bản giới hạn và những mẫu thiết kế được yêu thích nhất từ các thương hiệu đồng hồ, trang sức và điện thoại đình đám như Shamballa, Corum, Perrelet, Jason of Beverly Hills, Jacob &amp; Co, U-Boat, Vertu, Goldvish …
                </p> 
                <p>Tại Frost of London, Sofitel Plaza Hà Nội, chúng tôi cung cấp 12 thương hiệu đồng hồ xa xỉ bao gồm Arnold &amp; Son, Bedat &amp; Co, Chronoswiss, Corum, Jacob &amp; Co, U-boat, Graham, B.R.M, Perrelet, Snyper, Cvstos và Maitres Du Temps; 5 thương hiệu trang sức nổi tiếng Shamballa, Theo Fennel, Mesika, Jacob &amp; Co, Frost và thương hiệu kính mắt sang trọng Chrome Hearts.
                </p> 
                <p>Kính mời quý khách click vào các thương hiệu dưới đây để xem sản phẩm hiện có tại boutique Frost of London, Sofitel Plaza Hà Nội. Các nhân viên chuyên nghiệp của chúng tôi rất sẵn lòng được tư vấn cho quý khách hàng quan tâm, hãy liên lạc với Frost bằng đường dây nóng <span style="color:#A99160">+844 23 23 4567</span> hoặc để lại thông tin liên lạc cho chúng tôi 
                    <a href="{$url}dang-ky-nhan-email/">tại đây</a>. 
                    Đặc biệt mong được đón tiếp quý khách tại showroom được bài trí trong không gian sang trọng của chúng tôi để tận mắt xem và thử các sản phẩm độc đáo. Chúng tôi sẵn sàng mở cửa  với thời gian linh động hoặc cung cấp những dịch vụ thuận tiện nhất cho quý khách, bao gồm tư vấn tại nhà và khách sạn.
                </p>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="manufacturer-grid">
            	{foreach from=$rows item=row key=k}
                <div class="manufacturer-item">
                    <div class="picture">
                        <a href="{$url}{$row.link}-{$row.id}/">
                            <img src="{$url}upload/brand/{$row.photo}" alt="{$row.title}" style="border-width: 0px; height:88px !important" title="{$row.title}" height="88"></a>
                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>