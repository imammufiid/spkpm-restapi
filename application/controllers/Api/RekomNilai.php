<?php defined('BASEPATH') or exit('No direct script access allowed');
class RekomNilai extends CI_Controller
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

  public function getRekomNilai($kriteria_id = 0)
  {
    $this->db->select('*');
    $this->db->from('v_rekomendasi_nilai');
    $this->db->where('kriteria_id', $kriteria_id);
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function addRekomNilai()
  {
    $kriteria_id = $this->input->post('kriteria_id');
    $subkriteria_id = $this->input->post('subkriteria_id');
    $rekomendasi_id = $this->input->post('rekomendasi_id');
    $rekomendasi_nilai_bobot = $this->input->post('rekomendasi_nilai_bobot');
    $data = [
      'kriteria_id' => $kriteria_id,
      'subkriteria_id' => $subkriteria_id,
      'rekomendasi_id' => $rekomendasi_id,
      'rekomendasi_nilai_bobot' => $rekomendasi_nilai_bobot,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_rekomendasi_nilai', $data);
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

  public function deleteRekomNilai()
  {
    $rekomendasi_nilai_id = $this->input->post("rekomendasi_nilai_id");
    $data = [
      'rekomendasi_nilai_id' => $rekomendasi_nilai_id
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_rekomendasi_nilai");
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

  public function updateRekomNilai()
  {
    $rekomendasi_nilai_id = $this->input->post('rekomendasi_nilai_id');
    $kriteria_id = $this->input->post('kriteria_id');
    $subkriteria_id = $this->input->post('subkriteria_id');
    $rekomendasi_id = $this->input->post('rekomendasi_id');
    $rekomendasi_nilai_bobot = $this->input->post('rekomendasi_nilai_bobot');
    $data = [
      'kriteria_id' => $kriteria_id,
      'subkriteria_id' => $subkriteria_id,
      'rekomendasi_id' => $rekomendasi_id,
      'rekomendasi_nilai_bobot' => $rekomendasi_nilai_bobot,
      'updated_date' => date('Y-m-d H:i:s')
    ];
    $this->db->where('rekomendasi_nilai_id', $rekomendasi_nilai_id);
    $this->db->update("ak_data_rekomendasi_nilai", $data);
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
