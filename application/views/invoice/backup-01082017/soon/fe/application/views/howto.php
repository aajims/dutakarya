<!doctype html>
<html lang="en">
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
    
    <title>How It Works - PayPro</title>
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>/files/templates/riiot/public/css/slick.css"/>
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/animate.css">
    
    <!-- STYLE CSS FREEZEFRAME IMAGE GIF -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/freezeframe_styles.min.css">
    
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="application/javascript" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/modernizr.js"></script>
    <script type="application/javascript" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/slick.min.js"></script>
    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/wow.js"></script>
    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/animate.js"></script>
    
    <!-- Jquery FREEZEFRAME IMAGE GIF-->
    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/imagesloaded.pkgd.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/freezeframe.js" type="text/javascript"></script>
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
      

      
<main role="main" class="js-app-container" data-view="about">

  <article class="content content--about typeset">
    <?php
    if ( $page_section !== "" ){
       if ( $page_section[0]['sec_type'] == "H" ){
      if ( $page_section[0]['html']['background'] == "FFFFFF") { 
        $color = "#9539B7";
      }else{
        $color = "white";
      }

      if ( $page_section[0]['html']['bg_type'] == "C"){
        $style = " style='background-color: #".$page_section[0]['html']['background']." !important;'"; 
      }else{
        $style = " style='background-image: url(".URL_PANEL."assets/dist/img/sections/bg_sections/".$page_section[0]['html']['background'].");background-size:cover;'"; 
      }
    ?>
    <header id="free" class="content-header how-it-works aboutFreeaccess" <?php echo $style;?>>
      
     
        <div class="about-open__wrapper">
          <div class="about-open__text how-left">
            
              <h2 class="about-open__title" style="color:white;"><strong><?php echo $page_section[0]['html']['title']->title;?></strong></h2>
              <p class="about-open__parag" style="color:white"><?php echo strip_tags($page_section[0]['html']['title']->description);?></p>
            <a class="button button--underlined button--white" href="#" target="_blank"></a>
          </div>
          <div class="img-how wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="<?php echo URL_PANEL.'assets/dist/img/sections/'. $page_section[0]['html']['images'];?>"/>
          </div>
        </div>
      
      
    </header>
    <?php } else { ?>
    <div id="pays" class="home-slide-tri">  
        <div class="intro-reload__wrapper">
        <div class="slider fade">
          <?php
            $j=0;
            $sliders = $page_section[0]['slider'];
            foreach ( $sliders as $data_slider ){
          ?>
          <div class="home-block" >
            <div class="home-block-left">
              <h2 class="intro-reload__title" style="color:white;"><strong><?php echo $sliders[$j]['title'];?></strong></h2>
              <p class="intro-reload__parag">
                <?php echo $sliders[$j]['content'];?>
              </p>
            </div>
            <div class="home-block-right">
              <div class="img"><img src="<?php echo URL_PANEL."assets/dist/img/slider/". $sliders[$j]['img'];?>"/></div>
            </div>
            <div class="clear"></div>
          </div>
          <?php $j++; } ?>
        </div>    
      </div>
    </div>
    <?php } } ?>
    <div class="content-bodi">
      <?php
      $i=0;
      if ( isset($page_section) && $page_section != "" ){
        for ( $i=1; $i<count($page_section); $i++ ){ 
          if ( $page_section[$i]['sec_type'] == "H" ){
            if ( $page_section[$i]['html']['bg_type'] == "C"){
              $style = " style='background-color: #".$page_section[$i]['html']['background']."'"; 
            }else{
              $style = " style='background-image: url(".URL_PANEL."assets/dist/img/sections/bg_sections/".$page_section[$i]['html']['background'].");background-size:cover;'"; 
            }
     ?>
      <section id="reload" class="about-reload">
        <div class="about-reload__wrapper">
          <div class="about-reload__text marginbottommobile-50">
              <h2 class="about-reload__title" style="color:white;"><strong>Reload with ease</strong></h2>
            <p class="about-reload__parag">You can top up your PayPro account directly from <br>your bank account or from thousands of ATMs, <br>banks and convenience stores.
</p>
            <!--<!<a class="button button--underlined button--white" href="#" target="_blank">Continue</a>[hide dulu]-->
          </div>
         
            <div class="img-how2 wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="<?php echo base_url().'assets';?>/files/templates/riiot/public/assets/images/phone_splash.png"/>
          </div>
        </div>
      </section>
      <?php 
      } else { 
        if ( $page_section[$i]['background'] == "FFFFFF" ){
          $color = "9539B7";
        }else{
          $color = "white";
        }

        $sliders = $page_section[$i]['slider'];

    ?>
    <section id="how" class="about-team">
        <h1 class="u-visually-hidden">Login</h1>
        
        <div class="about-team__wrapper">
            <!--<h2 class="about-team__title"><span>How to log in<br /></h2>
            <p style="color:#873EA3;">After you’ve downloaded the app, <br>simply follow these 3 easy steps to start using PayPro!</p>-->
            
            <!-- start slider how it works  -->  
            <div class="slider fade">
              <?php
                $k=0;
                foreach ( $sliders as $data_slider ){
                  if ( $sliders[$k]['background'] == "FFFFFF" ){
                    $colors = "9539B7";
                  }else{
                    $colors = "white";
                  }
              ?>
              <div class="home-block bg-1" style="background-color: #<?php echo $sliders[$k]['background'];?>">
                <div class="wrapper-slide">
                    <div class="home-block-left">
                      <h2 class="intro-reload__title" style="color:#<?php echo $colors;?>"><strong><?php echo $sliders[$k]['title'];?></strong></h2>
                        
                      <!--<h3 class="intro-reload__title">Utility Bills</h3>-->
                      <p class="intro-reload__parag" style="color:#<?php echo $colors;?>">
                        <?php echo strip_tags($sliders[$k]['content']);?>
                      </p>
                    </div>
                    <div class="home-block-right">
                      <div class="img"><img class="img-freez" src="<?php echo URL_PANEL.'assets/dist/img/slider/'. $sliders[$k]['img'];?>"/></div>
                      <div class="img-phone">
                        <img src="<?php echo base_url().'assets';?>/files/templates/riiot/public/assets/images/bg_phone_white_1024.png"/>
                      </div>
                    </div>
                </div>
                <div class="clear"></div>
              </div>
              <?php
                  $k++;
                }
              ?>

            </div>
        </div>
      </section>
       <?php } } } ?>
           
      
    </div>

  </article>

</main>

      
<footer class="site-footer js-app-footer">
  <?php $this->load->view("footer");?>
</footer>

  </div>
    <script type="application/javascript" src="http://www.riiotlabs.com/files/templates/riiot/public/js/main.js"></script>

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

<script>
    $('.responsive').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 3500,  
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true    
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
</script>
<script>
    $(document).on('ready', function() {
      freezImg = new freezeframe('.img-freez').freeze();
    
        $('.fade').slick({
          dots: false,
          infinite: true,
          speed: 900,
                fade: true,
              autoplay: true,
          autoplaySpeed: 3500,
          slidesToShow: 1,
          slidesToScroll: 1,
          
          /*responsive: [
            {
              breakpoint: 1024,
              settings: {
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true    
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
              }
            }
            You can unslick at a given breakpoint now by adding:
             settings: "unslick"
             instead of a settings object
          ]*/
        });
        $(".fade").on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        freezImg.trigger();
      });
    });
</script>
<script>
    if ($('#backToTop').length) {
    var scrollTrigger = 1000, //
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#backToTop').addClass('show');
            } else {
                $('#backToTop').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#backToTop').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 800);
    });
}
</script>

<!-- Script WOW JS -->
<script>
    //$(document).ready(function() {
        wow = new WOW(
          {
            animateClass: 'animated',
            offset: 100,
            mobile: true,
            live: true
          }
        );
    //});
wow.init();
</script>

</body>
</html>
