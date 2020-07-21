<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AppModel extends CI_Model
{
  
  public function getKepsek()
  {
    $this->db->select('*');
    $this->db->from('kepsek');
    $this->db->join('akademik', 'akademik.id_akm=kepsek.akademik_id');
    $result = $this->db->get();
    return $result->result_array();
  }

  public function getAkademik()
  {
    return $this->db->get('akademik')->result_array();
  }

  public function getAlumni()
  {
    $this->db->select('siswa.*, siswa.jenis_kelamin as kelamin, kepsek.nama_kepsek, kepsek.jenis_kelamin, kepsek.jabatan, kepsek.nip');
    $this->db->from('siswa');
    $this->db->join('kepsek', 'kepsek.nip=siswa.kepsek_id','LEFT');
    $this->db->order_by('angkatan','ASC');
    $result = $this->db->get();
    return $result->result_array();
  }

  public function getAlumniDetail($id)
  {
    $this->db->select('siswa.*, siswa.jenis_kelamin as kelamin, kepsek.nama_kepsek, kepsek.jenis_kelamin, kepsek.jabatan, kepsek.nip');
    $this->db->from('siswa');
    $this->db->join('kepsek', 'kepsek.nip=siswa.kepsek_id','LEFT');
    $this->db->where('nis', $id);
    $result = $this->db->get();
    return $result->row_array();
  }

  public function getIdAlumni($id)
  {
    $this->db->select('siswa.*, siswa.jenis_kelamin as kelamin, kepsek.nama_kepsek, kepsek.jenis_kelamin, kepsek.jabatan, kepsek.nip');
    $this->db->from('siswa');
    $this->db->join('kepsek', 'kepsek.nip=siswa.kepsek_id', 'LEFT');
    $this->db->where('nis', $id);
    $result = $this->db->get();
    return $result->row_array();
  }
  // insert data

  public function insertKepsek($data)
  {
    $this->db->insert('kepsek', $data);
  }

  public function insertAkademik($data)
  {
    $this->db->insert('akademik', $data);
  }

  public function insertAlumni($data)
  {
    $this->db->insert('siswa',$data);
  }

  public function getIdKepsek($id)
  {
    return $this->db->get_where('kepsek', ['nip' => $id])->row_array();
  }

  // update data
  public function updateKepsek($row, $data)
  {
    $this->db->where($row);
    $this->db->update('kepsek', $data);
  }

  public function updateAlumni($row, $data)
  {
    $this->db->where($row);
    $this->db->update('siswa', $data);
  }

  public function updateAkademik($row, $data)
  {
    $this->db->where($row);
    $this->db->update('akademik', $data);
  }

  // delete data
  public function deleteKepsek($id)
  {
    $this->db->where('nip', $id);
    $this->db->delete('kepsek');
  }
  public function deleteAlumni($id)
  {
    $this->db->where('nis', $id);
    $this->db->delete('siswa');
  }
  public function deleteAkademik($row)
  {
    $this->db->where($row);
    $this->db->delete('akademik');
  }

  public function upload_file($filename)
  {
    $this->load->library('upload');
    $config['upload_path']    = './excel/';
    $config['allowed_types']  = 'xlsx';
    $config['max_size']       = '2048';
    $config['overwrite']      = true;
    $config['file_name']      = $filename;
    $this->upload->initialize($config);
    if ($this->upload->do_upload('file')) {
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  public function insert_multiple($data)
  {
    $this->db->insert_batch('siswa', $data);
  }
}
/* End of file AppModel.php */