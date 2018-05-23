<div class="site-footer__wrapper">
    <div class="footer-imgApps">
        <a href="https://play.google.com/store/apps/details?id=id.paypro" target="_blank"><img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/android.png" width="130"/></a>
        <a href="https://appsto.re/id/-C6vib.i" target="_blank"><img class="appstore-button-footer" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/ios.png"/ width="130"></a>
    </div>
    <form method="post" action="<?php echo base_url().'Mains/SaveSuscriber/';?>" class="site-newsletter" id="newsletter">
        
        
      <label for="email">Get in touch</label>
      <h5 style="color:#9539B7; width:400px;"></h5>
      <input type="text" id="email" name="Newsletter_email" value="" placeholder="Enter your e-mail address for more promos and hot deals from PayPro"/>
      <button type="submit" class="buttons">Get notified</button>
        <a href="#" id="backToTop" title="backToTop"></a>
      <svg class="site-newsletter__loading"><circle></circle></svg>
    </form>
    
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
			  //if ( $footer[$i]['submenu'] != "" ){
		  ?>
		  <div class="column large-2 medium-6 small-12 ft4">
			<nav class="site-footer__menu">
				<h3 class="h-contact"><?php echo $footer[$i]['title'];?></h3>
				<ul id="menu-contact">
				  <?php 
					  if ( $footer[$i]['submenu'] != "" ){             
					  $submenu = $footer[$i]['submenu'];
					  $j=0;
					  foreach ($submenu as $data_submenu) {
				  ?>
				  <li><a href="<?php echo $submenu[$j]['links'];?>" rel="sectop" data-internal-link><?php echo $submenu[$j]['title_submenu'];?></a></li>
				  <?php $j++; } } ?>
				</ul>
			</nav>
		  </div>
		  <?php 
				//}
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
			  //if ( $footer[$i]['submenu'] != "" ){
		  ?>
		  <div class="column large-2 medium-6 small-12 ft4">
			<nav class="site-footer__menu">
				<div id="only-one" data-accordion-group>
					<div data-accordion>
						<h3 data-control><?php echo $footer[$i]['title'];?></h3>
						<ul data-content>
						  <?php 
							  if ( $footer[$i]['submenu'] != "" ){             
							  $submenu = $footer[$i]['submenu'];
							  $j=0;
							  foreach ($submenu as $data_submenu) {
						  ?>
						  <li><a href="<?php echo $submenu[$j]['links'];?>" rel="sectop" data-internal-link><?php echo $submenu[$j]['title_submenu'];?></a></li>
						  <?php $j++; } } ?>
						</ul>
					</div>
				</div>
			</nav>
		  </div>
		  <?php 
				//}
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
      <use xlink:href="http://paypro.id/soon/backup-programming/assets/files/templates/riiot/public/icons/spritesheet.svg#icon-dogstudio"></use>
      </svg>
      <!--<![endif]-->
      </a>
    </div>
  </div>

	<script type="text/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/jquery.accordion.js"></script>
	<script type="text/javascript">
      $(document).ready(function() {
        $('#only-one [data-accordion]').accordion();
      });
    </script>

  <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-92984138-1', 'auto');
ga('send', 'pageview');

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
	   $(".h-faq").addClass("dropdown-footer");
	   $(".h-find").addClass("dropdown-footer");
	   //$(".h-about").append( "<i class='h-icon'></i>" );
	   //$(".h-how").append( "<i class='h-icon'></i>" );
	   //$(".h-contact").append( "<i class='h-icon'></i>" );
	}
	else {
	   //alert('More than 420');
	   $(".h-about").removeClass("dropdown-footer");
	   $(".h-how").removeClass("dropdown-footer");
	   $(".h-contact").removeClass("dropdown-footer");
	   $(".h-faq").removeClass("dropdown-footer");
	   $(".h-find").removeClass("dropdown-footer");
	   
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
    
    $(".h-faq.dropdown-footer").click(function(){
		if ($(".h-faq").hasClass("active")) {
			$("#menu-faq").css("display", "none");
			$(".h-faq").removeClass("active");
		}else{
			$("#menu-faq").css("display", "block");
			$(".h-faq").addClass("active");
		}
        
    });
	
	$(".h-find.dropdown-footer").click(function(){
		if ($(".h-find").hasClass("active")) {
			$("#menu-find").css("display", "none");
			$(".h-find").removeClass("active");
		}else{
			$("#menu-find").css("display", "block");
			$(".h-find").addClass("active");
		}
        
    });
	
	
	
});
</script>