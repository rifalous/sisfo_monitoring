<?php

class Pengajar_model extends CI_Model{
  
  public $table = 'pengajar';
  public $id    = 'id';
  public $order = 'DESC';

  public function tampil_data($table){
    return $this->db->get($table);
  }

  public function ambil_id_pengajar($id){
    $hasil = $this->db->where('id', $id)->get('pengajar');
    if($hasil->num_rows() > 0){
      return $hasil->result();
    }
    else{
      return false;
    }
  }

  public function insert_data($data, $table){
    $this->db->insert($table, $data);
  }

  public function edit_data($where, $table){
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function hapus_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function get_by_id($id){
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

}