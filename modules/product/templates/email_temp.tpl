<!-- 
<table class="tbl_giohang" cellpadding="7" cellspacing="0" width="100%">
<tbody>
    <tr class="title_tbl_giohang" style="font-weight:bold;">
        <td width="35%">Tên sản phẩm</td>
        <td width="20%">Đơn giá (VNĐ)</td>
        <td width="10%">Số lượng</td>
        <td colspan="2" width="40%" align="center">Thành tiền (VNĐ)</td>
    </tr>
    {assign var=sum value=0}
    {foreach from=$list key=k item=row}
    {assign var=sum value=$sum+$row.quantity*$row.price}
    <tr>
        <td><span class="red bold">{$row.title}</span></td>
        <td>{$row.price_text|number_format:0:',':'.'} VNĐ</td>
        <td>
        	{$row.quantity}
        </td>
        <td align="center">{($row.quantity*$row.price)|number_format:0:',':'.'} VNĐ</td>
    </tr>
    {/foreach}
</tbody>
</table>
<div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;">{$sum|number_format:0:',':'.'} VNĐ.</span></div> -->
<table class="tbl_showList" cellpadding="7" cellspacing="0" width="100%">
    <tr>
        <td>STT</td>
        <td>Mã Hàng</td>
        <td>Tên sản phẩm</td>
        <td>Thông tin phụ</td>
        <td>Giá gốc</td>
        <td>Giảm giá(%)</td>
        <td>Giá bán</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
    </tr>
    {assign var=sum value=0}
    {foreach from=$list item=row key=k}
    {assign var=sum value=$sum+($row.price*$row.quantity)}
    <tr>
        <td>{$k+1}</td>
        <td>{$row.code}</td>
        <td><span class="green bold f14">{$row.title}</span></td>
        <td>
            {if $row.color_name!=''}
            <div style="margin-bottom:5px">
                Màu sắc: <span title="{$row.color_name}" style="width:20px;height:20px;display:inline-block"><span style="background:{$row.color_code};display:inline-block;width:20px;height:20px"></span></span> ({$row.color_name})
            </div>
            {/if}
            {if $row.size!=''}
            <div>
                Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;">{$row.size}</span>
            </div>
            {/if}
        </td>
        <td>
            <!--<strike>{$row.price|number_format:0:',':'.'}</strike> VNĐ-->
            <!--<div>{($row.price-($row.price*$row.discount*0.01))|number_format:0:',':'.'} VNĐ</div>-->
            <div>{($row.price_goc)|number_format:0:',':'.'} VNĐ</div>
        </td>
        <td>
            {if $row.is_timegold==1}
                <span style="color:#f00;">Giờ vàng : </span>
            {/if}
            {$row.discount}%
        </td>
        <td><div>{($row.price)|number_format:0:',':'.'} VNĐ</div></td>
        <td>{$row.quantity}</td>
        <td class="red">{($row.quantity*$row.price)|number_format:0:',':'.'} VNĐ</td>
    </tr>
    {/foreach}
</table>
<div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;">{$sum|number_format:0:',':'.'} VNĐ.</span></div>