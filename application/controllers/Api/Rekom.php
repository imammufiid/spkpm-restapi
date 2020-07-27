<?php defined('BASEPATH') or exit('No direct script access allowed');
class Rekom extends CI_Controller
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

  public function getRekom()
  {
    $this->db->select('rekomendasi_id, rekomendasi_kode');
    $this->db->from('ak_data_rekomendasi');
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function addRekom()
  {
    $rekom = $this->input->post('rekomendasi_kode');
    $data = [
      'rekomendasi_kode' => $rekom,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_rekomendasi', $data);
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

  public function deleteRekom()
  {
    $rekomendasi_id = $this->input->post("rekomendasi_id");
    $data = [
      'rekomendasi_id' => $rekomendasi_id
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_rekomendasi");
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

  public function updateRekom()
  {
    $rekomendasi_id = $this->input->post('rekomendasi_id');
    $rekomendasi_kode = $this->input->post('rekomendasi_kode');
    $data = [
      "rekomendasi_kode" => $rekomendasi_kode
    ];
    $this->db->where('rekomendasi_id', $rekomendasi_id);
    $this->db->update("ak_data_rekomendasi", $data);
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