<div class="grid1060">
    <div class="breadcumb"><a href="#">Gallery </a><a href="{$url}photo/" class="active">Thư viện ảnh</a></div>
    <div class="maincontent">
      <div class="vanhoa" id="vanhoa">
       <div class="col700 fl col690">
        <div class="list_photo">
        <div class="pkg">
			{foreach from=$rows item=row}
        	
            <a href="{$url}{$row.pre_link}-{$row.id}.html" class="thumb250x188 thumb_over fl"><img src="{$url}upload/gallery/album/{$row.photo}"> <span class="title_thumb_bottom">{$row.title}</span> </a>
        
        {/foreach}
            
         </div>   
            
			
			<style>
		  .span_select_class {
			  border: 1px solid #cc0000;
				color: #cc0000 !important;
				font-weight:normal !important;
				padding: 5px 12px;
				font-size:16px;
				margin-left:7px;
			}
		  }
          </style>
          <div class="paging">
          	{$paging}
          </div>
			
        </div>
        </div>
        {loadModule mod=box_right}
      </div>
      
      <p class="clear"> </p>
    </div>
  </div>
