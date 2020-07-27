<?php defined('BASEPATH') or exit('No direct script access allowed');
class Api extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_bobot_gap', 'm');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  }

  public function getKriteria()
  {
    $this->db->select('kriteria_id, project_id, kriteria_nama');
    $this->db->from('ak_data_kriteria');
    $result = $this->db->get()->result_array();
    // $result = $this->db->get('ak_data_kriteria')->result();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }
  public function getSubKriteria()
  {
    $result = $this->db->get('ak_data_subkriteria')->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getRekomendasi()
  {
    $result = $this->db->get('ak_data_rekomendasi')->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getRekomendasiNilai()
  {
    $result = $this->db->get('ak_data_rekomendasi_nilai')->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getBobotNilai()
  {
    $result = $this->db->get('ak_data_bobot')->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getSiswa()
  {
    $result = $this->db->get_where('ak_data_system_user', ['level_id' => 4])->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getSiswaById()
  {
    $user_id = $this->input->post('id');
    $result = $this->db->get_where('ak_data_system_user', ['user_id' => $user_id])->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }

  public function getSiswaNilai()
  {
    $user_id = $this->input->post('id');
    $result = $this->db->get_where('ak_data_siswa_nilai', ['user_id' => $user_id])->result();
    if ($result != null) {
      $data = [
        'status' => 200,
        'message' => "This data",
        'result' => $result
      ];
    } else {
      $data = [
        'status' => 400,
        'message' => "This data empty"
      ];
    }
    echo json_encode($data);
  }
}
