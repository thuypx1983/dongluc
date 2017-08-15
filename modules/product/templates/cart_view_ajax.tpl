<div class="max_width">
    <table class="tbl_cart" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <th></th>
      <th>Sản phẩm</th>
      <th>Giá</th>
      <th>Số lượng</th>
      <th>Tổng cộng</th>
    </tr>
    {assign var=sum value=0}
    {foreach from=$smarty.session.cart key=k item=row}
    {assign var=sum value=$sum+$row.quantity*$row.price}
    <tr>
      <td><a href="" onclick="cart_del({$row.id});return false;"><img src="{$url}images/icon_delete.png"/> </a></td>
      <td><table>
          <tr>
            <td><a href="{$row.link}"><img src="{$url}upload/product/thumb/{$row.photo}" height="140"/> </a></td>
            <td style="text-align:left;padding-left:10px">
              <div class="item_info_product">
                <a href="{$row.link}" target="_self">{$row.title}</a>
                {if $row.color_name!=''}
                <div class="filter_color">
                    <em>Màu sắc: {$row.color_name}</em>
                      <a href="" value="{$row.color_code}" title="{$row.title}" style="width:33%;height:33px" class="active"><span style="background:{$row.color_code}"></span></a>
                  </div>
                {/if}
                {if $row.size!=''}
                  <div class="list_size">
                    <em>Kích cỡ: {$row.size}</em>
                    <a href="" class="active" title="{$row.size}">{$row.size}</a>
                  </div>
                {/if}
                </div>
            </td>
          </tr>
        </table></td>
      <td>{$row.price_text|number_format:0:',':'.'} vnđ</td>
      <td>
          <input type="text" name="quantity[]" value="{$row.quantity}" class="txt_faq" style="width:50px;text-align:center">
          <input type="hidden" name="id[]" value="{$row.id}" />
      </td>
      <td><span class="f18red">{($row.quantity*$row.price)|number_format:0:',':'.'} vnđ</span></td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="5"><em>Chưa có sản phẩm nào</em></td>
    </tr>
    {/foreach}
  </table>
</div>
  
  <div class="update_cart">
    
    <button type="submit" class="btn_update_cart">Cập nhật đơn hàng</button>
	{if $smarty.session.cart}
    <a href="{$url}thanh-toan.html" class="btn_buy_cart">Thanh toán</a>
	{/if}
  </div>
  <div class="total_cart">Tổng đơn hàng: <span>{$sum|number_format:0:',':'.'} vnđ</span></div>
