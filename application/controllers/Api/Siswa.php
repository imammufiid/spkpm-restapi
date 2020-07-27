<?php defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends CI_Controller
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

  public function getSiswa()
  {
    $this->db->select('user_id, level_id, user_kode, user_nama, user_login, user_email, user_jurusan, user_tahun_angkatan, user_jenis_kelamin, user_tempat_lahir, user_tanggal_lahir, user_alamat, user_nomor_telepon');
    $this->db->from('ak_data_system_user');
    $this->db->where('level_id', 4);
    $result = $this->db->get()->result_array();
    $data = [
      'status' => 200,
      'message' => "This data",
      'result' => $result
    ];
    echo json_encode($data);
  }

  public function addSiswa()
  {
    // $user_id = $this->input->post('user_id');
    //$level_id = $this->input->post('level_id');
    $user_nama = $this->input->post('user_nama');
    $user_email = $this->input->post('user_email');
    $user_jurusan = $this->input->post('user_jurusan');
    $password = password_hash($user_nama, PASSWORD_BCRYPT);
    $data = [
      'level_id' => 4,
      'user_nama' => $user_nama,
      'user_email' => $user_email,
      'user_login' => time(),
      'user_jurusan' => $user_jurusan,
      'user_pass' => $password,
      'created_date' => date('Y-m-d H:i:s')
    ];
    $result = $this->db->insert('ak_data_system_user', $data);
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

  public function deleteSiswa()
  {
    $user_id = $this->input->post("user_id");
    $data = [
      'user_id' => $user_id,
    ];
    $this->db->where($data);
    $this->db->delete("ak_data_system_user");
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

  public function updateSiswa()
  {
    $user_id = $this->input->post('user_id');
    $user_nama = $this->input->post('user_nama');
    $user_email = $this->input->post('user_email');
    $user_jurusan = $this->input->post('user_jurusan');
    $data = [
      'user_nama' => $user_nama,
      'user_email' => $user_email,
      'user_jurusan' => $user_jurusan,
      'updated_date' => date('Y-m-d H:i:s')
    ];
    $this->db->where('user_id', $user_id);
    $this->db->update("ak_data_system_user", $data);
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
