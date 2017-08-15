


<script type="text/javascript">
$(function(){
    $('#filter_color a').click(function(){
        $('#filter_color a').removeClass('active');
        $(this).addClass('active');
        $('input[name="color_id"]').val($(this).attr('value'));

        submitFilter();

        return false;
    })
    $('#filter_price .ck_price').click(function(){
        $('#filter_price li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('input[name="price_id"]').val($(this).val());

        submitFilter();
    })
    $('#filter_price li').each(function(){
        if($(this).hasClass('active'))
        {
            $(this).find('input').attr('checked', true);
        }
    })
    $('#filter_material .ck_price').click(function(){

        var val = "0";
        $('#filter_material .ck_price').each(function(){
            if($(this).prop('checked') == true) {
                val += "-" + $(this).val();
            }    
        })
        val = val.replace('0-', '');
        val = val.replace('0', '');
        $('input[name="matr_id"]').val(val);

        submitFilter();
    })
    $('#slt_filter').change(submitFilter);
})

function submitFilter(){
    
	var link_cate = url + "{$smarty.get.cate}-{$smarty.get.id}/";
	
	var get_cate = "{$smarty.get.cate}";
	if (get_cate == '')
		link_cate = url + "san-pham/";
    
    var c_id    = $('input[name="color_id"]').val();
    var pr_id   = $('input[name="price_id"]').val();
    var m_id    = $('input[name="matr_id"]').val();
    var so      = $('select[name="sort"]').val();
    var query   = '';

    if (c_id    != '') query += '&color_id=' + c_id;
    if (pr_id   != '') query += '&price_id=' + pr_id;
    if (m_id    != '') query += '&matr_id=' + m_id;
    if (so      != '') query += '&sort=' + so;

    location.href = link_cate + query;
}
</script>

<div>
    <input type="hidden" name="color_id" value="{$smarty.get.color_id}">
    <input type="hidden" name="price_id" value="{$smarty.get.price_id}">
    <input type="hidden" name="matr_id" value="{$smarty.get.matr_id}">
    <!-- <button type="button" onclick="submitFilter()">Submit</button> -->
</div>
<a href="" class="head_title">lọc sản phẩm</a>
<ul class="list_filter">
  <li> <a class="head_filter" href="">Màu sắc</a>
    <ul class="sub_filter">
      <li class="filter_color" id="filter_color">
        {foreach from=$filter.color item=c key=k}
            <a href="" value="{$c.id}" title="{$c.title}" {if $c.id==$smarty.get.color_id}class="active"{/if}><span style="background:{$c.color_code}"></span></a>
        {/foreach}
    </li>
    </ul>
  </li>
  <!--<li> <a class="head_filter" href="">Kích cỡ</a>
    <ul class="sub_filter">
        <ul class="list_size">
            <li>
                {foreach from=$filter.size item=s key=k}
                <a href="" {if $k==0}class="active"{/if}>{$s.title}</a>
                {/foreach}
            </li>
          </ul>
    </ul>
  </li> -->
  <li> <a class="head_filter" href="">Giá</a>
    <ul class="sub_filter" id="filter_price">
      {foreach from=$filter.price item=p key=k}
        <li class="pkg {if $p.id==$smarty.get.price_id}active{/if}">
            <label>
                <input type="radio" name="r1" value="{$p.id}" {if $p.id==$smarty.get.price_id}checked{/if} class="ck_price fl"/>
                <span class="fill_price fl">{$p.title}</span>
            </label>
        </li>
        {/foreach}
    </ul>

  </li>
  <li> <a class="head_filter" href="">Chất liệu</a>
    <ul class="sub_filter" id="filter_material">
        {$matr_get = "-"|explode:$smarty.get.matr_id}
        {foreach from=$filter.material item=m key=k}
        <li class="pkg {if $m.id|in_array:$matr_get}active{/if}">
            <label>
                <input type="checkbox" value="{$m.id}" {if $m.id|in_array:$matr_get}checked{/if} class="ck_price fl"/>
                <span class="fill_price fl">{$m.title}</span>
            </label>
        </li>
        {/foreach}
    </ul>
  </li>
</ul>