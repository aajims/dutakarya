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
  <main role="main" class="js-app-container" data-view="about">
  <article class="content content--about typeset">
  <?php
    if ( $page_section !== "" ){
       if ( $page_section[0]['sec_type'] == "H" ){
      if ( $page_section[0]['html']['background'] == "FFFFFF") { 
        $color = "9539B7";
      }else{
        $color = "white";
      }

      if ( $page_section[0]['html']['bg_type'] == "C"){
        $style = " style='background-color: #".$page_section[0]['html']['background']." !important;'"; 
      }else{
        $style = " style='background-image: url(".URL_PANEL."assets/dist/img/sections/bg_sections/".$page_section[0]['html']['background'].");background-size:cover;'"; 
      }
  ?>
    <header id="free" class="content-header how-it-works" <?php echo $style?> "> 
      <div class="about-open__wrapper">
        <div class="about-open__text how-left">            
              <h2 class="about-open__title" style="color:<?php echo $color;?>;"><strong><?php echo $page_section[0]['html']['title']->title;?></strong></h2>
              <p class="about-open__parag" style="color:<?php echo $color;?>"><?php echo strip_tags($page_section[0]['html']['title']->description);?>
              </p>
            <a class="button button--underlined button--white" href="#" target="_blank"></a>
          </div>
          <div class="img-how">
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
  <div class="content-body">
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
    <section id="<?php echo strtolower(str_replace(' ','_',$page_section[$i]['html']['title']->title));?>" class="intro-reload"  <?php echo $style;?>!important;">
    <div class="intro-reload__wrapper">
      <div class="home-column-left" style="">
        <?php 
            if ( $page_section[$i]['html']['background'] == "FFFFFF") {            
        ?>
        <h2 class="intro-reload__title" style="color:#9539B7;"><?php echo $page_section[$i]['html']['title']->title;?></h2>
        <p class="intro-reload__parag" style="color:#9539B7;"><?php echo strip_tags($page_section[$i]['html']['title']->description);?></p>
        <?php } else { ?>
        <h2 class="intro-reload__title" style="color:white;"><?php echo $page_section[$i]['html']['title']->title;?></h2>
        <p class="intro-reload__parag"><?php echo $page_section[$i]['html']['title']->description;?></p>
        <?php } ?>
      </div>
      <?php if ( $page_section[$i]['html']['bg_type'] == "C"){ ?>
      <div class="home-column-right">
        <div class="img">
          <img width: 370px; height:auto src="<?php echo URL_PANEL."assets/dist/img/sections/". $page_section[$i]['html']['images'];?>"/>
        </div>    
      </div>
      <?php } ?>
      <div class="clear"></div>
    </div>
    </section>
    <?php 
      } else { 
        if ( $page_section[$i]['background'] == "FFFFFF" ){
          $color = "9539B7";
        }else{
          $color = "white";
        }

    ?>

    <div id="pays" class="home-slide-tri" style ="background:#<?php echo $page_section[$i]['background'];?>">  
        <div class="intro-reload__wrapper">
        <div class="slider fade">
          <?php
            $j=0;
            $sliders = $page_section[$i]['slider'];
            foreach ( $sliders as $data_slider ){
          ?>
          <div class="home-block" >
            <div class="home-block-left">
              <h2 class="intro-reload__title" style="color:<?php echo $color;?>;"><strong><?php echo $sliders[$j]['title'];?></strong></h2>
              <p class="intro-reload__parag" style="color:<?php echo $color;?>;">
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
});
</script>

<!-- opan -->
<script>
  $('.responsive').slick({
  dots: false,
  infinite: true,
  speed: 300,
      
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
        autoplaySpeed: 1500,
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
$( "form" ).submit(function( event ) {
  if ( $( "input:first" ) {
    $( "span" ).text( "Thanks for signing up for PayPro newsletter" ).show();
    return;
  }
 
  $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
  event.preventDefault();
});
</script>
<!-- opan -->
</body>