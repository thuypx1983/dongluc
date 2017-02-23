<a href="" class="head_title">lọc sản phẩm</a>
<ul class="list_filter">
  <li> <a class="head_filter" href="">Màu sắc</a>
    <ul class="sub_filter">
      <li class="filter_color">
        {foreach from=$filter.color item=c key=k}
            <a href="" title="{$c.title}" {if $k==0}class="active"{/if}><span style="background:{$c.color_code}"></span></a>
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
    <ul class="sub_filter">
      {foreach from=$filter.price item=m key=k}
        <li class="pkg {if $k==0}active{/if}">
            <input type="radio" name="r1" class="ck_price fl"/>
            <span class="fill_price fl">{$m.title}</span>
        </li>
        {/foreach}
    </ul>
  </li>
  <li> <a class="head_filter" href="">Chất liệu</a>
    <ul class="sub_filter">
        {foreach from=$filter.material item=m key=k}
        <li class="pkg {if $k==0}active{/if}">
            <input type="checkbox" class="ck_price fl"/>
            <span class="fill_price fl">{$m.title}</span>
        </li>
        {/foreach}
    </ul>
  </li>
</ul>