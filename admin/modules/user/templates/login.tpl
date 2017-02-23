<form action="" method="post" style="margin: 0px; padding: 0px;">
    <table width="100%" border="0" style="height:auto">
    	<tr>
        	<td align="center" valign="top">
            	
                {if $error_echo!=''}
                    {if $error=='success'}
                        <div style="color:green">[{$error_echo}]</div>
                    {else}
                        <div style="color:red">[{$error_echo}]</div>
                    {/if}
                {/if}
                <div style="width:434px; height:214px; position:relative; margin-top:160px;">
                    
                    <div style="background:url({$url}admin/images/1.jpg) repeat-x; height:200px; float:left; width:420px; border-left:2px solid #b1b1b1; border-right:2px solid #b1b1b1; text-align:left; padding-left:10px; position:relative">
                        <div style="font-size: 14px; font-weight: bold; margin-top: 10px;">Đăng nhập hệ thống quản trị [ <a style="font-size: 12px; font-weight: normal; margin-top: 5px; color: #FFF; text-decoration: none;" href="{$url}"> Trang chủ</a> ]</div> 
                                <div style="height:108px; position:absolute; left: 2px; top: 45px; width: 423px;">
                            <img src="{$url}admin/images/lock.jpg" align="left">
                            <div style="float:left; width:320px; height:90px; font-size:12px; margin-left:10px; padding-top:20px;">
                                <table width="100%" border="0" cellspacing="3" cellpadding="3">
                                	<tr>
                                    	<td>Tên đăng nhập</td>
                                    	<td><input name="tex_username" id="tex_username" style="width:200px" placeholder="Username" type="text" ></td>
                                  	</tr>
                                  	<tr>
                                        <td>Mật khẩu</td>
                                        <td><input name="tex_password" placeholder="Password" type="password" style="width:200px"></td>
                                	</tr>
                            	</table>
                            </div>
                        </div>
                        <div style="position:absolute; left: 33px; top: 144px; width: 422px; height: 44px;">
                            <div style="position:absolute;  position:absolute; width:205px; left: 218px; height: 30px;  padding-top:6px;">
                                <input type="submit" value="login" style="background:url({$url}admin/images/button.jpg); height:29px; width:105px; border:none; margin-left:50px; font-size:14px; color:#fff; font-weight:bold;">
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
    		</td>
    	</tr>
    </table>
</form>
{if $error!="success" && $error!="logout_success"}
{else}
    {redirect url='?' time=1}
{/if}