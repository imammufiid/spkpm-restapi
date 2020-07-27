<?php defined('BASEPATH') or exit('No direct script access allowed');
class NilaiGap extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_bobot_gap', 'm');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  }

  public function index()
  {
    echo "tes";
  }

  public function getNilaiGap($user_id = 0)
  {
    $this->db->select('*');
    $this->db->where("user_id", $user_id);
    $this->db->from('v_siswa_nilai');
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }
}