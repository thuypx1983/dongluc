<center>
    <div style="text-align: left; margin: 10px;">

            {if $error!=""}
            <div style="color: #FF0000; padding-left: 10px; padding-top: 10px;">
                {$error_echo}
            </div>
            {/if}
            
            {redirect url='?' time=2}
        
	</div>
</center>
