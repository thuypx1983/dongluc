<script type="text/javascript">

$(function(){

	$('.row-cat-title div').attr('type','desc');
	
	$('.row-cat-title div').attr('field', '');
	
	$('.row-cat-title div').click(function(){
			
		if($(this).attr('value')!=0)
		{
			var orderField = $(this).attr('value')+"|"+$(this).attr('type');
			
			$('.row-cat-title div').attr('field', orderField); /* gan cho tat ca the div */
			
			$('.row-cat-title div').find('span').remove();
			$('.row-cat-title div').removeClass('div_hover');
			
			if($(this).attr('type')=='desc')
			{
				$(this).find('span').remove();
				
				$(this).attr('type', 'asc');
				$(this).addClass('div_hover');
				message_filter(orderField);
				$(this).append('<span>&#9660;</span>');
				return false;	
			}
			
			if($(this).attr('type')=='asc')
			{
				$(this).find('span').remove();
				
				$(this).attr('type', 'desc');
				$(this).addClass('div_hover');
				message_filter(orderField);
				$(this).append('<span>&#9650;</span>');
				return false;
			}
			
			
		}
	});
	
	
	
});

function message_filter(orderField)
{
	var string_field = "";
	if(orderField!="")
	{
		string_field = "&order="+orderField;
	}
	
	$.get(url+'?ajax=true&mod=user&task=message_list' + string_field, function(result){
			$('#hung').hide();
			$('#hung').html(result);
			$('#hung').fadeIn(300);
		});
}

</script>
<style type="text/css">
.col-subject, .col-user, .col-date, .col-read {
    line-height: 18px;
    padding: 0 5px;
	text-align: center;
}
.col-subject{
    float: left;
    width: 35%;
	text-align: left;
}
.col-user {
	float: left;
    width: 20%;
}
.col-date {
	float: left;
    width: 20%;
}
.col-read {
	float:left;
	width: 14%;	
}

</style>
<div class="c-content">
    <div class="buttom-20">
        <h3 class="line-title">Hòm thư của bạn</h3>
    	
		<div class="clear">
            <div class="category-list clearfix" style="position:relative;">  
                <div class="row-cat-title clearfix" style="padding:0;">
                    <div class="col-stt" value="id">STT</div>
                    <div class="col-subject" value="subject">Tiêu đề</div>
                    <div class="col-user" value="from_user_id">Người gửi</div>
                    <div class="col-date" value="create_date">Ngày tạo</div>
                    <div class="col-read" value="is_read">Đã đọc?</div>
                </div>
                  
                <div id="hung">
                    {include file='list_message_temp.tpl'}                 
                </div>
                    
            </div><!-- end category-list -->
        </div>
        
           
    </div>

</div>