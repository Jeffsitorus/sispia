<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AuthModel','auth');
    $this->load->library('upload');
    user_admin();
  }

  public function index()
  {
    $data['alumni']   = $this->db->count_all_results('siswa');
    $data['akademik'] = $this->db->count_all_results('akademik');
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('admin/index', $data);
  }

  public function user()
  {
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['users']    = $this->auth->getUser();
    $this->load->view('user/index', $data);
  }

  public function tambahUser()
  {
    $this->_rules();
    if($this->form_validation->run() == false) {
      $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('user/create-user', $data);
    } else {
      if($_FILES['foto']['name']) {
        $config['upload_path']    = './assets/img/upload/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = '1024';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('error_upload',$error);
          $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
          $this->load->view('user/create-user', $data);
        } else {
          $data       = array('upload_data' => $this->upload->data());
          $nama       = htmlspecialchars($this->input->post('nama'));
          $email      = htmlspecialchars($this->input->post('email'));
          $username   = htmlspecialchars($this->input->post('username'));
          $password   = md5($this->input->post('password'));
          $telepon    = $this->input->post('no_hp');
          $data   = [
            'nama'      => $nama,
            'email'     => $email,
            'username'  => $username,
            'password'  => $password,
            'no_hp'     => $telepon,
            'foto'      => $data['upload_data']['file_name'],
            'role_id'   => 2,
          ];
          $this->auth->insertUser($data);
          $this->session->set_flashdata('success','Data user berhasil ditambahkan!');
          redirect('admin/user','refresh');
        }
      } else {
        $nama       = htmlspecialchars($this->input->post('nama'));
        $username   = htmlspecialchars($this->input->post('username'));
        $password   = md5($this->input->post('password'));
        $nama       = htmlspecialchars($this->input->post('nama'));
        $email      = htmlspecialchars($this->input->post('email'));
        $username   = htmlspecialchars($this->input->post('username'));
        $password   = md5($this->input->post('password'));
        $telepon    = $this->input->post('no_hp');
        $data   = [
          'nama'      => $nama,
          'email'     => $email,
          'username'  => $username,
          'password'  => $password,
          'no_hp'     => $telepon,
          'role_id'   => 2,
        ];
        $this->auth->insertUser($data);
        $this->session->set_flashdata('success', 'Data user berhasil ditambahkan!');
        redirect('admin/user', 'refresh');
      }
    }
  }

  public function hapusUser()
  {
    $id   = $this->input->post('id_user');
    $this->auth->deleteUser($id);
    $this->session->set_flashdata('success','Data user berhasil dihapus!');
    redirect('admin/user','refresh');
  }

  public function role()
  {
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['roles'] = $this->auth->getRole();
    $this->load->view('user/role', $data);
  }

  public function tambahRole()
  {
    $nama_role  = htmlspecialchars($this->input->post('nama_role'));
    $data = [
      'nama_role' => $nama_role,
    ];
    $this->auth->insertRole($data);
    $this->session->set_flashdata('success','Role berhasil ditambahkan!');
    redirect('admin/role','refresh');
  }

  public function hapusRole()
  {
    $id   = $this->input->post('id');
    $this->auth->deleteRole($id);
    $this->session->set_flashdata('success', 'Role berhasil dihapus!');
    redirect('admin/role', 'refresh');
  }

  public function profil()
  {
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('admin/profil', $data);
  }

  function ubahpassword()
  {
    $this->form_validation->set_rules('password', 'password', 'trim|required', [
      'required'    => 'Password lama tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('password1', 'password baru', 'trim|required|min_length[4]|max_length[8]', [
      'required'    => 'Password lama tidak boleh kosong',
      'min_length'  => 'Minimal 4 karakter',
      'max_length'  => 'Maksimal 8 karakter',
    ]);
    $this->form_validation->set_rules('password2', 'ulangi password', 'trim|required|matches[password1]', [
      'required'    => 'Ulangi password tidak boleh kosong',
      'matches'     => 'Konfirmasi password tidak cocok.'
    ]);
    if ($this->form_validation->run() == false) {
      $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('admin/ubah-password', $data);
    } else {
      $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $pass_lama    = md5($this->input->post('password', true));
      $pass_baru    = md5($this->input->post('password1', true));
      if ($data['user']['password'] != $pass_lama) {
        $this->session->set_flashdata('error', 'Password salah.');
        redirect('admin/ubahpassword', 'refresh');
      } else {
        if ($pass_lama == $pass_baru) {
          $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama.');
          redirect('admin/ubahpassword', 'refresh');
        } else {
          $this->db->set('password', $pass_baru);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $this->db->update('users');
          $this->session->set_flashdata('success', 'Password berhasil diubah.');
          redirect('admin/ubahpassword', 'refresh');
        }
      }
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required',[
      'required'    => 'Field nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',[
      'required'    => 'Field email tidak boleh kosong!',
      'valid_email' => 'Format email tidak benar',
    ]);
    $this->form_validation->set_rules('username', 'username', 'trim|required',[
      'required'    => 'Username harus diisi!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]', [
      'required'    => 'Password harus diisi',
      'min_length'  => 'Password minimal 4 karakter',
    ]);
    $this->form_validation->set_rules('password2', 'konfirmasi password', 'trim|required|matches[password]', [
      'required'    => 'Konfirmasi password tidak boleh kosong!',
      'matches'     => 'password tidak sama!',
    ]);
    $this->form_validation->set_rules('no_hp', 'no telepon', 'trim|required|max_length[12]|numeric',[
      'numeric'     => 'No telepon hanya angka.',
      'required'    => 'No telepon harus diisi',
      'max_length'  => 'No telepon maskimal 12 angka',
    ]); 
  }

  public function edit_profil()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
      'required'  => 'Nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('username', 'username', 'trim|required', [
      'required'  => 'Username tidak boleh kosong!',
    ]);
    if ($this->form_validation->run() == false) {
      $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('admin/edit_profil', $data);
    } else {
      $gambar     = $_FILES['foto']['name'];
      if ($gambar) {
        $config['upload_path']      = './assets/img/upload/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '1024';
        $config['file_name']        = 'img_' . date('Y-m-d');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
          $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          redirect('admin/edit_profil', 'refresh');
        } else {
          $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
          if ($data['user']['foto'] != 'default.jpg') {
            unlink(FCPATH . './assets/img/upload/' . $data['user']['foto']);
          }
          $upload = array('upload_data' => $this->upload->data());
          $data   = [
            'nama'          => htmlspecialchars($this->input->post('nama')),
            'email'         => $this->input->post('email'),
            'username'      => htmlspecialchars($this->input->post('username')),
            'no_hp'         => htmlspecialchars($this->input->post('no_hp')),
            'foto'          => $upload['upload_data']['file_name'],
          ];
          $this->db->set($data);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $this->db->update('users');
          $this->session->set_flashdata('success', 'Profil berhasil diubah!');
          redirect('admin/edit_profil', 'refresh');
        }
      } else {
        $data   = [
          'nama'          => htmlspecialchars($this->input->post('nama')),
          'email'         => $this->input->post('email'),
          'username'      => htmlspecialchars($this->input->post('username')),
          'no_hp'         => htmlspecialchars($this->input->post('no_hp')),
        ];
        $this->db->set($data);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users');
        $this->session->set_flashdata('success', 'Profil berhasil diubah!');
        redirect('admin/edit_profil', 'refresh');
      }
    }
  }
}
/* End of file admin.php */