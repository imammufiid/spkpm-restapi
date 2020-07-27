<?php defined('BASEPATH') or exit('No direct script access allowed');
class Subkriteria extends CI_Controller
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

  public function getsubkriteria($kriteria = '')
  {
    $this->db->select('subkriteria_id, kriteria_id, kriteria_nama, subkriteria_kode, subkriteria_nama, subkriteria_keterangan');
    $this->db->where('kriteria_id', $kriteria);
    $this->db->from('v_subkriteria');
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function getAllSubkriteria()
  {
    $this->db->select('subkriteria_id, kriteria_id, kriteria_nama, subkriteria_kode, subkriteria_nama, subkriteria_keterangan');
    $this->db->from('v_subkriteria');
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function generate_kode()
  {
    $subkriteria = "ak_data_subkriteria";
    $total_rows = $this->db->where($subkriteria . '.deleted', FALSE)
      ->get($subkriteria)->num_rows();
    $kode = "SK-" . str_pad($total_rows + 1, 2, "0", STR_PAD_LEFT);
    $response = [
      'status' => 200,
      'message' => "This code!",
      'result' => $kode
    ];
    echo json_encode($response);
  }

  public function addSubkriteria()
  {
    $kode = $this->input->post('subkriteria_kode');
    $kriteria = $this->input->post('kriteria_id');
    $subkriteria = $this->input->post('subkriteria_nama');
    $keterangan = $this->input->post('subkriteria_keterangan');

    $data = [
      'kriteria_id' => $kriteria,
      'subkriteria_nama' => $subkriteria,
      'subkriteria_kode' => $kode,
      'subkriteria_keterangan' => $keterangan,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_subkriteria', $data);
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

  public function deletesubkriteria()
  {
    $subkriteria_id = $this->input->post("subkriteria_id");
    $data = [
      'subkriteria_id' => $subkriteria_id
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_subkriteria");
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

  public function updateSubkriteria()
  {
    $subkriteria_id = $this->input->post('subkriteria_id');
    $kriteria = $this->input->post('kriteria_id');
    $subkriteria = $this->input->post('subkriteria_nama');
    $keterangan = $this->input->post('subkriteria_keterangan');
    $data = [
      'subkriteria_id' => $subkriteria_id,
      'kriteria_id' => $kriteria,
      'subkriteria_nama' => $subkriteria,
      'subkriteria_keterangan' => $keterangan,
      'updated_date' => date('Y-m-d H:i:s')
    ];
    $this->db->where('subkriteria_id', $subkriteria_id);
    $this->db->update("ak_data_subkriteria", $data);
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
