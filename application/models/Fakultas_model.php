<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Fakultas_model extends CI_Model{

    // Mendapatkan semua data Fakultas
    public function allFakultas(){
      return $this->db->get('rt')->result();
    }

    public function totalFakultas(){
      return $this->db->get('rt')->num_rows();
    }

    // Nilai bawaan form Fakultas
    public function fakultasDefaultValues(){
      return [
        'rt' => ''
      ];
    }

    // Mendapatkan suatu Fakultas
    public function getFakultas($id){
      return $this->db->where('id', $id)->get('rt')->row();
    }

    // Edit Fakultas
    public function updateFakultas($id, $data){
      return $this->db->where('id', $id)->update('rt', $data);
    }

    // Hapus Fakultas
    public function deleteFakultas($id){
      return $this->db->where('id', $id)->delete('rt');
    }

    // Validasi form fakultas
    public function validationFakultas(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'rt',
          'label' => 'RT',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    // Menambahkan Fakultas
    public function insertFakultas($data){
      return $this->db->insert('rt', $data);
    }

  }
