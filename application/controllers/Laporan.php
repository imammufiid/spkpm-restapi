<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_faktor','m');
        // $isLogin = $this->session->userdata('LoggedIn');
        // if($isLogin) {
        // } else {
        //     redirect('portal');
        // }
    }

    public function index() {
        $data["Nav"] = "MASTER";
        $data["Title"] = "LAPORAN";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_laporan",
            'js' => 'js/js_page_faktor'
        );
        $data["Breadcrumb"] = array(
            'Faktor'
        );
        $data["Rekomendasi"] = $this->m->get_rekomendasi();
        $data["Kriteria"] = $this->m->get_kriteria();
        $data["User"] = $this->m->get_user();
        $this->load->view('v_main', $data);
    }

    function array_flatten($array) { 
        
    }

}