<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AuthModel','auth');
    // if($this->session->userdata('username')) {
    //   redirect('admin');
    // }
  }
  
  public function index()
  {
    $this->load->view('auth/login');
  }

  public function login()
  {
    $this->_rules();
    if($this->form_validation->run() == false) {
      $this->index();
    } else {
      $username   = $this->input->post('username');
      $password   = md5($this->input->post('password'));
      $user       = $this->auth->checkUser($username, $password);
      if($user == true) {
        if($user['password'] != $password) {
          $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
          redirect('auth', 'refresh');
        } else {
          $data  = [
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'username'  => $user['username'],
            'role_id'   => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          if($user['role_id'] == 1) {
            redirect('admin','refresh');
          } else if($user['role_id'] == 2) {
            redirect('staff','refresh');
          }
        }
      } else {
        $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
        redirect('auth','refresh');
      }
    }
  }

  public function _rules() 
  {
    $this->form_validation->set_rules('username', 'username', 'trim|required',[
      'required'    => 'Username tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required',[
      'required'    => 'Password harus diisi!',
    ]);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('success','Anda telah logout');
    redirect('auth','refresh');
  }

  function blocked()
  {
    $data['judul'] = '404 | Maaf Halaman Yang Anda Tuju Tidak Ada';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/blocked');
    $this->load->view('templates/auth_footer');
  }
}
/* End of file auth.php */
