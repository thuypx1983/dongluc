

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

<style type="text/css">
.ok { background:#ebf8a4; border:1px solid #a2d246; }
.not_ok { background:#ffc4c4; border:1px solid #44611d; }
#error_admin 
{
	cursor:pointer;
	display:inline-block;
	color:#000;
	box-shadow:1px 1px 50px #68942e;  
	-moz-box-shadow:1px 1px 50px #68942e;  
	-moz-border-radius:5px;
	border-radius:5px;
	padding:12px 20px 10px;
	
}
</style>

	<div style="position:absolute; top:-5px; left:0; width:100%; text-align:center; z-index:999999;">
    	<div id="error_admin" {if $error=='success'}class="ok"{else}class="not_ok"{/if} >{$error_echo}</div>
    </div>

    
    <div id="green_overlay" style="display: block;" class="animate">
 
        <div class="signup_wrapper">		
            <div id="form_container">
                    <a class="logo" href="{$url}" style="color:#fff; font-size:32px; font-weight:bold; text-decoration:none;">Aodoi.info</a>
                    
                    <div class="inner_container">
                    
                        <!-- Form dang nhap-->

                        <form id="login_form" class="form-horizontal animate" method="post">
                            <input name="tex_username" class="input-300" placeholder="Username" type="username" >
                            
                            <input name="tex_password" class="input-300" placeholder="Password" type="password">
                            <button type="submit" name="" value="" class="submit">Đăng nhập</button>                        
                            <span class="col_left">
                                <input id="remember_me" name="remember_me" class="input-checkbox" type="checkbox">
                                <label for="remember_me">Nhớ mật khẩu</label>
                            </span>
                            <span class="col_right">
                                <label id="forgot_password"><a href="?mod=user&task=password" class="a_forgot_pass" style="text-decoration:none; color:#fff;">Quên mật khẩu?</a></label>
                            </span>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    {if $error!="success" && $error!="logout_success"}
    {else}
        {redirect url='?' time=1}
    {/if}
</div>
