{loadModule mod=header}

{loadModule mod=rootpath}

<script type="text/javascript">
	$(function(){
		var temp = $('.test').children();
		//alert(temp.prop("tagName"));
		if(temp.prop("tagName").toLowerCase()=='form')
		{
			$('.test').css('padding', '10px 20px 30px');
		}
			
	});
</script>
<div style="margin-bottom:50px; border:1px solid #d5d5d5; " class="test">
{if $smarty.get.mod==''}    
    {loadModule mod=home}
{else}   
    {loadModule mod=$smarty.get.mod task=$smarty.get.task}
{/if}
</div>



{loadModule mod=footer}
		
		
		
        
		
