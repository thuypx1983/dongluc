<div class="grid1060">
    <div class="content_cate"> <a href="{$url}doi-tac/" class="head_title">Đối tác</a>
      <div class="pkg">
        {if $rows}
        <ul class="list_partern">
            {foreach from=$rows item=row}
                <li><img src="{$url}upload/partner/thumb/{$row.thumb}"/> </li>
            {/foreach}
        </ul>
        {else}
        <div style="margin-left:0px; padding:10px 0 20px;">
            <em><p>Chưa cập nhật nội dung</p></em>
        </div>
        {/if}
      </div>
    </div>
  </div>