<!doctype html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="PayPro allows everyone to use the service and pay for the widest range of transactions">
  <link rel="canonical" href="http://paypro.id/en/contact">
      <link rel="icon" href="http://paypro.id/soon/favicon.ico" type="image/x-icon">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta property="og:type" content="" />
<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="" />
<meta property="og:description" content="" />
  <meta name="twitter:card" content="" />
<meta name="twitter:site" content="" />
<meta name="twitter:creator" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:description" content="" />
<meta name="twitter:image:src" content="" />
  <title>Contact - PAYPRO</title>
  
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/jquery.accordion.css">
	
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/main.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/theme.css"/>
	  
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/modernizr.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  
</head>

<body class="lang-en">
    
  <div class="wrapper" data-smooth-scroll='{"speed": 1, "ease": 0.08, "fixed": true}'>
      
<header class="site-header js-app-header">
  <div class="site-header__wrapper">
    <h1 class="site-title">

    <a href="<?php echo base_url();?>" class="site-title__logo" data-internal-link>
    <span class="u-visually-hidden">
    </span>
    <!--[if gte IE 9]><!-->
    <img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/logo.png"/>
    <!--<![endif]-->
    </a>
    </h1>
    <nav class="site-navigation" role="navigation">
  <ul class="site-navigation__list">
        <?php $this->load->view("mainbar");?>
  </ul>
</nav>
    <button type="button" class="site-navigation-trigger" data-navigation-trigger>
    <span class="site-navigation-trigger__wrapper">
    <i class="site-navigation-trigger__line site-navigation-trigger__line--1"></i>
    <i class="site-navigation-trigger__line site-navigation-trigger__line--2"></i>
    <i class="site-navigation-trigger__line site-navigation-trigger__line--3"></i>
    </span>
    </button>
  </div>
</header>

      <main role="main" class="js-app-container" data-view="contact">

  <article class="content content--contact">

    <header class="content-header typeset">
      <div class="content-header__wrapper">
        <div class="contact-address vcard">
          <p class="en org" style="color:#8F43AB;"><?php echo $words[5];?>!<br> <small><?php echo $words[6];?></small></p>
          <p class="adr">
            <span class="street-address"></span><br>
            <span class="postal-code"></span> <span class="locality"></span>, <span class="country-name">Indonesia</span>            
          </p>
        </div>
        <div class="part-hotLine">
            <img class="img-responsive" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/hotline-icon-white.png" />
            <div class="content-hotline">
                <h3>Consumer Hotline</h3>
                <p>021-30008789</p>
            </div>
        </div>
      </div>
    </header>
    <div class="clear"></div>
    <div class="content-body" id="contact-form">


      <div class="content-body__wrapper">
        <div class="contact-form">

          
          <form method="post" action="<?php echo base_url().'Contact/Savecontact';?>">
            <fieldset>
              <div class="form-group">
                
                <div class="form-field">
                  <label for="firstname"><?php echo $words[7];?></label>
                  <input type="text" class="form-control" name="Contact_sFirstname" id="firstname" value=""  />
                </div>
                    <div class="form-field">
                        <label for="email"><?php echo $words[8];?></label>
                        <input type="email" class="form-control" name="Contact_sEmail" id="email" value=""  />
                    </div>
              </div>
              
                <div class="form-field">
                  <label for="lastname"><?php echo $words[9];?></label>
                  <input type="text" class="form-control" name="Contact_sLastname" id="lastname" value="" />
                </div>
              <div class="form-field">
                <label for="subject"><?php echo $words[10];?></label>
                <select class="form-control" name="Contact_sTo" id="subject">
                                      
                                      <option value="contact@paypro.id" >
                         <?php echo $words[12];?>
                    </option>
                
                                      <option value="contact@paypro.id" >
                        <?php echo $words[13];?>
                    </option>
                                  </select>
              </div>
              <div class="form-field">
                <label for="message"><?php echo $words[11];?></label>
                <textarea class="form-control" name="Contact_sMessage" id="message"></textarea>
              </div>
            </fieldset>
              <p style="color:#fff;">
                  <input type="checkbox" name="checkbox" value="check"/ >
              
              Subscribe for newsletter
              
              </p>


            <button type="submit" class="button" value="submit" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}" >Send</button>
              
          </form>
        </div>

        <aside class="contact-faq typeset">
          
        </aside>
      </div>
    </div>

  </article>

</main>

      
  <footer class="site-footer js-app-footer">
  <div class="site-footer__wrapper">
    <div class="footer-imgApps">
        <a href="https://play.google.com/store/apps/details?id=id.paypro" target="_blank"><img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/android.png" width="130"/></a>
        <a href="https://appsto.re/id/-C6vib.i" target="_blank"><img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/ios.png"/ width="130"></a>
    </div>
    <!--<form method="post" action="http://www.riiotlabs.com/service/riiot/subscribe?lng=en" class="site-newsletter" id="newsletter">
        
        
      <label for="email">Get in touch</label>
      <h5 style="color:#9539B7; width:400px;"></h5>
      <input type="text" id="email" name="Newsletter_email" value="" placeholder="Enter your e-mail address for more promos and hot deals from PayPro"/>
      <button type="submit" class="buttons">Get notified</button>
        <a href="#" id="backToTop" title="backToTop"></a>
      <svg class="site-newsletter__loading"><circle></circle></svg>
    </form>-->
      
	<div class="hidden-mobile">  
		<div class="row">
		  <div class="column large-2 ft1">
			<!--[if gte IE 9]><!-->
			<img width="100px" height="auto" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/logo_paypro.png"/>
			  
			
			<!--<![endif]-->
		  </div>
		  
		   <?php
			$i = 0;
			if ( isset($footer) && $footer !== "" ){
			  foreach ($footer as $data_footer ) {
			  if ( $footer[$i]['submenu'] != "" ){
		  ?>
		  <div class="column large-2 medium-6 small-12 ft4">
			<nav class="site-footer__menu">
				<h3 class="h-contact"><?php echo $footer[$i]['title'];?></h3>
				<ul id="menu-contact">
				  <?php                
					  $submenu = $footer[$i]['submenu'];
					  $j=0;
					  foreach ($submenu as $data_submenu) {
				  ?>
				  <li><a href="<?php echo $submenu[$j]['links'];?>" rel="sectop" data-internal-link><?php echo $submenu[$j]['title_submenu'];?></a></li>
				  <?php $j++; }  ?>
				</ul>
			</nav>
		  </div>
		  <?php 
				}
			  $i++;
			}
		  }
		  ?>
		  
		  <div class="column large-2 medium-6 small-12 ft5">
			<div class="footer-mediaSocial site-footer__menu">
				<h3 class="h-find">FIND US</h3>
				<ul id="menu-find">
					<li><a href="https://www.facebook.com/PayProIndonesia" target="_blank" rel="sectop" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/paypro_id" target="_blank" rel="sectop" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/paypro_id/" target="_blank" rel="sectop" title="Instagram"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
		  </div>
		  
		</div>
	</div>
	<div class="footer-screen-mobile">  
		<div class="row">
		  <div class="column large-2 ft1">
			<!--[if gte IE 9]><!-->
			<img width="100px" height="auto" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/logo_paypro.png"/>
			  
			
			<!--<![endif]-->
		  </div>
		  
		   <?php
			$i = 0;
			if ( isset($footer) && $footer !== "" ){
			  foreach ($footer as $data_footer ) {
			  if ( $footer[$i]['submenu'] != "" ){
		  ?>
		  <div class="column large-2 medium-6 small-12 ft4">
			<nav class="site-footer__menu">
				<div id="only-one" data-accordion-group>
					<div data-accordion>
						<h3 data-control><?php echo $footer[$i]['title'];?></h3>
						<ul data-content>
						  <?php                
							  $submenu = $footer[$i]['submenu'];
							  $j=0;
							  foreach ($submenu as $data_submenu) {
						  ?>
						  <li><a href="<?php echo $submenu[$j]['links'];?>" rel="sectop" data-internal-link><?php echo $submenu[$j]['title_submenu'];?></a></li>
						  <?php $j++; }  ?>
						</ul>
					</div>
				</div>
			</nav>
		  </div>
		  <?php 
				}
			  $i++;
			}
		  }
		  ?>
		  
		  <div class="column large-2 medium-6 small-12 ft5">
			<div class="footer-mediaSocial site-footer__menu">
				<div id="only-one" data-accordion-group>
					<div data-accordion>
						<h3 data-control>FIND US</h3>
						<ul data-content>
							<li><a href="https://www.facebook.com/PayProIndonesia" target="_blank" rel="sectop" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/paypro_id" target="_blank" rel="sectop" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/paypro_id/" target="_blank" rel="sectop" title="Instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		  </div>
		  
		</div>
	</div>
    <div class="site-copyright">
      <ul>
	  	<li>© 2017 PAYPRO </li>
        <?php 
          if (  $_SESSION['lang_paypro'] == "en" ){
        ?>
        <li><a href="<?php echo base_url().'Tnc';?>">Terms and Condition</a></li>
        <li><a href="<?php echo base_url().'Faq/Privacy';?>">Privacy Policy</a></li>
        <?php } else { ?>
        <li><a href="<?php echo base_url().'Tnc';?>">Syarat dan Ketentuan</a></li>
        <li><a href="<?php echo base_url().'Faq/Privacy';?>">Kebijakan Privasi</a></li>
        <?php } ?>
      </ul>
      <a href="#" target="_blank">
      <!--[if gte IE 9]><!-->
      <svg width="30" height="36" class="icon-dogstudio">
      
      </svg>
      <!--<![endif]-->
      </a>
    </div>
  </div>
  </footer>

  </div>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/main.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/jquery.accordion.js"></script>
	<script type="text/javascript">
      $(document).ready(function() {
        $('#only-one [data-accordion]').accordion();
      });
    </script>

<script>
 function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
</script>
    
    <script>
        $(document).ready(function() {
        $('a[rel="sectop"]').click(function(){
        $('html, body').animate({
          scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 1000);
      return false;
  }); 
});
</script>


</body>
</html>
