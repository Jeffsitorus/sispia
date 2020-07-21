<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alumni extends CI_Controller
{
  private $filename   = "import-data";
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->model('AppModel', 'app');
    $this->load->helper('download');
  }

  public function index()
  {
    $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['alumni'] = $this->app->getAlumni();
    $this->load->view('alumni/index', $data);
  }

  public function tambah()
  {
    $this->_rules();
    if ($this->form_validation->run() == false) {
      $data['akademik'] = $this->app->getAkademik();
      $data['kepsek']   = $this->app->getKepsek();
      $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('alumni/create-alumni', $data);
    } else {
      if ($_FILES['foto']['name']) {
        $config['upload_path']    = './assets/img/alumni/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = '1024';
        $config['file_name']      = 'img_' . date('Y-m-d');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['akademik'] = $this->app->getAkademik();
          $data['kepsek']   = $this->app->getKepsek();
          $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
          $this->load->view('alumni/create-alumni', $data);
        } else {
          $upload           = array('upload_data' => $this->upload->data());
          $nama           = htmlspecialchars($this->input->post('nama'));
          $nis            = htmlspecialchars($this->input->post('nis'));
          $nisn           = htmlspecialchars($this->input->post('nisn'));
          $jenis_kelamin  = $this->input->post('jenis_kelamin');
          $agama          = htmlspecialchars($this->input->post('agama'));
          $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
          $tanggal_lahir  = $this->input->post('tanggal_lahir');
          $no_hp          = htmlspecialchars($this->input->post('no_hp'));
          $alamat         = htmlspecialchars($this->input->post('alamat'));
          $angkatan       = htmlspecialchars($this->input->post('angkatan'));
          $kepsek_id      = $this->input->post('kepsek');
          $data = [
            'nis'           => $nis,
            'nisn'          => $nisn,
            'nama_siswa'    => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'agama'         => $agama,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp'         => $no_hp,
            'alamat'        => $alamat,
            'status'        => 0,
            'angkatan'      => $angkatan,
            'foto'          => $upload['upload_data']['file_name'],
            'kepsek_id'     => $kepsek_id,
          ];
          $this->app->insertAlumni($data);
          $this->session->set_flashdata('success', 'Data alumni berhasil disimpan');
          redirect('alumni', 'refresh');
        }
      } else {
        $nama           = htmlspecialchars($this->input->post('nama'));
        $nis            = htmlspecialchars($this->input->post('nis'));
        $nisn           = htmlspecialchars($this->input->post('nisn'));
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $agama          = htmlspecialchars($this->input->post('agama'));
        $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $no_hp          = htmlspecialchars($this->input->post('no_hp'));
        $alamat         = htmlspecialchars($this->input->post('alamat'));
        $angkatan       = htmlspecialchars($this->input->post('angkatan'));
        $kepsek_id      = $this->input->post('kepsek');
        $data = [
          'nis'           => $nis,
          'nisn'          => $nisn,
          'nama_siswa'    => $nama,
          'jenis_kelamin' => $jenis_kelamin,
          'agama'         => $agama,
          'tempat_lahir'  => $tempat_lahir,
          'tanggal_lahir' => $tanggal_lahir,
          'no_hp'         => $no_hp,
          'alamat'        => $alamat,
          'status'        => 0,
          'angkatan'      => $angkatan,
          'kepsek_id'     => $kepsek_id,
        ];
        $this->app->insertAlumni($data);
        $this->session->set_flashdata('success', 'Data alumni berhasil disimpan');
        redirect('alumni', 'refresh');
      }
    }
  }

  public function edit($id)
  {
    $this->_rules();
    if ($this->form_validation->run() == false) {
      $data['alumni']   = $this->app->getIdAlumni($id);
      $data['akademik'] = $this->app->getAkademik();
      $data['kepsek']   = $this->app->getKepsek();
      $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $this->load->view('alumni/edit-alumni', $data);
    } else {
      if ($_FILES['foto']['name']) {
        $config['upload_path']    = './assets/img/alumni/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = '1024';
        $config['file_name']      = 'img_' . date('Y-m-d');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['alumni']   = $this->app->getIdAlumni($id);
          $data['akademik'] = $this->app->getAkademik();
          $data['kepsek']   = $this->app->getKepsek();
          $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
          $this->load->view('alumni/edit-alumni', $data);
        } else {
          $upload           = array('upload_data' => $this->upload->data());
          $nama           = htmlspecialchars($this->input->post('nama'));
          $nis            = htmlspecialchars($this->input->post('nis'));
          $nisn           = htmlspecialchars($this->input->post('nisn'));
          $jenis_kelamin  = $this->input->post('jenis_kelamin');
          $agama          = htmlspecialchars($this->input->post('agama'));
          $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
          $tanggal_lahir  = $this->input->post('tanggal_lahir');
          $no_hp          = htmlspecialchars($this->input->post('no_hp'));
          $alamat         = htmlspecialchars($this->input->post('alamat'));
          $angkatan       = htmlspecialchars($this->input->post('angkatan'));
          $kepsek_id      = $this->input->post('kepsek');
          $data = [
            'nis'           => $nis,
            'nisn'          => $nisn,
            'nama_siswa'    => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'agama'         => $agama,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp'         => $no_hp,
            'alamat'        => $alamat,
            'status'        => 0,
            'angkatan'      => $angkatan,
            'foto'          => $upload['upload_data']['file_name'],
            'kepsek_id'     => $kepsek_id,
          ];
          $row  = ['nis'  => $id];
          $this->app->updateAlumni($row, $data);
          $this->session->set_flashdata('success', 'Data alumni berhasil diubah');
          redirect('alumni', 'refresh');
        }
      } else {
        $nama           = htmlspecialchars($this->input->post('nama'));
        $nis            = htmlspecialchars($this->input->post('nis'));
        $nisn           = htmlspecialchars($this->input->post('nisn'));
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $agama          = htmlspecialchars($this->input->post('agama'));
        $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $no_hp          = htmlspecialchars($this->input->post('no_hp'));
        $alamat         = htmlspecialchars($this->input->post('alamat'));
        $angkatan       = htmlspecialchars($this->input->post('angkatan'));
        $kepsek_id      = $this->input->post('kepsek');
        $data = [
          'nis'           => $nis,
          'nisn'          => $nisn,
          'nama_siswa'    => $nama,
          'jenis_kelamin' => $jenis_kelamin,
          'agama'         => $agama,
          'tempat_lahir'  => $tempat_lahir,
          'tanggal_lahir' => $tanggal_lahir,
          'no_hp'         => $no_hp,
          'alamat'        => $alamat,
          'status'        => 0,
          'angkatan'      => $angkatan,
          'kepsek_id'     => $kepsek_id,
        ];
        $row  = ['nis'  => $id];
        $this->app->updateAlumni($row, $data);
        $this->session->set_flashdata('success', 'Data alumni berhasil diubah');
        redirect('alumni', 'refresh');
      }
    }
  }

  public function hapus()
  {
    $id = $this->input->post('nis');
    $this->app->deleteAlumni($id);
    $this->session->set_flashdata('success', 'Data alumni berhasil dihapus!');
    redirect('alumni', 'refresh');
  }

  public function detail($id)
  {
    $data['alumni']   = $this->app->getAlumniDetail($id);
    $data['user']     = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('alumni/detail', $data);
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nis', 'nis', 'trim|required|numeric', [
      'required'    => 'Nis harus diisi!',
      'numeric'     => 'Masukkan digit angka',
    ]);
    $this->form_validation->set_rules('nisn', 'nisn', 'trim|required|numeric', [
      'required'    => 'Nisn harus diisi!',
      'numeric'     => 'Masukkan digit angka',
    ]);
    $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
      'required'    => 'Nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required', [
      'required'    => 'Jenis kelamin tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('agama', 'agama', 'trim|required', [
      'required'    => 'Agama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required', [
      'required'    => ' Tempat lahir harus diisi!',
    ]);
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required', [
      'required'    => 'Tanggal lahir harus diisi!',
    ]);
    $this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required', [
      'required'    => 'Angkatan harus diisi!',
      'angkatan'    => 'Masukkan digit angka',
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
      'required'    => 'Alamat tidak boleh dikosongkan',
    ]);
    $this->form_validation->set_rules('no_hp', 'telepon', 'trim|numeric', [
      'numeric'    => 'No telepon harus berupa angka',
    ]);
    $this->form_validation->set_rules('angkatan', 'tahun akademik', 'trim|required', [
      'required'    => 'Tahun akademik harus dipilih',
    ]);
    $this->form_validation->set_rules('kepsek', 'kepala sekolah', 'trim|required', [
      'required'    => 'Pimpinan sekolah tidak boleh dikosongkan!',
    ]);
  }

  public function upload_ijazah()
  {
    $gambar = $_FILES['ijazah']['name'];
    $id     = $this->input->post('nis');
    if ($gambar) {
      $config['upload_path']    = './assets/upload/ijazah/';
      $config['allowed_types']  = 'gif|jpg|png|pdf|jpeg';
      $config['max_size']       = '1024';
      $config['file_name']      = 'ijazah' . $id;
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('ijazah')) {
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
        redirect('alumni', 'refresh');
      } else {
        $ijazah = array('upload_data' => $this->upload->data());
        $data   = [
          'ijazah'    => $ijazah['upload_data']['file_name'],
        ];
        $id   = $this->input->post('nis');
        $this->db->set($data);
        $this->db->where('nis', $id);
        $this->db->update('siswa');
        $this->session->set_flashdata('success', 'Ijazah berhasil diupload');
        redirect('alumni', 'refresh');
      }
    } else {
      $this->session->set_flashdata('error', 'Upload Ijazah tidak tersedia');
      redirect('alumni', 'refresh');
    }
  }

  public function download_ijazah($id)
  {
    $data['siswa']    = $this->db->get_where('siswa', ['nis' => $id])->row_array();
    $file = './assets/upload/ijazah/' . $data['siswa']['ijazah'];
    force_download($file, NULL);
  }

  public function print_keterangan($id)
  {
    $data['alumni'] = $this->app->getIdAlumni($id);
    $this->load->view('alumni/surat_keterangan', $data);
    $html   = $this->output->get_output();
    $this->load->library('dompdf_gen');
    $paper_size      = "A4";
    $orientation     = "Potrait";
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("surat_keterangan.pdf", array("Attachment" => 0));
  }

  public function excel()
  {
    require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    $object = new PHPExcel();
    $object->getProperties()->setCreator("Admin Sispia");
    $object->getProperties()->setLastModifiedBy("Admin Sispia");
    $object->getProperties()->setTitle("Data Alumni");
    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->getColumnDimension('A')->setWidth('5');
    $object->getActiveSheet()->getColumnDimension('B')->setWidth('18');
    $object->getActiveSheet()->getColumnDimension('C')->setWidth('18');
    $object->getActiveSheet()->getColumnDimension('D')->setWidth('30');
    $object->getActiveSheet()->getColumnDimension('E')->setWidth('15');
    $object->getActiveSheet()->getColumnDimension('F')->setWidth('10');
    $object->getActiveSheet()->getColumnDimension('G')->setWidth('35');
    $object->getActiveSheet()->getColumnDimension('H')->setWidth('15');
    $object->getActiveSheet()->getColumnDimension('I')->setWidth('35');
    $object->getActiveSheet()->getColumnDimension('J')->setWidth('15');

    $object->getActiveSheet()->setCellValue('A1', 'No');
    $object->getActiveSheet()->setCellValue('B1', 'NIS');
    $object->getActiveSheet()->setCellValue('C1', 'NISN');
    $object->getActiveSheet()->setCellValue('D1', 'Nama Siswa');
    $object->getActiveSheet()->setCellValue('E1', 'Jenis Kelamin');
    $object->getActiveSheet()->setCellValue('F1', 'Agama');
    $object->getActiveSheet()->setCellValue('G1', 'Tempat, Tanggal Lahir');
    $object->getActiveSheet()->setCellValue('H1', 'No Telepon');
    $object->getActiveSheet()->setCellValue('I1', 'Alamat');
    $object->getActiveSheet()->setCellValue('J1', 'Tahun Angkatan');
    $data['alumni'] = $this->app->getAlumni();
    $baris  = 2;
    $no     = 1;
    foreach ($data['alumni'] as $alm) {
      $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
      $object->getActiveSheet()->setCellValue('B' . $baris, $alm['nis']);
      $object->getActiveSheet()->setCellValue('C' . $baris, $alm['nisn']);
      $object->getActiveSheet()->setCellValue('D' . $baris, $alm['nama_siswa']);
      $object->getActiveSheet()->setCellValue('E' . $baris, $alm['kelamin']);
      $object->getActiveSheet()->setCellValue('F' . $baris, $alm['agama']);
      $object->getActiveSheet()->setCellValue('G' . $baris, $alm['tempat_lahir'] . ', ' . tgl_indo($alm['tanggal_lahir']));
      $object->getActiveSheet()->setCellValue('H' . $baris, $alm['no_hp']);
      $object->getActiveSheet()->setCellValue('I' . $baris, $alm['alamat']);
      $object->getActiveSheet()->setCellValue('J' . $baris, $alm['angkatan']);
      $baris++;
    }
    $fileName = "Data Alumni" . '.xlsx';
    $object->getActiveSheet()->setTitle("Data Alumni");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
    $writer->save('php://output');
    exit;
  }

  public function import_excel()
  {
    $data   = array();
    if (isset($_POST['preview'])) {
      $upload   = $this->app->upload_file($this->filename);
      if ($upload['result'] == "success") {
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        $excelReader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelReader->load('excel/' . $this->filename . '.xlsx');
        $sheet = $loadexcel->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, true);
        $data['sheet'] = $sheet;
      } else {
        $data['upload_error'] = $upload['error'];
      }
    }
    $data['user']   = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('alumni/form_excel', $data);
  }

  public function import()
  {
    require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
    $excelreader  = new PHPExcel_Reader_Excel2007();
    $loadexcel    = $excelreader->load('excel/' . $this->filename . '.xlsx');
    $sheet        = $loadexcel->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, true);
    $data         = array();
    $numrow       = 1;
    foreach ($sheet as $row) {
      if ($numrow > 1) {
        array_push($data, array(
          'nis'           => $row['A'],
          'nisn'          => $row['B'],
          'nama_siswa'    => $row['C'],
          'jenis_kelamin' => $row['D'],
          'agama'         => $row['E'],
          'tempat_lahir'  => $row['F'],
          'tanggal_lahir' => $row['G'],
          'no_hp'         => $row['H'],
          'alamat'        => $row['I'],
          'angkatan'      => $row['J'],
          'kepsek_id'     => $row['K'],
        ));
      }
      $numrow++;
    }
    $this->app->insert_multiple($data);
    $this->session->set_flashdata('success', 'Data alumni berhasil diimpor!');
    redirect('alumni', 'refresh');
  }
}
/* End of file Alumni.php */