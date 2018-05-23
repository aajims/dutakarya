<div class="site-footer__wrapper">
    <form method="post" action="<?php echo base_url().'Main/SaveSuscriber/';?>" class="site-newsletter" id="newsletter">
      <label for="email">Get in touch</label>
      <h5 style="color:#9539B7; width:400px;"></h5>
      <input type="text" id="email" name="Newsletter_email" value="" placeholder="Enter your e-mail address for more promos and hot deals from PayPro"/>
      <button type="submit" class="buttons">Get notified</button>
      <svg class="site-newsletter__loading"><circle></circle></svg>
    </form>
    <div class="row">
      <div class="column large-3">
        <!--[if gte IE 9]><!-->
        <img width="100px" height="auto" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/logo_paypro.png"/>
        <!--<![endif]-->
      </div>
      <div class="column large-3 medium-6 small-12">
        <nav class="site-footer__menu">
        <h3>ABOUT PAYPRO</h3>
        <ul>
          <li><a href="#home" rel="sectop" data-internal-link>Open to all</a></li>
          <li><a href="#homes" rel="sectop" data-internal-link>Pay for anything securely and easily</a></li>
          <li><a href="#homes" rel="sectop" data-internal-link>Enjoy convenience and special deals</a></li>
          <li><a href="#pay" rel="sectop" data-internal-link>Pay from your phone</a></li>
          <li><a href="#pays" rel="sectop" data-internal-link>Pay what with PayPro</a></li>
          <li><a href="#safe" rel="sectop" data-internal-link>Safe and Secure</a></li>
          <li><a href="#benefit" rel="sectop" data-internal-link>Use more and get more benefits</a></li>
        </ul>
        </nav>
      </div>
      <div class="column large-3 medium-6 small-12">
        <nav class="site-footer__menu">
        <h3>HOW IT WORKS</h3>
        <ul>
          <li><a href="./how-it-works.html" rel="sectop">Free access</a></li>
          <li><a href="./how-it-works.html" rel="sectop" data-internal-link>Reload with ease</a></li>
          <li><a href="./how-it-works.html" rel="sectop" target="_self">How to login</a></li>
          <li><a href="./how-it-works.html" rel="sectop" target="_self">Dompetku users</a></li>
        </ul>
        </nav>
      </div>
      
      <div class="column large-3 medium-6 small-12">
        <nav class="site-footer__menu">
        <h3>CONTACT US</h3>
        <ul>
          <li><a href="./contact.html" rel="sectop" data-internal-link>Talk to us</a></li>
        </ul>
        </nav>
      </div>
      
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
      <use xlink:href="<?php echo base_url().'assets';?>/files/templates/riiot/public/icons/spritesheet.svg#icon-dogstudio"></use>
      </svg>
      <!--<![endif]-->
      </a>
    </div>
  </div>