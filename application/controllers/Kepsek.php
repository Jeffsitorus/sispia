<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kepsek extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
  }

  public function index()
  {
    $data['kepsek'] = $this->app->getKepsek();
    $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('kepsek/index', $data);
  }

  public function tambah()
  {
    $this->_rules();
    if($this->form_validation->run() == false) {
      $data['akademik'] = $this->app->getAkademik();
      $data['kepsek']   = $this->app->getKepsek();
      $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('kepsek/create-kepsek', $data);
    } else {
      $nip            = htmlspecialchars($this->input->post('nip'));
      $nama_kepsek    = htmlspecialchars($this->input->post('nama_kepsek'));
      $jenis_kelamin  = htmlspecialchars($this->input->post('jenis_kelamin'));
      $jabatan        = htmlspecialchars($this->input->post('jabatan'));
      $no_hp          = htmlspecialchars($this->input->post('no_hp'));
      $akademik_id    = $this->input->post('akademik_id');
      $data   = [
        'nip'           => $nip,
        'nama_kepsek'   => $nama_kepsek,
        'jenis_kelamin' => $jenis_kelamin,
        'jabatan'       => $jabatan,
        'no_hp'         => $no_hp,
        'akademik_id'   => $akademik_id,
      ];
      $this->app->insertKepsek($data);
      $this->session->set_flashdata('success','Data kepala sekolah berhasil ditambahkan!');
      redirect('kepsek','refresh');
    }
  }

  public function edit($id)
  {
    $this->_rules();
    if($this->form_validation->run() == false) {
      $data['akademik'] = $this->app->getAkademik();
      $data['kepsek'] = $this->app->getIdKepsek($id);
      $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('kepsek/edit-kepsek', $data);
    } else {
      $nip            = htmlspecialchars($this->input->post('nip'));
      $nama_kepsek    = htmlspecialchars($this->input->post('nama_kepsek'));
      $jenis_kelamin  = htmlspecialchars($this->input->post('jenis_kelamin'));
      $jabatan        = htmlspecialchars($this->input->post('jabatan'));
      $no_hp          = htmlspecialchars($this->input->post('no_hp'));
      $akademik_id    = $this->input->post('akademik_id');
      $data   = [
        'nip'     => $nip,
        'nama_kepsek'   => $nama_kepsek,
        'jenis_kelamin' => $jenis_kelamin,
        'jabatan'       => $jabatan,
        'no_hp'         => $no_hp,
        'akademik_id'   => $akademik_id,
      ];
      $row  = ['nip'  => $nip];
      $this->app->updateKepsek($row,$data);
      $this->session->set_flashdata('success','Data kepala sekolah berhasil diubah!');
      redirect('kepsek','refresh');
    }
  }

  public function hapus()
  {
    $id   = $this->input->post('nip');
    $this->app->deleteKepsek($id);
    $this->session->set_flashdata('success', 'Data kepala sekolah berhasil dihapus!');
    redirect('kepsek', 'refresh');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nip', 'NIP', 'trim|required', [
      'required'    => 'NIP tidak boleh dikosongkan',
    ]);
    $this->form_validation->set_rules('nama_kepsek', 'nama kepsek', 'trim|required', [
      'required'    => 'Nama kepsek tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required',[
      'required'    => 'Jenis kelamin harus dipilih',
    ]);
    $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required', [
      'required'    => 'Jabatan harus diisi!',
    ]);
    $this->form_validation->set_rules('akademik_id', 'tahun akademik', 'trim|required',[
      'required'    => 'Tahun akademik harus dipilih',
    ]);
    $this->form_validation->set_rules('no_hp', 'no telepon', 'trim|required|max_length[12]|numeric', [
      'required'    => 'No telepon tidak boleh kosong!',
      'numeric'     => 'No telepon hanya berupa angka',
      'max_length'  => 'No telepon maksimal 12 angka',
    ]);
  }
}
/* End of file kepsek.php */