
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
<div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;">{$sum|number_format:0:',':'.'} VNĐ.</span></div>