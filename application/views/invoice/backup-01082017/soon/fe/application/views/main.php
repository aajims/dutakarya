<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="PayPro allows everyone to use the service and pay for the widest range of transactions">

<link rel="canonical" href="http://www.paypro.id/en/home">

<link rel="icon" href="http://paypro.id/soon/favicon.ico" type="image/x-icon">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta property="og:type" content=""/>

<meta property="og:title" content=""/>

<meta property="og:image" content=""/>

<meta property="og:site_name" content=""/>

<meta property="og:description" content=""/>

<meta name="twitter:card" content=""/>

<meta name="twitter:site" content=""/>

<meta name="twitter:creator" content=""/>

<meta name="twitter:title" content=""/>

<meta name="twitter:description" content=""/>

<meta name="twitter:image:src" content=""/>

<title>Home - PAYPRO</title>

<link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/slick.css"/>

<link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/main.css"/>

<link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/theme.css"/>

<link rel="stylesheet" href="<?php echo base_url().'assets/';?>files/templates/riiot/public/css/animate.css">

    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>-->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <script type="application/javascript" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/modernizr.js"></script>

    <script type="application/javascript" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/slick.min.js"></script>

    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/wow.js"></script>

    <script src="<?php echo base_url().'assets/';?>files/templates/riiot/public/js/animate.js"></script>

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

  <header id="home" class="content-header">  

  <div class="home-slider-one">

    <div class="intro-reload__wrapperx">

      <div class="slider responsive">

        <?php

          $i=0;

          if ( isset($slider) && $slider !== "" ){

          foreach ( $slider as $data_slider ){

            if ( $slider[$i]->type == "A"){

        ?>

        <div class="home-block">

          <div class="home-blocks-left">

            <div class="home-blocks-left-top">

                <h2 class="intro-reload__title" style="color:white;"><strong><?php echo $slider[$i]->title;?></strong></h2>

                <p class="intro-reload__parag"><?php echo $slider[$i]->content;?></p>

                <div class="intro-stores-badge">

                    <p>

                   

                    </p>

                    <!-- APPSTORE -->

                    <!-- GOOGLE PLAY -->

                    <?php if ( $i == 0 ) { ?>

                    <a class="store" href="#">

                    <img class="googleplay-button" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/android.png" alt="googleplay-logo">

                    </a>

                    <a class="store" href="#">

                    <img class="appstore-button" src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/ios.png" alt="appstore-logo">

                    </a>

                    <?php } ?>

                    <?php if ( $slider[$i]->icon != "" && $i != 0 ){ ?>

                      <div class="home-blocks-left-bottom margintop-30"> 

                          <img src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$slider[$i]->icon;;?>" />

                      </div>

                    <?php } ?>

                </div>

            </div>

          </div>

          <div class="home-block-right">

            <div class="img"><img src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/slider_1.png"/></div>

          </div>

          <div class="clear"></div>

        </div>

        <?php } else { ?>

        <div class="home-block bg" style="background-image:url('<?php echo URL_PANEL."assets/dist/img/slider/".$slider[$i]->img;?>') !important;">

          <div class="home-blocks-left">"

            <h2 class="intro-reload__title" style="color:white;"><strong><?php echo $slider[$i]->title;?></strong></h2>

             <p class="intro-reload__parag"><?php echo ($slider[$i]->content);?></p>

          </div>

          <div class="clear"></div> 

        </div>

        <?php } $i++; } } ?>

      </div>    

    </div>

  </div>

  

  <!-- End // .slider -->

  </header>

  <div class="content-body mobileHome-1">

  <?php

    $i=0;



    if ( isset($page_section) && $page_section != "" ){

      foreach ( $page_section as $data_page_section ){

        if ( $page_section[$i]['sec_type'] == "H" ){

          if ( $page_section[$i]['html']['bg_type'] == "C"){

            $style = " style='background-color: #".$page_section[$i]['html']['background']."'"; 

          }else{

            $style = " style='background-image: url(".URL_PANEL."assets/dist/img/sections/bg_sections/".$page_section[$i]['html']['background'].");background-size:cover;'"; 

          }



          if ( $page_section[$i]['html']['background'] == "FFFFFF") { 

            $color = "9539B7";

          }else{

            $color = "white";

          }

  ?>



    <section id="pay" class="intro-reload" "<?php echo $style;?>!important;">

    <div class="intro-reload__wrapper paddingtop-80">

      <div class="home-column-left" style="">

        <h2 class="intro-reload__title" style="color:<?php echo $color;?>;"><strong><?php echo $page_section[$i]['html']['title']->title;?></strong></h2>

          <p class="intro-reload__parag" style="color:#<?php echo $color;?>"><?php echo strip_tags($page_section[$i]['html']['title']->description);?></p>        

          <?php

            if ( $page_section[$i]['html']['title']->icon !== "" ){

          ?>

          <div class="home-blocks-left-bottom margintop-20"> 

            <img src="<?php echo URL_PANEL.'assets/dist/img/sections/'.$page_section[$i]['html']['title']->icon;?>" />

          </div>

          <?php } ?>

      </div>

      <?php if ( $page_section[$i]['html']['title']->images !== "" ) { ?>

      <div class="home-column-right wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5s">

        <div class="img">

          <img src="<?php echo URL_PANEL.'assets/dist/img/sections/'.$page_section[$i]['html']['title']->images;?>"/>

        </div>    

      </div>

      <?php } ?>

      <div class="clear"></div>

    </div>

    </section>

    <?php } else {    ?>

    <div id="pays" class="home-slide-tri">  

        <div class="intro-reload__wrapper f1">

        <div class="slider fade">

          <?php

            $j=0;

            $sliders = $page_section[$i]['slider'];           

            if ( $page_section[$i]['slider_type'] !== "C" ){

            foreach ( $sliders as $data_slider ){

              if ( $sliders[$j]['type'] == "A" ){

          ?>

          <div class="home-block bg-2" style="background-color: #<?php echo $sliders[$j]['background'];?>;">

            <div class="wrapper-slide">

                <div class="home-block-left paddingtop-50">

                  <h2 class="intro-reload__title" style="color:white;"><strong><?php echo $sliders[$j]['title'];?></strong></h2>

                  <h3 class="intro-reload__title" style="color:white;"><?php echo strip_tags($sliders[$j]['content']);?></h3>

                  <p class="intro-reload__parag">

                    Using PayPro to pay <br>for your transportation is  quick and easy.

                  </p>

                  <?php if ( $sliders[$j]['icon'] !== "" ) { ?>

                  <div class="home-blocks-left-bottom margintop-20"> 

                    <img src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$sliders[$j]['icon'];?>" />

                  </div>

                  <?php } ?>

                </div>

                <div class="home-block-right">

                  <div class="img"><img src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$sliders[$j]['img'];?>"/></div>

                </div>

            </div>

            <div class="clear"></div>

          </div>

         <?php } else { ?>

          <div class="home-block bg-1" style="background-color: #963BB7">

            <div class="wrapper-slide">

                <div class="home-block-left paddingtop-50">

                  <h2 class="intro-reload__title" style="color:white;"><strong>Pay what</strong><strong><span> with PayPro</span></strong></h2>

                    

                  <h3 class="intro-reload__title" style="color:white;">Utility Bills</h3>

                  <p class="intro-reload__parag">

                    Keep your monthly bill payments organised.

                  </p>

                </div>

                <div class="home-block-right">

                  <!--<div class="img"><img src="../files/templates/riiot/public/assets/images/splash_screen_1_1024.png"/></div>-->

                  <div class="img-phone ps-slide">

                    <img src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/Mobile-Pay.png"/>

                    <div class="slider-slide-one">

                        <div class="slider in-phone">

                            <?php

                              $l=0;

                              if ( $sliders[$j]['minislider'] !== ""){

                                foreach ($sliders[$j]['minislider'] as $data_slider_mini2) {

                               

                            ?>

                            <div><img src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$sliders[$j]['minislider'][$l];?>"/></div>

                            <?php $l++; } }?>

                        </div>

                    </div>

                  </div>

                </div>

            </div>

            <div class="clear"></div>

          </div>

         <?php } $j++; } } ?>

        </div>

        <!--<div class="img-phone">

            <img src="<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/bg_phone_white_1024.png"/>

        </div>-->    

      </div>

    </div>

    

    <?php } $i++; } } ?>



  </div>

  </article>

  </main>

  <footer class="site-footer js-app-footer">

  <?php $this->load->view("footer");?>

  </footer>

</div>

<script type="application/javascript" src="http://www.riiotlabs.com/files/templates/riiot/public/js/main.js"></script>

<script>  

// $(document).ready(function() { 

// setTimeout(function(){

//     $('#main-slider-next').click(function() {

//           $eL=$('.slider-wrapper').fadeOut().children('div').filter(":visible");

//           $('.slider-wrapper').fadeIn().children().hide();

//           if($eL.next().length>0){

//               $eL.next().show();

//           }else{

//                $('.slider-wrapper div')[0].show();

//           }

//     });

// },950);

//     setTimeout(function(){

//     $('#main-slider-prev').click(function() {

//           $eL=$('.slider-wrapper').fadeOut().children('div').filter(":visible");

//           $('.slider-wrapper').fadeIn().children().hide();

//           if($eL.previous().length>0){

//               $eL.previous().show().fadeOut();

//           }else{

//                $('.slider-wrapper div')[0].show();

//           }

//     });

// },1250);

//     });

</script>

<script>

$(document).ready(function() {

  $('a[rel="sectop"]').click(function(){

      $('html, body').animate({

          scrollTop: $( $.attr(this, 'href') ).offset().top

      }, 1000);

      return false;

  }); 

  

  // dropdown

  if ($(window).width() < 420) {

     // alert('Less than 420');

     $(".h-about").addClass("dropdown-footer");

     $(".h-how").addClass("dropdown-footer");

     $(".h-contact").addClass("dropdown-footer");

     //$(".h-about").append( "<i class='h-icon'></i>" );

     //$(".h-how").append( "<i class='h-icon'></i>" );

     //$(".h-contact").append( "<i class='h-icon'></i>" );

  }

  else {

     //alert('More than 420');

     $(".h-about").removeClass("dropdown-footer");

     $(".h-how").removeClass("dropdown-footer");

     $(".h-contact").removeClass("dropdown-footer");

     

  }

  

  // onclick function

  $(".h-about.dropdown-footer").click(function(){
    if ($(".h-about").hasClass("active")) {

      $("#menu-about").css("display", "none");

      $(".h-about").removeClass("active");

    }else{

      $("#menu-about").css("display", "block");

      $(".h-about").addClass("active");

    }

    });

  

  $(".h-how.dropdown-footer").click(function(){

    if ($(".h-how").hasClass("active")) {

      $("#menu-how").css("display", "none");

      $(".h-how").removeClass("active");

    }else{

      $("#menu-how").css("display", "block");

      $(".h-how").addClass("active");

    }

    });

  

  $(".h-contact.dropdown-footer").click(function(){

    if ($(".h-contact").hasClass("active")) {

      $("#menu-contact").css("display", "none");

      $(".h-contact").removeClass("active");

    }else{

      $("#menu-contact").css("display", "block");

      $(".h-contact").addClass("active");

    }

        

    });

  

  

  

  

  

});

</script>



<!-- opan -->

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

    $('.fade').slick({

  dots: false,

  infinite: true,

  speed: 900,

        fade: true,

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



$('.in-phone').slick({

  dots: true,

  infinite: true,

  speed: 900,

        fade: true,

      autoplay: true,

  autoplaySpeed: 800,

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

    

if ($('#backToTop').length) {

    var scrollTrigger = 1500, //

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

        }, 2000);

    });

}

</script>



<script>

    $(function() {

        $("#imgDino").onLoad(

            function() {

                $(this).attr("src", "<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/Secure-GIF-.gif");

            },

            function() {

                $(this).attr("src", "<?php echo base_url().'assets/';?>files/templates/riiot/public/assets/images/Secure-GIF-.gif");

            }                         

        );                  

    });

</script>



<!-- Script WOW JS -->

<script>

    //$(document).on('load', function() {

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



<!-- opan -->

</body>