<?php
    class Template{
        protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
        $this->_ci->load->model('model_notif');
    }
    
  function utama($content,$data=NULL){
        $data['headernya'] = $this->_ci->load->view('template/head', $data, TRUE);
        $data['topbarnya'] = $this->_ci->load->view('template/topbar', $data, TRUE);
        $data['sidebarnya'] = $this->_ci->load->view('template/sidebar', $data, TRUE);
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);
        $data['jsnya'] = $this->_ci->load->view('template/js', $data, TRUE);
        $data['footnya'] = $this->_ci->load->view('template/foot', $data, TRUE);
        $data['jnotif']	= $this->_ci->model_notif->jum_notif();
        $data['getnotif']	= $this->_ci->model_notif->get_notif();
        $this->_ci->load->view('template', $data);
    }


}
