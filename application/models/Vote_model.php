<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Vote_model extends CI_Model{

    // Mendapatkan data suatu paslon
    public function allPaslon(){
      return $this->db->select('*')->from('paslon')->join('detail_capres','paslon.id_paslon = detail_capres.id_paslon')->join('detail_cawapres', 'paslon.id_paslon = detail_cawapres.id_paslon')->get()->result();
    }

    // Data Semua Suara Masuk
    public function suaraMasuk(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih','pemilihan.id_pemilih = pemilih.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->get()->result();
    }

    // Hapus Suara Masuk
    public function deleteSuaraMasuk($id){
      return $this->db->where('id_pemilihan', $id)->delete('pemilihan');
    }

    // Set Kembali Pemilih
    public function setKembaliPemilih($id){
      $sql = "update pemilih set telah_memilih = 'tidak' where id_pemilih = '$id'";
      return $this->db->query($sql);
    }

    // Data Paslon Satu
    public function getPaslonSatu(){
      return $this->db->select('*')->from('paslon')->where('id_paslon', '3')->get()->row();
    }

    // Data Paslon Dua
    public function getPaslonDua(){
      return $this->db->select('*')->from('paslon')->where('id_paslon', '4')->get()->row();
    }

    // Data Suatu Pemilih
    public function pemilih($id){
      return $this->db->where('id_pemilih', $id)->get('pemilih')->row();
    }

    // Fitur Coblos Paslon
    public function coblosPaslon($data){
      return $this->db->insert('pemilihan', $data);
    }

    // Fitur Set Telah Memilih
    public function setTelahMemilih($id){
      $sql = "update pemilih set telah_memilih = 'ya' where id_pemilih = '$id'";
      return $this->db->query($sql);
    }

    // Query Aggregat

    // Paslon Satu
    // Statistik Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukSatu();
      $totalPemilih = $this->totalSuaraMasuk();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatu(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->where('pemilihan.id_paslon', '3')->get()->num_rows();
    }

    // Paslon Dua
    // Statistik Total Suara Masuk Paslon Dua
    public function totalSuaraMasukDuaStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukDua();
      $totalPemilih = $this->totalSuaraMasuk();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Dua
    public function totalSuaraMasukDua(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->where('pemilihan.id_paslon', '4')->get()->num_rows();
    }

    // Statistik Total Suara Masuk Semua Fakultas
    public function totalSuaraMasukStat(){
      $totalSuaraMasuk = $this->totalSuaraMasuk();
      $totalPemilih = $this->totalPemilih();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih
    public function totalPemilih(){
      return $this->db->select('*')->from('pemilih')->get()->num_rows();
    }

    // Total Suara Masuk
    public function totalSuaraMasuk(){
      return $this->db->select('*')->from('pemilihan')->get()->num_rows();
    }

    // Total Pemilih Belum Memilih
    public function totalTidakMemilih(){
      return $this->db->select('*')->from('pemilih')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    // Berbasis Satu Fakultas

    public function totalSuaraMasukFakultasStat($fakultas){
      $totalSuaraMasuk = $this->totalSuaraMasukFakultas($fakultas);
      $totalPemilih = $this->totalPemilihFakultas($fakultas);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    public function totalPemilihFakultas($fakultas){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', $fakultas)->get()->num_rows();
    }

    public function totalSuaraMasukFakultas($fakultas){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', $fakultas)->get()->num_rows();
    }

    public function totalTidakMemilihFakultas($fakultas){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', $fakultas)->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    // Paslon Satu
    // Statistik Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuFakultasStat($fakultas){
      $totalSuaraMasuk = $this->totalSuaraMasukSatuFakultas($fakultas);
      $totalPemilih = $this->totalSuaraMasukFakultas($fakultas);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuFakultas($fakultas){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->where('pemilihan.id_paslon', '3')->where('nama_fakultas', $fakultas)->get()->num_rows();
    }

    // Paslon Dua
    // Statistik Total Suara Masuk Paslon Dua Fakultas
    public function totalSuaraMasukDuaFakultasStat($fakultas){
      $totalSuaraMasuk = $this->totalSuaraMasukDuaFakultas($fakultas);
      $totalPemilih = $this->totalSuaraMasukFakultas($fakultas);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Dua Fakultas
    public function totalSuaraMasukDuaFakultas($fakultas){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->where('pemilihan.id_paslon', '4')->where('nama_fakultas', $fakultas)->get()->num_rows();
    }

    // Semua Fakultas

    // Teknik
    // Total Statistik Suara Masuk Fakultas Teknik
    
    //Olahraga & Kesehatan
    // Total Statistik Suara Masuk Fakultas Olahraga & Kesehatan
    public function totalSuaraMasukFOKStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukFOK();
      $totalPemilih = $this->totalPemilihFOK();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih Fakultas Olahraga & Kesehatan
    public function totalPemilihFOK(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 01')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Olahraga & Kesehatan
    public function totalSuaraMasukFOK(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 01')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Olahraga & Kesehatan
    public function totalTidakMemilihFOK(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 01')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Ilmu Sosial
    // Total Statistik Suara Masuk Fakultas Ilmu Sosial
    public function totalSuaraMasukFISStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukFIS();
      $totalPemilih = $this->totalPemilihFIS();
       if($totalSuaraMasuk == 0 && $totalPemilih ==0){
		 return round(0); 
	  }else{
		return round($totalSuaraMasuk / $totalPemilih * 100);
	  }
    }

    // Total Pemilih Fakultas Ilmu Sosial
    public function totalPemilihFIS(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 02')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Ilmu Sosial
    public function totalSuaraMasukFIS(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 02')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Ilmu Sosial
    public function totalTidakMemilihFIS(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 02')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Ilmu Kelautan
    // Total Statistik Suara Masuk Fakultas Ilmu Kelautan
    public function totalSuaraMasukFIKStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukFIK();
      $totalPemilih = $this->totalPemilihFIK();
      if($totalSuaraMasuk == 0 && $totalPemilih ==0){
		 return round(0); 
	  }else{
		return round($totalSuaraMasuk / $totalPemilih * 100);
	  }
    }

    // Total Pemilih Fakultas Ilmu Kelautan
    public function totalPemilihFIK(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 03')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Ilmu Kelautan
    public function totalSuaraMasukFIK(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 03')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Ilmu Kelautan
    public function totalTidakMemilihFIK(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 03')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Pertanian
    // Total Statistik Suara Masuk Fakultas Pertanian
    public function totalSuaraMasukFapertaStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukFaperta();
      $totalPemilih = $this->totalPemilihFaperta();
	  if($totalSuaraMasuk == 0 && $totalPemilih ==0){
		 return round(0); 
	  }else{
		return round($totalSuaraMasuk / $totalPemilih * 100);
	  }
	}

    // Total Pemilih Fakultas Pertanian
    public function totalPemilihFaperta(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 04')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Pertanian
    public function totalSuaraMasukFaperta(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 04')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Pertanian
    public function totalTidakMemilihFaperta(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 04')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Hukum
    // Total Statistik Suara Masuk Fakultas Hukum
    public function totalSuaraMasukHukumStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukHukum();
      $totalPemilih = $this->totalPemilihHukum();
        if($totalSuaraMasuk == 0 && $totalPemilih ==0){
		 return round(0); 
	  }else{
		return round($totalSuaraMasuk / $totalPemilih * 100);
	  }
    }

    // Total Pemilih Fakultas Hukum
    public function totalPemilihHukum(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 05')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Hukum
    public function totalSuaraMasukHukum(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 05')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Hukum
    public function totalTidakMemilihHukum(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 05')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Sastra & Budaya
    // Total Statistik Suara Masuk Fakultas Sastra & Budaya
    public function totalSuaraMasukFSBStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukFSB();
      $totalPemilih = $this->totalPemilihFSB();
        if($totalSuaraMasuk == 0 && $totalPemilih ==0){
		 return round(0); 
	  }else{
		return round($totalSuaraMasuk / $totalPemilih * 100);
	  }
    }

    // Total Pemilih Fakultas Sastra & Budaya
    public function totalPemilihFSB(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 06')->get()->num_rows();
    }

    // Total Suara Masuk Fakultas Sastra & Budaya
    public function totalSuaraMasukFSB(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('fakultas', 'pemilih.id_fakultas = fakultas.id_fakultas')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('fakultas.nama_fakultas', 'RT 06')->get()->num_rows();
    }

    // Total Tidak Memilih Fakultas Sastra & Budaya
    public function totalTidakMemilihFSB(){
      return $this->db->select('*')->from('pemilih')->join('fakultas','pemilih.id_fakultas = fakultas.id_fakultas')->where('fakultas.nama_fakultas', 'RT 06')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

  }
