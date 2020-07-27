<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Portal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $isLogin = $this->session->userdata('LoggedIn');
        if(!$isLogin) {
            $this->load->model('M_Portal','m');
        } else {
            redirect('user/dashboard_master');
        }
    }

    public function index() {
        $data["Title"] = "PORTAL";
        $data["Template"] = "templates/public/";
        $data["Components"] = array(
            'main' => '/v_public',
            'header' => $data['Template'] . "/components/v_header",
            'content' => "v_portal"
        );
        $data['Info'] = $this->m->get_sysinfo();
        $this->load->view('v_main', $data);
    }

    public function proses_login() {
        $isValid = $this->m->cek_validasi();
        if ($isValid) {
            $data = $this->m->get_user();
            $session = array(
                'id' => $data->user_id,
                'kode' => $data->user_kode,
                'nama' => $data->user_nama,
                'level' => $data->level_nama,
                'AppInfo' => $this->m->get_sysinfo()->info_name,
                'LoggedIn' => TRUE
            );
            $this->session->set_userdata($session);
            $this->m->update_login();
            $pesan = array(
                'warning' => 'Akses diterima!',
                'kode' => 'success',
                'pesan' => 'Berhasil masuk ke dalam sistem!'
            );
        } else {
            $pesan = array(
                'warning' => 'Akses ditolak!',
                'kode' => 'error',
                'pesan' => 'Gagal masuk ke dalam sistem!'
            );
        }
        echo json_encode($pesan);
    }

}