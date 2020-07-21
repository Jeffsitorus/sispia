<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel', 'app');
  }

  public function alumni()
  {
    $data['alumni']  = $this->app->getAlumni();
    $data['user']    = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $this->load->view('laporan/alumni', $data);
  }

  public function cetak_alumni()
  {
    $data['alumni'] = $this->app->getAlumni();
    $this->load->view('laporan/cetak_alumni', $data);
    $html           = $this->output->get_output();
    $this->load->library('dompdf_gen');
    $paper_size     = "A4";
    $orientation    = "Landscape";
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-alumni.pdf", array("Attachment" => 0));
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
}
/* End of file laporan.php */