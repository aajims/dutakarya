<!doctype html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="PayPro allows everyone to use the service and pay for the widest range of transactions">
  <link rel="canonical" href="http://paypro.id/en/contact">
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
  <?php $this->load->view("assets");?>
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
           <img src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/logo.png"/>
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
         <p class="en org" style="color:#8F43AB;"><?php echo $words[17];?><br> <small><?php echo $words[18];?> </small></p>
          <p class="adr">
            <span class="street-address"></span><br>
            <span class="postal-code"></span> <span class="locality"></span>, <span class="country-name">Indonesia</span>            
          </p>
        </div>
      </div>
    </header>

    <div class="content-body" id="contact-form">


      <div class="content-body__wrapper">
        <div class="contact-form">

  
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
    <script type="application/javascript" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/main.js"></script>

<script>

</script>


</body>
</html>
