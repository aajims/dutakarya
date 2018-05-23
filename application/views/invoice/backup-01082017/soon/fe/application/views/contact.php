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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/main.css" />
      <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/theme.css"/>
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
          <p class="en org" style="color:#8F43AB;">Talk to us!<br> <small>Thank you for reaching out to us. <br>For more information, <br>please leave your name and details.</small></p>
          <p class="adr">
            <span class="street-address"></span><br>
            <span class="postal-code"></span> <span class="locality"></span>, <span class="country-name">Indonesia</span>            
          </p>
        </div>
        <div class="part-hotLine">
            <img class="img-responsive" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/hotline-icon-white.png" />
            <div class="content-hotline">
                <h3>Consumer Hotline</h3>
                <p>+6285622222</p>
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


            <button type="submit" class="button" value="submit" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}" ><?php echo $words[14];?></button>
              
          </form>
        </div>

        <aside class="contact-faq typeset">
          
        </aside>
      </div>
    </div>

  </article>

</main>

      
<footer class="site-footer js-app-footer">
 <?php $this->load->view("footer");?>
</footer>

  </div>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/main.js"></script>

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
