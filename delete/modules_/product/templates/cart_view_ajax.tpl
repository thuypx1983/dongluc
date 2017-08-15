<table class="tbl_giohang" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr class="title_tbl_giohang">
            <td width="35%">Tên sản phẩm</td>
            <td width="20%">Đơn giá (VNĐ)</td>
            <td width="10%">Số lượng</td>
            <td colspan="2" width="40%" align="center">Thành tiền (VNĐ)</td>
        </tr>
        {assign var=sum value=0}
        {foreach from=$smarty.session.cart key=k item=row}
        {assign var=sum value=$sum+$row.quantity*$row.price}
        <tr>
            <td>
                <strong><a href="{$row.link}" target="_blank">{$row.title}</a></strong><a href="#" class="hung_del" onclick="cart_del({$row.id}); return false;">[Hủy]</a>
            </td>
            <td>{$row.price_text|number_format:0:',':'.'} VNĐ</td>
            <td>
            	<input type="text" name="quantity[]" value="{$row.quantity}" class="input_soluong" style="width:50px">
                <input type="hidden" name="id[]" value="{$row.id}" />
            </td>
            <td align="center">{($row.quantity*$row.price)|number_format:0:',':'.'} VNĐ</td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="5"><em>Chưa có sản phẩm nào</em></td>
        </tr>
        {/foreach}
        <tr>
        	<td colspan="2">
            	<style>
                .hung_del { color:#F06; margin-left:6px; }
                .hung_padding_button { padding:6px 15px; margin: 0 4px; }
                </style>
                <input type="submit" value="Cập nhật" class="btn_succes hung_padding_button">
                <input type="button" value="Hủy đơn hàng" class="btn_succes btn_clean hung_padding_button" onclick="cart_clear()" >
            </td>
            <td colspan="3" align="right">
                
                <strong>Thành tiền (VNĐ) :</strong>
                <strong style="font-size:14px;color:#F03">{$sum|number_format:0:',':'.'} VNĐ</strong>
            </td>
        </tr>
    </tbody>
    </table>