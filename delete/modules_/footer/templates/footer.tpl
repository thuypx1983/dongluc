<div class="footer pkg">
    <div class="grid1060">
      <ul class="list_footer pkg">
        <li class="col1"><a href=""><img src="{$url}images/logo_footer.png"/> </a><br/>
          <br/>
          {$config.copyright}
        </li>
        <li  class="col2">
          <div class="head_footer">Địa chỉ</div>
          <p>{$config.address}</p>
          <p> Tel: {$config.phone}</p>
          <p> Hotline: {$config.hotline}</p>
          <p> Fax: {$config.fax}</p>
        </li>
        <li  class="col2">
          <div class="head_footer">Nhận Email</div>
          <div class="box_send_mail pkg">
            <input type="text" class="txt_mail" placeholder="nhập địa chỉ email"/>
            <input type="submit" class="btn_sendmail" value="Gửi"/>
          </div>
        </li>
        <li  class="col3">
          <div class="head_footer">Kết nối</div>
          <a href="{$config.facebook}" class="social_footer"><img src="{$url}images/iconfb.png"/></a>
          <a href="{$config.twitter}" class="social_footer"><img src="{$url}images/icontw.png"/></a>
          <a href="{$config.instagram}" class="social_footer"><img src="{$url}images/iconinsta.png"/></a>
          <a href="{$config.youtube}" class="social_footer"><img src="{$url}images/iconyoutube.png"/></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>

$(document).ready(function(){
$( ".menu_drop_mobile" ).click(function() {
      $('.more_menu').toggleClass('active');
      
      $('.menu_left_mobile').toggleClass('active_menu');
      $('.header').toggleClass('active_main');
      $('.close_menu').toggleClass('active')
     
  });
  $( ".btn_menu" ).click(function() {
  $('.menu_show').toggleClass('active');
  $('.wrapper').toggleClass('active');
  $('.header').toggleClass('active');
  $('.close_menu').toggleClass('active')
});
  
  $( ".close_menu" ).click(function() {
      $('.menu_drop_mobile').removeClass('active');
      $('.close_menu').removeClass('active')
      $('.menu_left_mobile').removeClass('active_menu');
      $('.header').removeClass('active_main');
      $('.menu_show').removeClass('active');
  $('.wrapper').removeClass('active');
  $('.header').removeClass('active');
  $('.close_menu').removeClass('active')
      
     
  });
})


$(document).ready(function(){

  $('#cssmenu1 > ul > li:has(ul)').addClass("has-sub");

  $('#cssmenu1 > ul > li > a > i').click(function() {
    var checkElement = $(this).parent().next();
    
    $('#cssmenu1 li').removeClass('active');
    $(this).closest('li').addClass('active'); 
    
    
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }
    
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#cssmenu1 ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }
    
    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;  
    }   
  });

});

</script>
</body>
</html>
