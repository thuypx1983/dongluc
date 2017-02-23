<style type="text/css">
#reply_message label { display:block; } 
#reply_message textarea { width:546px; height:120px; padding:10px; } 
#reply_message input { height:26px; width:558px; margin-bottom:20px; } 
</style>
<link rel="stylesheet" href="{$url}lib/jquery-ui-1.9.0.custom/themes/base/jquery.ui.all.css">
<script type="text/javascript">

$(function(){
	
	
	$( "#reply_success" ).dialog({
			autoOpen: false,
			modal: true,
			resizable: false,
			buttons: {
				"OK": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	
	$( '.error_reply_message' ).hide();
	$( "#reply_message" ).dialog({
			autoOpen: false,
			height: 400,
			width: 596,
			modal: true,
			resizable: true,
			buttons: {
				"Gửi": function() {
					var valid = true;
					valid = valid & checkLength($('.subject_reply'));
					valid = valid & checkLength($('.content_reply'));
					if(valid)
					{
						$.post(url+"?ajax=true&mod=user&task=message_reply", $('form[name="reply_message"]').serialize(), function(){

							$( "#reply_success" ).dialog( "open" );
							
							$( "#reply_message" ).dialog( "close" );		
						});
						
					}
					else {
						$( this ).css('height', '300px');
						$( '.error_reply_message' ).show();
					}
				},
				"Đóng lại": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	
	$( "#show_message" ).dialog({
			autoOpen: false,
			height: 400,
			width: 596,
			modal: true,
			resizable: true,
			buttons: {
				"Phản hồi": function() {
					$( this ).dialog( "close" );
					
					show_reply_message();
				},
				"Đóng lại": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});

	$('.show_message').click(function(){
		$(this).removeClass('bold');
		
		if($(this).hasClass("red")) /*neu do la tin nhan cua admin */
		{
			var id = $(this).attr("value");
			$.post(url+"?ajax=true&mod=user&task=message_single", { 'id' : id }, function(data){
				$('#show_message').html(data);
				$( "#show_message" ).dialog( "open" );
				
			});	
		}
		
		return false;
	});
	
	function show_reply_message()
	{
		$( '.error_reply_message' ).hide();
		var subject_reply = '[ Phản hồi ] : ' + $('.subject').text();
		var user_reply = $('.user_send').html();
		
		$('.subject_reply').val(subject_reply);
		$('.user_reply').html(user_reply);
		$('.content_reply').val("");
		$( "#reply_message" ).dialog( "open" );
	}
});

</script>

<div id="reply_success" title="Phản hồi thành công">
	<p style="margin-top:10px;">Phản hồi của bạn đã được gửi đi</p>
</div>

<div id="reply_message" title="Gửi phản hồi">
<form name="reply_message" onsubmit="return false;">
    <p style="margin:10px 0 10px;">Phản hồi được gửi tới <span class="user_reply grape bold"></span></p>
    <label>Tiêu đề</label>
    <input type="text" name="subject_reply" class="subject_reply" />
    <label>Nội dung</label>
    <textarea name="content_reply" class="content_reply"></textarea>
    <label style="text-align:center;" class="error_reply_message red">Vui lòng nhập đầy đủ thông tin</label>
</form>
</div>

<div id="show_message" title="Tin nhắn của bạn">
	
</div>

<div class="box-message">
    <div class="helpnote">
        <div class="helppad">
            {*<h3><a href="{$url}?mod={$smarty.get.mod}&task=user&utask=message_list" title="Hòm thư của bạn" style="color:#333;">Tin nhắn</a></h3>*}
            {foreach from=$rows item=row}
        	       
            	        <a class="show_message
                        {if $row.from_user_id>0}
                	        red
                   	        {if $row.is_read==0}
                	   	        bold
                            {/if}
                        {else}
                	        black
                        {/if}" href="#" title="{$row.subject}" value="{$row.id}">{$row.subject}</a> <br />
                   
					
                {foreachelse}
        	        <em style="padding:20px 0; display:block;">Không có tin nhắn nào</em>
                {/foreach}  
                                    
          </div>
          
      </div>                                	
</div><!-- end box-message -->
