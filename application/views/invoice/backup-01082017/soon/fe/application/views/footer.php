<div class="site-footer__wrapper">
    <form method="post" action="<?php echo base_url().'Main/SaveSuscriber/';?>" class="site-newsletter" id="newsletter">
        
        
      <label for="email">Get in touch</label>
      <h5 style="color:#9539B7; width:400px;"></h5>
      <input type="text" id="email" name="Newsletter_email" value="" placeholder="Enter your e-mail address for more promos and hot deals from PayPro"/>
      <button type="submit" class="buttons">Get notified</button>
        <a href="#" id="backToTop" title="backToTop"></a>
      <svg class="site-newsletter__loading"><circle></circle></svg>
    </form>
      
    <div class="row">
      <div class="column large-3">
        <!--[if gte IE 9]><!-->
        <img width="100px" height="auto" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/logo_paypro.png"/>
          
        
        <!--<![endif]-->
      </div>
      <?php
        $i = 0;
        if ( isset($footer) && $footer !== "" ){
          foreach ($footer as $data_footer ) {
          
      ?>
      <div class="column large-3 medium-6 small-12">
        
        <nav class="site-footer__menu">
            <h3 class="h-how"><?php echo $footer[$i]['title'];?></h3>
            <ul id="menu-how">
              <?php
                $j=0;
                if ( $footer[$i]['submenu'] !== "" ){
                  $submenu = $footer[$i]['submenu'];
                  foreach ($submenu as $data_submenu) {
                   
              ?>
              <li><a href="<?php echo $submenu[$j]['links'];?>" rel="sectop"><?php echo $submenu[$j]['title_submenu'];?></a></li>
              <?php $j++; } } ?>
            </ul>
        </nav>
      </div>
      <?php 
          $i++;
        }
      }
      ?>
    </div>
    <div class="site-copyright">
      <ul>
        <li>© 2017 PAYPRO </li>
        <li>Terms of use</li>
        <li>Privacy Policy</li>
      </ul>
      <a href="#" target="_blank">
      <!--[if gte IE 9]><!-->
      <svg width="30" height="36" class="icon-dogstudio">
      <use xlink:href="/files/templates/riiot/public/icons/spritesheet.svg#icon-dogstudio"></use>
      </svg>
      <!--<![endif]-->
      </a>
    </div>
  </div>
  <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-92984138-1', 'auto');
ga('send', 'pageview');

</script>