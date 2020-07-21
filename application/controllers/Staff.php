<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'auth');
        $this->load->library('upload');
        user_staff();
    }

    public function index()
    {
        $data['alumni']   = $this->db->count_all_results('siswa');
        $data['akademik'] = $this->db->count_all_results('akademik');
        $data['user']    = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('admin/index', $data);
    }

    public function profil()
    {
        $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('staff/profil', $data);
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
            $this->load->view('staff/ubah-password', $data);
        } else {
            $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $pass_lama    = md5($this->input->post('password', true));
            $pass_baru    = md5($this->input->post('password1', true));
            if ($data['user']['password'] != $pass_lama) {
                $this->session->set_flashdata('error', 'Password salah.');
                redirect('staff/ubahpassword', 'refresh');
            } else {
                if ($pass_lama == $pass_baru) {
                    $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama.');
                    redirect('staff/ubahpassword', 'refresh');
                } else {
                    $this->db->set('password', $pass_baru);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('users');
                    $this->session->set_flashdata('success', 'Password berhasil diubah.');
                    redirect('staff/ubahpassword', 'refresh');
                }
            }
        }
    }

    public function edit_profil()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required'  => 'Nama tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'  => 'Username tidak boleh kosong!',
        ]);
        if($this->form_validation->run() == false) {
            $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $this->load->view('staff/edit_profil',$data);
        } else {
            $gambar     = $_FILES['foto']['name'];
            if ($gambar) {
                $config['upload_path']      = './assets/img/upload/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '1024';
                $config['file_name']        = 'img_'. date('Y-m-d');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')){
                    $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('staff/edit_profil','refresh');
                } else{
                    $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
                    if($data['user']['foto'] != 'default.jpg') {
                        unlink(FCPATH . './assets/img/upload/'. $data['user']['foto']);
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
                    redirect('staff/edit_profil', 'refresh');
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
                $this->session->set_flashdata('success','Profil berhasil diubah!');
                redirect('staff/edit_profil','refresh');
            }
        }
    }
}
/* End of file staff.php */