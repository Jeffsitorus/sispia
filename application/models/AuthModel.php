<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{
  public function checkUser($username, $password)
  {
    $username   = set_value('username');
    $password   = set_value('password');
    $result     = $this->db->where('username', $username)
      ->where('password', md5($password))
      ->limit(1)
      ->get('users');
    if ($result->num_rows() > 0) {
      return $result->row_array();
    } else {
      return false;
    }
  }

  //========================= get data ===============================
  public function getUser()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('role_id',2);
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getRole()
  {
    return $this->db->get('role')->result_array();
  }

  // ============================== insert data =========================
  public function insertUser($data)
  {
    $this->db->insert('users', $data);
  }

  public function insertRole($data)
  {
    $this->db->insert('role', $data);
  }

  // ============================ delete ==================================

  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('role');
  }

  public function deleteUser($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('users');
  }
}
/* End of file AuthModel.php */