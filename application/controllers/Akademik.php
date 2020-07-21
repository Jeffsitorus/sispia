<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akademik extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
  }
  public function index()
  {
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['akademik'] = $this->app->getAkademik();
    $this->load->view('akademik/index', $data);
  }

  public function tambah()
  {
    $tahun_ak   = htmlspecialchars($this->input->post('tahun_ak'));
    $status     = htmlspecialchars($this->input->post('status'));
    $data = [
      'tahun_ak'    => $tahun_ak,
      'status'      => $status,
    ];
    $this->app->insertAkademik($data);
    $this->session->set_flashdata('success','Data akademik berhasil ditambah!');
    redirect('akademik','refresh');
  }

  public function update()
  {
    $id         = $this->input->post('id_akm');
    $tahun_ak   = htmlspecialchars($this->input->post('tahun_ak'));
    $status     = htmlspecialchars($this->input->post('status'));
    $data = [
      'tahun_ak'    => $tahun_ak,
      'status'      => $status,
    ];
    $row  = ['id_akm'   => $id];
    $this->app->updateAkademik($row, $data);
    $this->session->set_flashdata('success','Data akademik berhasil diubah!');
    redirect('akademik','refresh');
  }

  public function hapus()
  {
    $id   = $this->input->post('id_akm');
    $row  = ['id_akm'   => $id];
    $this->app->deleteAkademik($row);
    $this->session->set_flashdata('success', 'Data akademik berhasil dihapus!');
    redirect('akademik', 'refresh');
  }
}
/* End of file dashboard.php */