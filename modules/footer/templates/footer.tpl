<div class="footer pkg">
    <div class="grid1060">
      <ul class="list_footer pkg">
        <li class="col1"><a href="{$url}"><img src="{$url}images/logo_footer.png"/> </a><br/>
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
        
		    {loadModule mod=subcribe task=footer}
			
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
<!-- 
<script type="text/javascript">
$(function(){
    $('.header').addClass('fix_header')
})
</script>
 -->
<!-- 
<script type="text/javascript">
$(window).scroll(function() {
    if($(this).width() > 1024)
    {
        if ($(this).scrollTop() > 0) {        
            $('.header').addClass('fix_header')
            $('.logo img').addClass('fix_logo')
        } else {
            $('.header').removeClass('fix_header')
            $('.logo img').removeClass('fix_logo')
        }
    }
})
</script>
 -->
<a href="javascript:" id="return-to-top">&#9650;</a>
<style type="text/css">
#return-to-top {
    position: fixed;
    bottom: 10%;
    right: 2%;
    background: #01A3D8;
    width: 30px;
    height: 30px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    font-size:16px;
    text-align: center;
    color:#fff;
    orphanspacity:0.4;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: #01B1ED;
  opacity:1;
}
#return-to-top:hover i {
    color: #fff;
    
}
</style>
<script type="text/javascript">
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(300);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(300);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
</script>

<script>
  (function(i,s,o,g,r,a,m){ i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments) },i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68217925-1', 'auto');
  ga('send', 'pageview');

</script>

	
</body>
</html>
