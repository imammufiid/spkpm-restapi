<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kriteria extends CI_Controller
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

  public function getKriteria()
  {
    $this->db->select('kriteria_id, project_id, kriteria_nama');
    $this->db->from('ak_data_kriteria');
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function addKriteria()
  {
    $kriteria_nama = $this->input->post('kriteria_nama');
    $data = [
      'kriteria_nama' => $kriteria_nama,
      'project_id' => 1,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_kriteria', $data);
    if ($result) {
      $response = [
        'status' => 201,
        'message' => "Berhasil menambahkan data!"
      ];
    } else {
      $response = [
        'status' => 400,
        'message' => "Gagal menambahkan data!"
      ];
    }

    echo json_encode($response);
  }

  public function deleteKriteria()
  {
    $kriteria_id = $this->input->post("kriteria_id");
    $data = [
      'kriteria_id' => $kriteria_id
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_kriteria");
    $result = $this->db->affected_rows();
    if ($result) {
      $response = [
        'status' => 201,
        'message' => "Berhasil menghapus data!"
      ];
    } else {
      $response = [
        'status' => 400,
        'message' => "Gagal menghapus data!"
      ];
    }

    echo json_encode($response);
  }

  public function updateKriteria()
  {
    $kriteria_id = $this->input->post('kriteria_id');
    $kriteria_nama = $this->input->post('kriteria_nama');
    $data = [
      "kriteria_nama" => $kriteria_nama
    ];
    $this->db->where('kriteria_id', $kriteria_id);
    $this->db->update("ak_data_kriteria", $data);
    $result = $this->db->affected_rows();
    if ($result) {
      $response = [
        'status' => 201,
        'message' => "Berhasil mengubah data!"
      ];
    } else {
      $response = [
        'status' => 400,
        'message' => "Gagal mengubah data!"
      ];
    }

    echo json_encode($response);
  }
}
