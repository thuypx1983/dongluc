
<link rel="stylesheet" href="{$path}general.css" type="text/css" media="screen">
<script type="text/javascript" src="{$path}validation.js"></script>

<style type="text/css">
.bao_form
{
	padding:20px;
}
</style>

<div class="bao_form">
	<h1>Step 2</h1>
	<form method="post" id="customForm" action="">
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text">
            <span id="nameInfo">What's your name?</span>
        </div>
        <div>
            <label for="email1">E-mail</label>
            <input id="email1" name="email1" type="text">
            <span id="email1Info">Valid E-mail please, you will need it to log in!</span>
        </div>
        <div>
            <label for="email2">Confirm E-mail</label>
            <input id="email2" name="email2" type="text">
            <span id="email2Info">Confirm E-mail</span>
        </div>
        <div>
            <label for="pass1">Password</label>
            <input id="pass1" name="pass1" type="password">
            <span id="pass1Info">At least 5 characters: letters, numbers and '_'</span>
        </div>
        <div>
            <label for="pass2">Confirm Password</label>
            <input id="pass2" name="pass2" type="password">
            <span id="pass2Info">Confirm password</span>
        </div>
        <div>
            <label for="phone">Phone number</label>
            <input id="phone" name="phone" type="text">
            <span id="phoneInfo">Input your telephone number</span>
        </div>
        <div>
            <input id="send" name="send" value="Send" type="submit">
        </div>
	</form>
</div>





















