<?php
	$image_name = str_replace(" ", "_", $_FILES['form_slider_photo']['name']); //file name
    $image_size = $_FILES['form_slider_photo']['size']; //file size
    $image_temp = $_FILES['form_slider_photo']['tmp_name']; //file temp	
	$image_size_info = getimagesize($image_temp);
	$array_format = array("image/jpeg");
	$target_path = "./assets/dist/img/slider/";
	
	$data=array(
		"status" => "",
		"html" => "",
		"img_name" => ""
	);
	
	if($image_size_info){
        $image_width        = $image_size_info[0]; //image width
        $image_height       = $image_size_info[1]; //image height
        $image_type         = $image_size_info['mime']; //image type
    }else{
		$data['status'] = "1";
	}
	$split_file = explode(".", $image_name);
	if ( in_array($image_type,$array_format )){		
		//$new_image_name = str_replace(" ", "_", $_FILES['allowance_docfile']['name']);			
		$status = move_uploaded_file( $_FILES['form_slider_photo']['tmp_name'], $target_path ."/". $image_name  ) ;
		if ( $status ){
			$html = "<span>".$image_name."</span><br>";
			$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					
			$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/panelpaypro/assets/dist/img/slider/". $image_name."' style='width:100px;height:100px;'/><br/>";
			$html .= "<br/>";
			$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreview('."'".$image_name."'".')">Delete</a>';				
			$data['status'] = "0";
			$data['html'] = $html;
			$data['img_name'] = $image_name;
		}else{
			$data['status'] = "1";
			$data['error'] = "Gagal simpan data";
		}

	}else{
		$data['status'] = "1";
		$data['error'] = "Harap upload file bertype img";
	}
	
	$data = json_encode($data);
	echo $data;
?>