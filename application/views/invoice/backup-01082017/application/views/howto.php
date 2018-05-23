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
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/slick.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/animate.css">
    
    <!-- STYLE CSS FREEZEFRAME IMAGE GIF -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/freezeframe_styles.min.css">
    
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/modernizr.js"></script>
    <script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/wow.js"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/animate.js"></script>
	
	<!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/font-awesome/css/font-awesome.min.css">
    
    <!-- Jquery FREEZEFRAME IMAGE GIF-->
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/imagesloaded.pkgd.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/freezeframe.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
  
</head>

<body class="lang-en">
  <input type="hidden" value="<?php echo $gif;?>" id="howto_list_gif" name="howto_list_gif" ?>
  <div class="wrapper how" data-smooth-scroll='{"speed": 1, "ease": 0.08, "fixed": true}'>
      
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
      

      
<main role="main" class="js-app-container" data-view="about">

  <article class="content content--about typeset">

    <div class="content-bodi">
    <?php
    $i=0;
    if ( isset($page_section) && $page_section !== "" ){
      foreach ( $page_section as $data_section ){
        if ( $page_section[$i]['slider'] !== "" ){          
    ?>

    <section id="slider_<?php echo strtolower(str_replace(" ", "_", $page_section[$i]['slider'][0]['idSlider']));?>" class="<?php echo $page_section[$i]['slider'][0]['sec_class'];?>">
        <h1 class="u-visually-hidden">Login</h1>
        
        <div class="about-team__wrapper">
            <!--<h2 class="about-team__title"><span>How to log in<br /></h2>
            <p style="color:#873EA3;">After you’ve downloaded the app, <br>simply follow these 3 easy steps to start using PayPro!</p>-->
            
            <!-- start slider how it works  -->  
            <div class="slider fade">
              
              <div class="home-block bg-1" style="background-color: #<?php echo $page_section[$i]['slider'][0]['background'];?>">
                <div class="wrapper-slide">
                  
                  <?php 
                    if ( $page_section[$i]['type'] == "A" ){
                  ?>

                  <div class="home-block-right">
					<?php
						$explode_img = explode(".",$page_section[$i]['slider'][0]['img']);
						if ( isset( $explode_img[1])){
							if ( $explode_img[1] == "gif" ){
								$class_freeze = "";
							}else{
								$class_freeze = "class='img-freez'";
							}
						}else{
							$class_freeze = "class='img-freez'";
						}
						
					?>
                    <div class="img"><img <?php echo $class_freeze;?> id="img<?php echo  $page_section[$i]['id_section'];?>" src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$page_section[$i]['slider'][0]['img'];?>?sdsafds"/></div>
                    <div class="img-phone">
                      <img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/bg_phone_white_1024.png"/>
                    </div>
                  </div>

                  <div class="home-block-left">
                    <h2 class="intro-reload__title"><strong><span><?php echo $page_section[$i]['slider'][0]['title'];?></span></strong></h2>                     
                    <!--<h3 class="intro-reload__title">Utility Bills</h3>-->
                    <p class="intro-reload__parag">
                      <?php echo $page_section[$i]['slider'][0]['content'];?>
                    </p>
                    <?php if (  $page_section[$i]['slider'][0]['link'] ) { ?>
                    <a href="<?php echo $page_section[$i]['slider'][0]['link'].'/'.$_SESSION['lang_paypro'];?>" class="button--white btnFindOut"><?php echo $words[19];?></a>
                    <?php } ?>
                  </div>

                  <?php } else { ?>
                  
                  <div class="home-block-left">
                      <h2 class="intro-reload__title"><strong><span><?php echo $page_section[$i]['slider'][0]['title'];?></span></strong></h2>
                        
                      <!--<h3 class="intro-reload__title">Utility Bills</h3>-->
                      <p class="intro-reload__parag">
                        <?php echo $page_section[$i]['slider'][0]['content'];?>

                      </p>
                      <?php if (  $page_section[$i]['slider'][0]['link'] ) { ?>
                      <a href="<?php echo $page_section[$i]['slider'][0]['link'].'/'.$_SESSION['lang_paypro'];?>" class="button--white btnFindOut"><?php echo $words[19];?></a>
                      <?php } ?>
                  </div>
                  <div class="home-block-right">
                    <div class="img"><img id="img<?php echo  $page_section[$i]['id_section'];?>" src="<?php echo URL_PANEL.'assets/dist/img/slider/'.$page_section[$i]['slider'][0]['img'];?>?sdsafds"/></div>
                    <div class="img-phone">
                      <img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/bg_phone_white_1024.png"/>
                    </div>
                  </div>

                  <?php } ?>
                  </div>
                <div class="clear"></div>
              </div>

            </div>
        </div>
    </section>  

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

<script>
  //var gif1
    //window.onload=function () {
      //gif1=document.getElementById('img1')
      //setInterval(function () {
        //gif1.src=gif1.src.replace(/\?.*/,function () {
          //return '?'+new Date()
        //})
      //},9000)//duration of your gif
    //};
</script>

<script>    
    $(window).load(function(){
       setInterval(function(){
        var old_src = $('#img15').attr('src').split('?')
				$('#img15').attr('src', '')
				setTimeout(function(){
        	$('#img15').attr('src', old_src[0]+'?cache='+Math.random().toString(36).substring(7))
				}, 500)
       }, 9000) 
       setInterval(function(){
        var old_src = $('#img17').attr('src').split('?')
				$('#img17').attr('src', '')
				setTimeout(function(){
        	$('#img17').attr('src', old_src[0]+'?cache='+Math.random().toString(36).substring(7))
				}, 500)
       }, 9000) 
    })
</script>

</body>
</html>
