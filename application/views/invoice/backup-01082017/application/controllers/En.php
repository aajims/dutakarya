<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class en extends CI_Controller {

	public function index( $param = "" ){
		header("Location: http://paypro.en/Main/Setlanguage/en");
	}
	
	public function Howto($findmore = "", $idmore = "", $lang = "en"){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function Contact(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function Promo(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function Faq($promos){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function Cash(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function Sticker(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function terms_of_use(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	public function privacy_policy(){
		$_SESSION['lang_paypro'] = "en";
		$uri = str_replace("en/","",$_SERVER['REQUEST_URI']);
		header("Location: ".$uri);
	}
	
	
		
}
