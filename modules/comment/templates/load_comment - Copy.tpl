<style type="text/css">
.input_block {
	display:block;
	width:98.8%;
	margin-bottom:10px;
	padding:4px;
	border-radius:4px;
	border:1px solid #ccc;
}
.tbl-comment {
	border-bottom:1px dotted #ccc;
	padding:4px 0;
	width:100%;
}
.tbl-comment img {
	padding:4px;
	border:1px solid #ccc;
	width:74px;
	height:74px;
	margin-right:4px;
}
.tbl-comment strong {

}
.btn_reply {
	position:absolute;
	bottom:0;
	right:0;
}
.thongtin-cm {
	margin-top:4px;
	position:relative;
	font-size:14px;
}
.tbl-comment rep {
	font-style:italic;
	margin-right:10px;
	color:#666;
}
</style>
<script type="text/javascript">
$(function(){
	$('.btn_reply').css("cursor", "pointer");
	$('.btn_reply').click(function(){
		if($(this).closest('.thongtin-cm').next().css('display')=='none') {
			$('.showHang').slideUp(300);
			$(this).closest('.thongtin-cm').next().slideDown(300);
		} else {
			$(this).closest('.thongtin-cm').next().slideUp(300);
		}
	});
	$('form[name="comment"]').submit(function(){
		_name = $(this).find('[name="name"]');
		_email = $(this).find('[name="email"]');
		_content = $(this).find('[name="content"]');
		_captcha = $(this).find('[name="captcha_c"]');
		
		
		if(
			!validInputText(_name, "Bạn chưa nhập tên") ||
			!validInputText(_content, "Bạn chưa nhập nội dung") ||
			!validInputText(_captcha, "Bạn chưa nhập mã bảo mật") ) {
			return false;
		} else {
			$.post(url+"?ajax=true&mod=comment&task=load_comment", $(this).serialize(), function(data){
				val = data.split("|");
				alert(val[1]);
				if(val[0]=="true") {
					location.reload(true);
				}
			});
		}
		return false;
	});
	
	$('.order_link').click(function(){
		$(this).css('font-weight', 'bold');
		val = $(this).attr('value');
		$.get(url+"?ajax=true&mod=comment&task=load_comment&order_by="+val+"&link={$smarty.get.link}", function(data){
			$('#nhanxet').html(data);
			
		});	
		return false;
	});
});
function validInputText(obj, txt) {
	if(obj.val().length==0) {
		alert(txt);
		obj.focus();
		return false;
	} else {
		return true;
	}
}
</script>

<div style="color:#003399;font-size: 18px; margin-bottom:10px; background:#EEEEEE; padding:6px 10px;">
	Nhận xét ({$count_comment})
    <div style="float:right; display:none;"><a href="#" value="new" class="order_link" {if $smarty.get.order_by==new} style="font-weight:bold;"{/if}>Mới nhất</a>&nbsp;<a href="#" class="order_link" value="count" {if $smarty.get.order_by==count || $smarty.get.order_by==''} style="font-weight:bold;"{/if}>Quan tâm nhất</a></div>
    <div style="clear:both;"></div>
</div>


{foreach from=$comment item=cmt key=k}
<div {if ($k+1)%2==0}style="background:#F8F8F8;" {/if}>
    <table class="tbl-comment" id="comment_{$cmt.id}">
        <tr>
            <td valign="top">
                <div>
                    {$cmt.content}
                </div>
                <div class="thongtin-cm">
                    <strong>{$cmt.name}</strong>
                    <span class="float-right" style="display:none">Vào lúc: {$cmt.create_date|date_format:"%d/%m/%Y %H:%m:%S"}</span>
                    <div class="btn_reply">&#8592;Trả lời</div>
                    <div class="clear"></div>
                </div>
                <div style="margin-top:12px; margin-left:48px; display:none;" class="showHang">
                    <form name="comment" action="" method="post">
                        <input type="hidden" name="product_id" value="{$row.id}"/>
                        <input type="hidden" name="product_title" value="{$row.title}"/>
                        <input type="hidden" name="type" value="{$smarty.get.mod}"/>
                        <input type="hidden" name="link" value="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
                        <input type="hidden" name="parent_id" value="{$cmt.id}" />
                        <input type="text" name="name" value="" placeholder="Tên của bạn" class="input_block" />
                        <input type="text" name="email" value="" placeholder="Email hoặc số điện thoại" class="input_block" />
                        <textarea name="content" style="width:98.8%; height:50px;border:1px solid #ccc;
    border-radius:4px; padding:4px; margin-bottom:4px" placeholder="Ý kiến của bạn"></textarea>
                        <div style="float:right;">
                            <b>Mã bảo mật: {$smarty.session.captcha_a}+{$smarty.session.captcha_b} =</b>	
                            <input type="text" name="captcha_c" value="" style="border:1px solid #ccc;
    border-radius:4px; padding:4px;	width:30px;"/> 
                            <button type="submit" class="btn">Gửi</button>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
                {if $cmt.sub}
                    {foreach from=$cmt.sub item=cm}
                        <table class="tbl-comment" id="comment_{$cm.id}" style="border:none; margin-left:48px;width:94.5%; border-top:1px dotted #E2E2E3; margin-top:10px;">
                            <tr>
                                <td valign="top">
                                    <div>
                                    {$cm.content}
                                    </div>
                                    <div class="thongtin-cm">
                                        <strong>{$cm.name}</strong>
                                        <span class="float-right" style="display:none">Vào lúc: {$cm.create_date|date_format:"%d/%m/%Y %H:%M:%S"}</span>
                                        <div class="btn_reply">&#8592;Trả lời</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div style="margin-top:12px; display:none;" class="showHang">
                                        <form name="comment" action="" method="post">
                                            <input type="hidden" name="product_id" value="{$row.id}"/>
                                            <input type="hidden" name="product_title" value="{$row.title}"/>
                                            <input type="hidden" name="type" value="{$smarty.get.mod}"/>
                                            <input type="hidden" name="link" value="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
                                            <input type="hidden" name="parent_id" value="{$cmt.id}" />
                                            <input type="hidden" name="reply_to_name" value="{$cm.name}" />
                                            <input type="text" name="name" value="" placeholder="Tên của bạn" class="input_block" />
                                            <input type="text" name="email" value="" placeholder="Email hoặc số điện thoại" class="input_block" />
                                            <textarea name="content" style="width:98.8%; height:50px;border:1px solid #ccc;
                        border-radius:4px; padding:4px; margin-bottom:4px" placeholder="Ý kiến của bạn"></textarea>
                                            <div style="float:right;">
                                                <b>Mã bảo mật: {$smarty.session.captcha_a}+{$smarty.session.captcha_b} =</b>	
                                                <input type="text" name="captcha_c" value="" style="border:1px solid #ccc;
                        border-radius:4px; padding:4px;	width:30px;"/> 
                                                <button type="submit" class="btn">Gửi</button>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    {/foreach} 
                {/if}
                
            </td>
        </tr>
    </table>
</div>
{/foreach}

<div style="margin-top:10px; padding-top:10px;">
	<p><a onclick="$('.showHang').slideUp(300); $(this).parent().next().slideDown(300); return false;" style="font-size:16px;" href="#">Nhập nhận xét của bạn</a></p>
    <div class="showHang">
        <form name="comment" action="" method="post">
            <input type="hidden" name="product_id" value="{$row.id}"/>
            <input type="hidden" name="product_title" value="{$row.title}"/>
            <input type="hidden" name="type" value="{$smarty.get.mod}"/>
            <input type="hidden" name="link" value="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}"/>
            <input type="hidden" name="parent_id" value="0" />
            <input type="text" name="name" value="" placeholder="Tên của bạn" class="input_block" />
            <input type="text" name="email" value="" placeholder="Email hoặc số điện thoại" class="input_block" />
            <textarea name="content" style="width:98.8%; height:50px;border:1px solid #ccc;
    border-radius:4px; padding:4px; margin-bottom:4px" placeholder="Ý kiến của bạn"></textarea>
            <div style="float:right;">
                <b>Mã bảo mật: {$smarty.session.captcha_a}+{$smarty.session.captcha_b} =</b>	
                <input type="text" name="captcha_c" value="" style="border:1px solid #ccc;
    border-radius:4px; padding:4px;	width:30px;"/> 
                <button type="submit" class="btn">Gửi</button>
            </div>
            <div style="clear:both;"></div>
        </form>
    </div>
</div>