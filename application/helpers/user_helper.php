<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user_data'))
{
	function get_user_data($id = null)
	{
		$CI = CI_Controller::get_instance();
		if (is_null($id))
		{
			$id = $CI->session->userdata('id_admin');
		}
		return $CI->model_profil->get_id($id);
	}
}

if ( ! function_exists('get_user_photo')) {
	function get_user_photo($id = null)
	{
		return base_url('Admin/images/staff/'.get_user_data($id)->foto);
	}
}

if ( ! function_exists('is_login'))
{
	function is_login()
	{
		return CI_Controller::get_instance()->session->has_userdata('id_admin');
	}
}
