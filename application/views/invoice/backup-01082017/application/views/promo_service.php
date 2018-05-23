<!DOCTYPE html>
<html class=" inlinesvg backgroundcliptext" lang="en">
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="canonical" href="http://www.paypro.id/en/how-it-works">
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
    
    <title>Promos & Offers - PayPro Service Type</title>
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/slick.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/animate.css">
    
    <!-- STYLE CSS FREEZEFRAME IMAGE GIF -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/freezeframe_styles.min.css">
    
    <!-- STYLE JQUERY ACCORDION -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/jquery.accordion.css">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/font-awesome/css/font-awesome.min.css">

    
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/modernizr.js"></script>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/wow.js"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/animate.js"></script>
    
    <!-- Jquery FREEZEFRAME IMAGE GIF-->
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/imagesloaded.pkgd.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/freezeframe.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <!-- JQUERY ACCORDION -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/jquery.accordion.js"></script> 
    <script type="text/javascript">
      $(document).ready(function() {

        $('#single[data-accordion]').accordion({
          transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
          transitionSpeed: 200
        });
      });
    </script>
  
</head>

<body class="lang-en">
    
  <div class="wrapper" data-smooth-scroll="{&quot;speed&quot;: 1, &quot;ease&quot;: 0.08, &quot;fixed&quot;: true}">
      
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

      
<main role="main" class="js-app-container" data-view="news">

  <article class="content content--news news-detail typeset promos-detail detail-1">

    <header class="content-header" style="background-image:url('<?php echo URL_PANEL.'assets/dist/img/promo/'.$promo_service[0]->img;?>'); background-repeat:no-repeat; background-color: #9532B7; background-position: center center; background-size: 50%;">
      <div class="content-header__wrapper">
        <h1><?php echo $promo_service[0]->title;?></h1>
      </div>
    </header>

    <div class="content-body">
      <div class="content-body__wrapper">
        
        <!-- START ACCRODION SERVICE TYPE -->
        <div class="main-serviceType">
          <?php
            $i=0;
            if ( $promo_service != "" ){
           
              
          ?>
            <section id="single" data-accordion>
              <button data-control><?php echo $promo_service[0]->title;?></button>
   
                <div data-content>
                  <article>
                    <?php echo $promo_service[0]->promo;?>
                  </article>
                </div>    
        
            </section>
          <?php } ?>
        </div>
        <!-- END ACCRODION SERVICE TYPE -->

        <footer class="news-detail__footer">
          <div class="u-clearfix">
            <div class="news-detail__sharing">
              <p class="title">Share this post</p>
              <ul class="list">
                <li class="list__item">
                  <button class="list__link" data-share-facebook="" data-share-url="http://paypro.id/Promo">
                    <i class="fa fa-facebook" title="Facebook"></i>
                  </button>
                </li>
                <li class="list__item">
                  <button class="list__link" data-share-twitter="" data-share-url="<?php echo $promo_service[0]->title;?>" data-share-text="PayPro Promo <?php echo $promo_service[0]->title;?> http://paypro.id/Promo">
                    <i class="fa fa-twitter" title="Facebook"></i>
                  </button>
                </li>
                <li class="list__item">
                  <button class="list__link" data-share-linkedin="" data-share-url="http://paypro.id/Promo">
                    <i class="fa fa-linkedin"></i>
                  </button>
                </li>
              </ul>
            </div>
            <button class="news-detail__back js-back-top">Top   <!--[if gte IE 9]><!-->
  <svg width="21" height="21" class="icon-back-top">
    <use xlink:href="/files/templates/riiot/public/icons/spritesheet.svg#icon-back-top"></use>
  </svg>
  <!--<![endif]-->
</button>
          </div>
          <div class="news-detail__next">
            <p class="subhead">Next</p>
            <h3 class="title"><?php echo $run_get_next_promo[0]->title;?></h3>
            <a href="<?php echo base_url().'Promo/DetailPromo/'.$nextid;?>" class="button">Read</a>
          </div>
        </footer>
      </div>
    </div>

  </article>

</main>

      
<footer class="site-footer js-app-footer">
  <?php $this->load->view("footer");?>
  </footer>

  </div>
    <script type="application/javascript" src="http://www.riiotlabs.com/files/templates/riiot/public/js/main.js"></script>






</body></html>