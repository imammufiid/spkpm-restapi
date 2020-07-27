<?php defined('BASEPATH') or exit('No direct script access allowed');
class SiswaNilai extends CI_Controller
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

  public function getSiswaNilai($user_id = 0)
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

  public function addSiswaNilai()
  {
    $subkriteria_id = $this->input->post('subkriteria_id');
    $siswa_nilai = $this->input->post('siswa_nilai');
    $user_id = $this->input->post("user_id");
    $data = [
      'subkriteria_id' => $subkriteria_id,
      'siswa_nilai' => $siswa_nilai,
      'user_id' => $user_id,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_siswa_nilai', $data);
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

  public function deleteSiswaNilai()
  {
    $nilai_id = $this->input->post("nilai_id");
    $data = [
      'nilai_id' => $nilai_id
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_siswa_nilai");
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

  public function updateSiswaNilai()
  {
    $nilai_id = $this->input->post("nilai_id");
    $subkriteria_id = $this->input->post('subkriteria_id');
    $siswa_nilai = $this->input->post('siswa_nilai');
    $user_id = $this->input->post("user_id");
    $data = [
      'subkriteria_id' => $subkriteria_id,
      'siswa_nilai' => $siswa_nilai,
      'user_id' => $user_id,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $this->db->where('nilai_id', $nilai_id);
    $this->db->update("ak_data_siswa_nilai", $data);
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
