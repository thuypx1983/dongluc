
<div style="width: 400px; text-align: left;">

<script type="text/javascript">
	$(function(){
		
		$('#error_admin').hide();
		
		$('#error_admin').click(function(){
			$(this).hide();
		});
		
		if($('#error_admin').text().length >0 )
		{
			$('#error_admin').show();	

		}
			
	});
	

</script>


<link href="{$url}admin/modules/user/templates/images/style_login.css" rel="stylesheet" type="text/css">

<style type="text/css">
#error_admin 
{
	cursor:pointer;
	display:inline-block;
	background:#ffc4c4; 
	color:#000;
	border:1px solid #44611d; 
	box-shadow:1px 1px 50px #68942e;  
	-moz-box-shadow:1px 1px 50px #68942e;  
	-moz-border-radius:5px;
	border-radius:5px;
	padding:12px 20px 10px;
}
</style>
	
    <div style="position:absolute; top:-5px; left:0; width:100%; text-align:center; z-index:999999;">
    	<div id="error_admin">{$error}</div>
    </div>
    
    {if $error!="success" && $error!="logout_success"}
    <div id="green_overlay" style="display: block;" class="animate">
 
        <div class="signup_wrapper">		
            <div id="form_container">
                     <a class="logo" href="{$url}" style="color:#fff; left:0; font-size:32px; font-weight:bold; text-decoration:none;">Aodoi.info</a>
                    
                    <div class="inner_container">
                    
                        <!-- Form dang nhap-->

                        <form id="login_form" class="form-horizontal animate" method="post">
							<input name="check_hide" type="hidden" value="{$error}" />
                            <input name="tex_username" class="input-300" placeholder="Username" type="username">
                            
                            
                            <input name="tex_email" class="input-300" placeholder="email@example.com" type="email">
                            <button type="submit" name="" value="" class="submit">Lấy lại mật khẩu</button>                        
                            <span class="col_right">
                                <label id="forgot_password"><a href="?mod=user&task=login" class="a_forgot_pass" style="text-decoration:none; color:#fff;">Đăng nhập hệ thống</a></label>
                            </span>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    
    {else}
        {redirect url='?'}                    
    {/if}

 </div>
