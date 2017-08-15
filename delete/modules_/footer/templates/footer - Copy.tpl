</div>
<div class="footer">
    <div class="grid1060 pkg"> 
      
      <div class="box_social">
         <div>
            <a href="{$config.facebook}" class="fl"><img src="{$url}images/facebook_icon.png" class="fl"/> <span class="fl">Facebook</span></a>
            <a href="{$config.google_plus}" class="fl"><img src="{$url}images/gle_icon.png" class="fl"/><span class="fl">Google +</span></a>
            <a href="{$config.youtube}" class="fl"><img src="{$url}images/youtube_icon.png" class="fl"/><span class="fl">Youtube</span></a>
        </div>
     </div>
     
     <a href="#" class="backtop" id="return-backtop"><img src="{$url}images/arr_top.jpg"/> </a>
      <script>
     $('#return-backtop').click(function() {      // When arrow is clicked
    $('body,html').animate({
      scrollTop : 0                       // Scroll to top of body
    }, 500);
    return false;
  });
  </script>
      <div class="fl footer_left">
      
      </div>
      <div class="fr info_footer"> <strong>{$config.footer_slogan}</strong> {$config.address}<br/>
        {$config.phone}<br/>
        {$config.email}<br/>
        {$config.copyright}<br/>
            <a href="http://smartseo.vn">SEO</a> by SmartSEO
      </div>
    </div>
  </div>
  
</div>

<script>
  
$( ".btn_menu" ).click(function() {
  $('#menu-left').toggleClass('active_menu')
  $('.header_mobile').toggleClass('active_main')

});
</script> 
<script type="text/javascript">
$(window).load(function(){
        $("#header").sticky({ topSpacing: 0 });
    });
        $(function () {
            $('#navigationMenu').accordion({
                collapsible: true,
         header: 'h3',
                navigation: true,
                clearStyle: true,       
            });
      $("#navigationMenu h3 a").click(function() {
        window.location = $(this).attr('href');
        return false;
       });
 
        });
    </script>
{literal}
<!--Start of Live Chat Script-->
<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
   ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=c500cb8a6f73cefdb608190df5724287&data=eyJzc29faWQiOjIyMDMwNDQsImhhc2giOiJhYTk2ZmY5MmExMDJkNDNjOWYyZTAzZGI3YmY1MDgwNCJ9&pname='+product_name;
   var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>
<!--End of Live Chat Script-->
{/literal}
</body>
</html>
