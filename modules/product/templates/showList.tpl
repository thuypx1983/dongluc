
<div class="grid1060">
    <div class="content_cate pkg">

        <div class="col700 fr">
        <div class="breadcumb_product pkg">
          <div class="fl">
            {foreach from=$bread item=bre key=k}
            <a href="{$url}{if $bre.link}{$bre.link}-{$bre.id}/{/if}" {if 1==($k+1)} class="first_bread" {/if}>{$bre.title}</a>
            {if count($bread)>($k+1)}<span class="arr_bread"><img src="{$url}images/arr_brad.png"/></span>{/if}
			{foreachelse}
				<a href="" class="first_bread">
				{if $smarty.get.keyword!=''}
					Kết quả tìm kiếm cho "{$smarty.get.keyword}"
				{else}
					Sản phẩm
				{/if}
				</a>
            {/foreach}
            </div>
          <div class="fr slt_option"><span>SẮP XẾP THEO: </span>
            <select class="slt_filter" id="slt_filter" name="sort">
              <option value="new" {if $smarty.get.sort=='new'}selected{/if}>Mới nhất</option>
              <option value="old" {if $smarty.get.sort=='old'}selected{/if}>Cũ nhất</option>
              <option value="pdesc" {if $smarty.get.sort=='pdesc'}selected{/if}>Giá giảm dần</option>
              <option value="pasc" {if $smarty.get.sort=='pasc'}selected{/if}>Giá tăng dần</option>
            </select>
          </div>
        </div>
        <ul class="list_product_cate pkg">
            {foreach from=$rows item=row key=k}
              <li>
                <div class="box_product"><a class="img_product" href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}"><img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" /><span class="view_more">chi tiết</span><span class="price_item">{$row.price_sale|number_format:0:".":","} vnđ</span></a>
                  <div class="price_product"> <a href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}" class="name_product">{$row.title}</a>
                    <div class="code_prodcut">Mã: {$row.code}</div>
                  </div>
                </div>
              </li>
            {foreachelse}
                <div style="margin-left:25px; padding:10px 0 20px;">
                    <em><p>Chưa cập nhật nội dung</p></em>
                </div>
            {/foreach}
          
        </ul>

        <div class="paging">
            {$paging}
        </div>

      </div>

      <div class="col250 fl"> 

        {loadModule mod=product task=category}
        {loadModule mod=product task=filter}
        
        <div class="hotline_left">
          <table>
            <tr>
              <td><img src="{$url}images/iconhotline.png"/></td>
              <td>Hotline: <br/>
                <p class="f24">{$config.hotline_product}</p></td>
            </tr>
          </table>
        </div>
      </div>
      
    </div>
  </div>