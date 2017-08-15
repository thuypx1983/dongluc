<script type="text/javascript">
function redirect_register()
{
    var query = ""
    if ($('#input_register_email').val() != '')
    {
        query = '&register_email=' + $('#input_register_email').val();
    }
    location.href=url+'dang-ky-nhan-tin/' + query;
    return false;
}
</script>
<li  class="col2">
    <div class="head_footer">Nhận Email</div>
    <div class="box_send_mail pkg">
      <form action="" method="post" onsubmit="return redirect_register()">
        <input id="input_register_email" type="text" name="email" class="txt_mail" placeholder="nhập địa chỉ email"/>
        <input type="submit" class="btn_sendmail" value="Gửi"/>
      </form>
    </div>
  </li>