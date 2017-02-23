

<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col30per fl collog"> <a href="" class="head_title">Chức năng</a>
			<div><a href="{$url}don-hang.html" class="f16gray user_mod {if $smarty.get.task==history}active{/if}">Đơn hàng của tôi</a></div>
			<div><a href="{$url}thong-tin-ca-nhan.html" class="f16gray user_mod {if $smarty.get.task==update_profile}active{/if}">Thông tin cá nhân</a></div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Đơn hàng của tôi</a>
          <!--<div class="f16gray">Cập nhật thông tin tài khoản theo mẫu dưới đây</div>-->
		  {foreach from=$orders item=order key=i}
		  <div class="total_order" style="margin-bottom:20px">
            <div class="head_total_order">
				Đơn hàng<span>({count($order.sub)} sản phẩm)</span>
				<span>({$order.create_date})</span>
				<span>{if $order.is_process==0}Đang xử lý đơn hàng...{else}<font color="red">Đã xử lý</font>{/if}</span>
				<span style="float:right">#{$i+1}</span>
				{if $order.cust_note!=''}<div>Ghi chú: <font color="green">{$order.cust_note}</font></div>{/if}
			</div>
            <table class="tbl_total_order" width="100%" cellpadding="0" cellspacing="0">
				{assign var=sum value=0}
				{foreach from=$order.sub key=k item=row}
				{assign var=sum value=$sum+$row.quantity*$row.price}
				  <tr>
					<td>{$row.quantity}x</td>
					<td>
                        <div style="margin-bottom:2px;font-size:16px">{$row.title}</div>
                        {if $row.color_name!=''}
                        <div style="margin-bottom:2px;font-size:12px">
                            Màu sắc: <span title="{$row.color_name}" style="border:1px solid #e9e9e9;width:20px;height:20px;display:inline-block;padding:2px"><span style="background:{$row.color_code};display:inline-block;width:100%;height:100%"></span></span> ({$row.color_name})
                        </div>
                        {/if}
                        {if $row.size!=''}
                        <div style="font-size:12px">
                            Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;font-size:11px">{$row.size}</span>
                        </div>
                        {/if}
                    </td>
					<td align="right" valign="top">{($row.quantity*$row.price)|number_format:0:',':'.'} vnđ</td>
				  </tr>
			  {/foreach}
            </table>
            <div class="total_price pkg"> <span class="fl">Tổng cộng</span><span class="fr">{$sum|number_format:0:',':'.'} vnđ</span> </div>
          </div>
		  {foreachelse}
			<div style="margin-left:0px; padding:10px 0 20px;">
				<em><p>Chưa có đơn hàng nào</p></em>
			</div>
		  {/foreach}
		  
        </div>
      </div>
    </div>
  </div>



