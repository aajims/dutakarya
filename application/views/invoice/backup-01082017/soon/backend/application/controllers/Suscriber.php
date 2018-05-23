<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include './assets/PHPMailer_master/PHPMailerAutoload.php';

class Suscriber extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index()
	{
		if ( isset($_SESSION['users_id'])){
			$data['suscriber_list'] = $this->mainmodel->getSuscriber();
			$this->load->view('suscriber_list',$data);
		}else{
			redirect("Login");
		}
	}

	public function Newsletter(){
		if ( isset($_SESSION['users_id'])){
			$data['newsletter_list'] = $this->mainmodel->getNewsletter();
			$this->load->view("Newsletter",$data);
		}else{
			redirect(base_url());
		}
	}

	public function Addnewsletter(){
		if ( isset($_SESSION['users_id'])){
			$data['newsletter_list'] = $this->mainmodel->getNewsletter();
			$this->load->view("addnewsletter",$data);
		}else{
			redirect(base_url());
		}
	}

	public function uploadFile(){
		if ( isset($_SESSION['users_id'])){
			$config['upload_path']   = './assets/dist/img/newsletter/';
	        $config['allowed_types'] = '|jpg|png';
	        $config['max_size']      = 1100;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('form_addnewsletter_images')){
		      	$data['status'] = "1";
				$data['error'] = "Gagal simpan data";
	        }else{
	        	$image_name = $this->upload->data('file_name');
	        	$html = "<span>".$image_name."</span><br>";
				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					
				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/panelpaypro/assets/dist/img/newsletter/". $image_name."' style='width:100px;height:100px;'/><br/>";
				$html .= "<br/>";
				$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreview('."'".$image_name."'".')">Delete</a>';		
	        	$data['status'] = "0";
				$data['html'] = $html;
				$data['img_name'] = $image_name;

	           /* $data = array('upload_data' => $this->upload->data());
	            $this->load->view('upload_success', $data);*/
	        }
        	echo json_encode($data); 

        }else{
			redirect(base_url());
		}  
	}

	public function saveNewsLetter(){
		if ( isset($_SESSION['users_id'])){
			$form_addnewsletter_url_images = $this->input->post("form_addnewsletter_url_images");
			$form_addnewsletter_title = $this->input->post("form_addnewsletter_title");
			$editor1 = $this->input->post("editor1");
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_newsletter(title,content,images,status,created_at)values('$form_addnewsletter_title','$editor1','$form_addnewsletter_url_images','P','$currdate')");
			redirect("Suscriber/Newsletter/");
		}else{
			redirect(base_url());
		}  
	}

	public function SendingNewsLetter($id){
		/* Setting SMTP Server */
		if ( isset($_SESSION['users_id'])){
			$newsletter_detail = $this->mainmodel->getNewsletterById($id);
			$qry_get_suscriber = $this->db->query("select * from table_suscriber where status ='A'");
			$run_get_suscriber = $qry_get_suscriber->result();
			$i=0;
			$html = "";
			foreach ( $run_get_suscriber as $data_suscriber ){
				$html = $this->mainmodel->getHtmlNewsLetter($newsletter_detail[0]->images,$newsletter_detail[0]->title,$newsletter_detail[0]->content);
		        $mail = new PHPMailer;
		        $mail->IsSMTP();
		        $mail->SMTPDebug = 2;
		        $mail->Debugoutput = 'html';
		        $mail->Host = 'smtp.gmail.com';
		        $mail->Port = 587;
		        $mail->SMTPSecure = 'tls';
		        $mail->SMTPAuth = true;
		        $mail->Username = MAIL_USERNAME;
		        $mail->Password = MAIL_PASSWORD;
		        $mail->Subject  =  MAIL_SUBJECT;
		        $mail->AddEmbeddedImage(base_url().'assets/dist/img/newsletter/logo_paypro.png', 'images_logo');
		        $mail->AddEmbeddedImage(base_url().'assets/dist/img/newsletter/'.$newsletter_detail[0]->images, 'images_');
		        $mail->AddEmbeddedImage(base_url().'assets/dist/img/newsletter/facebook.png', 'images_fb');
		        $mail->AddEmbeddedImage(base_url().'assets/dist/img/newsletter/twitter.png', 'images_tw');
		        $mail->setFrom(MAIL_SETFROM, MAIL_SETFROM_NAME);
		        $mail->addAddress($run_get_suscriber[$i]->email,"");
		        /* Setting SMTP Server*/ 
		        
		        $mail->msgHTML($html);
		        if (!$mail->send()) {
		            echo "Mailer Error: " . $mail->ErrorInfo;
		        } else {
		            echo "Message sent!";
		        }
		       	$i++;
	    	}
	    	$this->db->query("update table_newsletter set status ='S' where id ='$id'");
	    	redirect("Suscriber/Newsletter/");
    	}else{
			redirect(base_url());
		}  
	}

	public function PreviewNewsLetter($id){
		if ( isset($_SESSION['users_id'])){
			$data['newsletter_detail'] = $this->mainmodel->getNewsletterById($id);
			$this->load->view("preview_newsletter",$data);
		}else{
			redirect(base_url());
		}   
	}

	public function DownloadSuscriber(){
		if ( isset($_SESSION['users_id'])){
			$qry_get_suscriber = $this->mainmodel->getSuscriber();
			$filename = "List_Suscriber_".date("Y-m-d_H:i:s").".csv";

			// Fungsi header dengan mengirimkan raw data excel
			header("Content-type: application/vnd-ms-excel");
			 
			// Mendefinisikan nama file ekspor "hasil-export.xls"
			header("Content-Disposition: attachment; filename=$filename.xls");
		    header('Pragma: no-cache');
		    header('Expires: 0');
		   	echo "<table style='border:1px solid;'>";
		   	echo "<tr>";
		   	echo "<td>No.</td>";
		   	echo "<td>Email</td>";
		   	echo "</tr>";
		    $i=0;
		    foreach ($qry_get_suscriber as $data_suscriber ) {
		    	echo "<tr>";
		    	echo "<td>".($i+1)."</td>";
		    	echo "<td>".$qry_get_suscriber[$i]->email."</td>";
		    	echo "</tr>";
		    	$i++;    	
		    }
		    echo "</table>";
		    exit;
	    }else{
			redirect(base_url());
		}   
	}

}
