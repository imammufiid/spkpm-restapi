<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Nilai_gap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_nilai_gap','m');
        // $isLogin = $this->session->userdata('LoggedIn');
        // if($isLogin) {
        //     
        // } else {
        //     redirect('portal');
        // }
    }

    public function index() {
        $data["Nav"] = "PERHITUNGAN";
        $data["Title"] = "NILAI GAP";
        $data["Template"] = "templates/private";
        $data["Components"] = array(
            'main' => '/v_private',
            'header' => $data['Template'] . "/components/v_header",
            'navbar' => $data['Template'] . "/components/v_navbar",
            'sidebar' => $data['Template'] . "/components/v_sidebar",
            'heading' => $data['Template'] . "/components/v_heading",
            'content' => "v_nilai_gap",
            'js' => 'js/js_page_nilai_gap'
        );
        $data["Breadcrumb"] = array(
            'Nilai Gap'
        );
        // $tess = $this->m->get_nilai(4, 1);
        // var_dump($tess);die();
        $data["Rekomendasi"] = $this->m->get_rekomendasi();
        $data["Kriteria"] = $this->m->get_kriteria();
        $data["User"] = $this->m->get_user();
        $this->load->view('v_main', $data);
    }

    public function list_data()
    {
        $list = $this->m->list_data();
        $datatb = array();
        $no = 0;
        foreach ($list as $data) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $data->pembelian_kode;
            $row[] = $data->pembelian_tanggal;
            $row[] = $data->pembelian_pembayaran;
            $row[] = $data->pembelian_diskon;
            $row[] = $data->pembelian_grandtotal;

            $datatb[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "data" => $datatb
        );
        echo json_encode($output);
    }

}