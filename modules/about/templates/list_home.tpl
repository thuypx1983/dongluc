<ul class="list_box_laungage list_abouts pkg">
		{foreach from=$rows item=row}
        	<li>
              <div class="box_school1 fl"><span class="list_square fl"></span><a href="{$url}{$row.link}.html" class="name_box_school1">{$row.title}
        
                <p >{$row.title_jp}</p></a>
                 <div><a href="{$url}{$row.link}.html"><img src="{$url}upload/about/thumb/{$row.photo}"/> </a></div>
              </div>
            </li>	
        {/foreach}
        
      </ul>