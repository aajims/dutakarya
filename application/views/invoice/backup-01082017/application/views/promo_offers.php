<!doctype html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="PayPro allows everyone to use the service and pay for the widest range of transactions">
  <link rel="canonical" href="http://paypro.id/Promo">
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
      
<title>Promos & Offers - PAYPRO</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/main.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/theme.css"/>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/files/templates/riiot/public/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/templates/riiot/public/css/jquery.accordion.css">

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="application/javascript" src="<?php echo base_url();?>assets/files/templates/riiot/public/js/modernizr.js"></script>
<script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/wow.js"></script>
<script src="<?php echo base_url();?>assets/files/templates/riiot/public/js/animate.js"></script>
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

      
<main role="main" class="js-app-container" data-view="news">

  <article class="content content--news typeset">

    <?php
      if ( $page_section !== "" ){
    ?>

    <header class="content-header page-promos-offers" style="background-image:url('<?php echo URL_PANEL.'assets/dist/img/sections/bg_sections/'.$page_section[0]['html']['background'];?>')">
      <div class="content-header__wrapper">
          <h1><?php echo $page_section[0]['html']['title']->title; ?> </h1>
          <h5><?php //echo $page_section[0]['html']['title']->description; ?>
		  	<div class="splited-line">
				<span class="splited-line__wrapper">Enjoy convenience and special deals</span>
			</div>
		  </h5>
      </div>               
    </header>
    <?php } else { ?>
    <header class="content-header">
      <div class="content-header__wrapper">
          <h1>Promos & Offers </h1>
          <h5>Enjoy convenience and special deals</h5>
      </div>               
    </header>
    <?php } ?>
    <div class="content-body">
      <div class="content-body__wrapper">
          <?php
            $i=0;


            $arrMonth = array(
              "1" => "Januari",
              "2" => "Februari",
              "3" => "Maret",
              "4" => "April",
              "5" => "Mei",
              "6" => "Juni",
              "7" => "Juli",
              "8" => "Agustus",
              "9" => "September",
              "10" => "Oktober",
              "11" => "November",
              "12" => "Desember"
            );
            if ( isset($promo) && $promo != "" ){
              foreach ($promo as $data_promo ) {
               
          ?>
          <div class="news" id="news-<?php echo $promo[$i]->id;?>">
            <div class="u-clearfix" data-href="#">
              <div class="news__thumb">
                <img src="<?php echo URL_PANEL.'assets/dist/img/promo/'.$promo[$i]->img;?>">
              </div>
              <div class="news__body">
                <a href="<?php echo base_url().'Promo/DetailPromo/'.$promo[$i]->id;?>">
                <h2><?php echo $promo[$i]->title;?></h2>
                <time><?php echo $promo[$i]->tgl. " ".$arrMonth[$promo[$i]->bln]." ".$promo[$i]->thn;?></time>
                <?php echo $promo[$i]->intro;?>
                </a>
              </div>
            </div>
          </div>
         <?php
                $i++;
              }
            }
         ?>
		
        <div class="pagination">
          <?php echo $pagination;?>
        </div> 
        
		<div class="section-sk mb-80">
			<!-- START ACCRODION SERVICE TYPE -->
			<div class="main-serviceType mb-40 ac-1" style="padding-top: 0;">
				<section id="single" data-accordion>
					<button data-control><h4 class="text-purple" style="margin: 0; padding: 0;">Syarat dan Ketentuan Program Cashback PayPro</h4></button>
					<div data-content>
						<article>
							<p class="text-grey"><strong>Syarat dan Ketentuan Promo GRAB, KCJ, BPJS Kesehatan dan PLN Pascabayar</strong> </p>
							<table>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback berlaku untuk transaksi melalui aplikasi Paypro, menu UMB *123# ataupun melalui aplikasi myIM3.
</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback yang diberikan maksimal Rp 50.000 per transaksi.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Pelanggan dapat menikmati cashback maksimal 3x dalam 1 hari.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback untuk top-up stiker PayPro pertama kali adalah Rp 20.000 dan hanya berlaku 1x. </td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Periode promo adalah 25 Mei – 30 Juni 2017.</td>
								</tr>
							</table>
                            <p class="text-grey"><strong>Syarat dan Ketentuan Promo Alfamart & Indomaret  </strong></p>
							<table>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback berlaku untuk transaksi melalui aplikasi Paypro, menu UMB *123# ataupun melalui aplikasi myIM3.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback yang diberikan maksimal Rp 20.000 per transaksi.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback di Alfamart dan Indomaret hanya berlaku untuk pembelian barang; tidak berlaku untuk transaksi lainnya; seperti pulsa, token PLN, kirim uang dan lainnya. </td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Pelanggan hanya dapat menikmati cashback 1x per hari dan 3x selama periode promo. </td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Periode promo adalah 25 Mei – 30 Juni 2017.</td>
								</tr>
								
							</table>
							<p class="text-grey"><strong>Syarat dan Ketentuan Promo Pembelian Token PLN</strong></p>
							<table>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback berlaku untuk transaksi melalui aplikasi Paypro, menu UMB *123# ataupun melalui aplikasi myIM3.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Cashback yang diberikan maksimal Rp 20.000 per transaksi.</td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Pelanggan hanya dapat menikmati cashback 1x per hari dan 3x per minggu. </td>
								</tr>
								<tr>
									<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
									<td>Periode promo adalah 25 Mei – 30 Juni 2017.</td>
								</tr>
							</table>
						</article>
					</div>
				</section>
			</div>
			<!-- End Accordion FAQ Sticker -->
			
			<!-- START ACCRODION SERVICE TYPE -->
			<div class="main-serviceType ac-2" style="padding-top: 0;">
				<section id="single" data-accordion>
					<button data-control><h4 class="text-purple" style="margin: 0; padding: 0;">FAQ : PayPro Promo IM3 Ooredoo</h4></button>
					<div data-content>
						<article>
							<table style="width: 90% !important; margin-top: 0 !important;">
								<tr>
									<td rowspan="1"><strong><span class="text-purple mr-5 font-weight-900">1.</span> </strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong> Q :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;"><p><strong>Saya menggunakan produk IM3 Ooredoo, keuntungan apa yang didapatkan bagi saya jika 
 menggunakan layanan PayPro?</strong></p></td>
								</tr>
								<tr>
									<td></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong> A :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;">
										<p>Promo bagi kamu pelanggan IM3 Ooredoo adalah untuk transaksi sbb:</p>
										<table class="m-0">
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Beli token listrik Pra Bayar & Bayar tagihan listrik Paska Bayar</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Bayar BPJS Kesehatan</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Bayar belanja di Alfamart/ Indomaret</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>
													Transportasi
													<p>a. Isi saldo stiker PayPro untuk layanan transportasi Cummuterline</p>
													<p>b. Beli voucher GRAB</p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td rowspan="1"><strong><span class="text-purple mr-5 font-weight-900">2.</span> </strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong>Q :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;"><strong>Bagaimana ketentuan bagi pelanggan IM3 Ooredoo yang berhak mendapatkan cashback 
20% ?</strong></td>
								</tr>
								<tr>
									<td></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong> A :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;">
										<p>Berikut ketentuannya :</p>
										<table class="m-0">
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Cashback hanya berlaku jika akses melalui aplikasi PayPro, UMB *123*4# atau aplikasi My IM3</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Cashback diberikan maksimal Rp 50,000 per transaksi</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Maximal 3 transaksi yang mendapatkan cashback dalam sehari</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-check" aria-hidden="true"></i></td>
												<td>Periode promo berlaku selama 1 bulan dari 25 April – 24 May 2017</td>
											</tr>
										</table>
										<p class="text-grey"><strong>Contoh A:</strong></p>
										<table class="m-0">
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 1] Pelanggan membeli token PLN senilai Rp 250,000 (cashback-1 20% = Rp 50,000).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 2] Pelanggan belanja di Alfamart senilai Rp 250,000 (cashback-2 20% = Rp 50,000).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 3] Pelanggan membayar tagihan BPJS senilai Rp 250,000 (cashback-3 20% = Rp 50,000).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>Total cashback yang di dapatkan adalah Rp 150,000.</td>
											</tr>
										</table>
										<p class="text-grey"><strong>Contoh B:</strong></p>
										<table class="m-0">
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 1] Pelanggan Isi saldo stiker PayPro senilai Rp 100,000 (cashback-1 20% = Rp 20,000).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 2] Pelanggan membeli token PLN senilai Rp 200,000 (cashback-2 20% = Rp 40,000).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>[Transaksi 3] Pelanggan membayar BPJS Kesehatan senilai Rp 300,000. (cashback-3 max = Rp 50,000 *karena batas maksimal per transaksi).</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>Total cashback yang di dapatkan pelanggan adalah Rp 110,000. Pelanggan juga akan mendapat tambahan cashback Rp 20,000 (jika isi saldo stiker pertama)</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td rowspan="1"><strong><span class="text-purple mr-5 font-weight-900">3.</span> </strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;width: 30px;"><strong>Q :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;"><strong>Bagaimana ketentuan bagi pelanggan IM3 Ooredoo yang berhak mendapatkan 20rb 
 cashback stiker PayPro ? </strong></td>
								</tr>
								<tr>
									<td></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;width: 30px;"><strong> A :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;">Cashback Rp 20,000 diberikan kalau kamu isi saldo stiker PayPro pertama kali melalui UMB *123*4# atau melalui aplikasi My IM3</td>
								</tr>
								<tr>
									<td rowspan="1"><strong><span class="text-purple mr-5 font-weight-900">4.</span> </strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong>Q :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;"><strong>Bagaimana cara mendapatkan cashback 20% bagi pelanggan IM3 Ooredoo?</strong></td>
								</tr>
								<tr>
									<td></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong> A :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;">
										<p class="text-grey"><strong>Contoh :</strong></p>
										<p>Pelanggan membayar belanjaan di Alfamart senilai Rp 100,000, maka saldo pelanggan harus mencukupi senilai nominal Rp 100,000 untuk transaksi pembayaran tersebut. Namun akan dikembalikan sejumlah Rp 20,000 ke saldo PayPro pelanggan setalah transaksi berhasil</p>
									</td>
								</tr>
								<tr>
									<td rowspan="1"><strong><span class="text-purple mr-5 font-weight-900">5.</span> </strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong>Q :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;"><strong>Berapa nominal minimal belanja di Alfamart/ Indomaret?</strong></td>
								</tr>
								<tr>
									<td></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0; width: 30px;"><strong> A :</strong></td>
									<td style="padding-top: 0; padding-bottom: 0; line-height: 0;">
										Minimum belanja menggunakan layanan PayPro adalah
										<table class="m-0">
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>Alfamart : Rp 20,000</td>
											</tr>
											<tr>
												<td style="width: 10px;"><i class="fa fa-circle" aria-hidden="true"></i></td>
												<td>Indomaret : Rp 25,000</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</article>
					</div>
				</section>
			</div>
			<!-- End Accordion FAQ Sticker -->
			
		</div>
		
      </div>
    </div>

  </article>

</main>

      
<footer class="site-footer js-app-footer">

	<div class="footer-up pb-60">
		<h2 class="text-center text-white">Promo khusus untuk pelanggan IM3 Ooredeoo, <br>Download PayPro sekarang</h2>
		<div class="row text-center mt-60">
			<div class="column large-4 small-12">
				<h5 class="text-white mb-20">Transportasi</h5>
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-commuter.jpg">
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-grab.jpg">
			</div>
			<div class="column large-4 small-12">
				<h5 class="text-white mb-20">Belanja Harian</h5>
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-alfamart.jpg">
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-indomaret.jpg">
			</div>
			<div class="column large-4 small-12">
				<h5 class="text-white mb-20">Bayar Tagihan</h5>
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-bpjs.jpg">
				<img class="mb-10" src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/logo-pln.jpg">
			</div>
		</div>
		<div class="row text-center mt-60">
			<div class="column large-6 small-12">
				<h5 class="text-white mb-20">Top up tarik tunai</h5>
				<img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/icon-tarik-tunai.png">
			</div>
			<div class="column large-6 small-12">
				<h5 class="text-white mb-20">Transfer uang</h5>
				<img src="<?php echo base_url();?>assets/files/templates/riiot/public/assets/images/promo/icon-transfer.png">
			</div>
		</div>
	</div>

	<?php $this->load->view("footer");?>
</footer>

  </div>
    <script type="application/javascript" src="http://www.riiotlabs.com/files/templates/riiot/public/js/main.js"></script>

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


</body>
</html>
