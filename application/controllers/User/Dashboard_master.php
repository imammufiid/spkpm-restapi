<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_master extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if($isLogin) {
            $this->load->model('User/M_dashboard_master','m');
        } else {
            redirect('portal');
        }
    }

    public function index() {
        $data["Nav"] = "DASHBOARD";
        $data["Title"] = "DASHBOARD MASTER";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "user/v_dashboard_master",
            'js' => 'user/js/js_dashboard_master'
        );
        $data["Breadcrumb"] = array(
            'User',
            'Dashboard Master'
        );
        $this->load->view('v_main', $data);
    }

}