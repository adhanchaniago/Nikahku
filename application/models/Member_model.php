<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    // Proses login user
    public function login($nama, $password){
        // Validasi
        $this->db->where('nama', $nama);
        $this->db->where('password', $password);

        $result = $this->db->get('member');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function getData($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('id',$id);
        
        $query = $this->db->get();
        return $query->result();
       }
    function get_user_details($id)
    {   
        // $this->db->join('levels', 'levels.level_id = users.fk_level_id', 'left');
        $this->db->where('id', $id);

        $result = $this->db->get('member');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }


    // MODEL DEKORASI
    public function get_all_dekorasi()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('dekorasi');
        return $query->result();
    }
    public function create_dekorasi($tabel,$id_member,$nama,$keterangan,$harga,$kat_warna,$kat_jenis)
    {
        // id_member
        // nama
        // keterangan 
        // harga
        // kat_warna
        // kat_jenis
        $tabel= $tabel;
        $data = array(
            'id_member'  => $id_member,
            'nama'       => $nama,
            'keterangan' => $keterangan,
            'harga'      => $harga,
            'kat_warna'  => $kat_warna,
            'kat_jenis'  => $kat_jenis
        );
        // menambahkan data
        return $this->db->insert($tabel, $data);
    }
    public function delete_dekorasi($tabel,$id)
    {
        // menghapus User
        $this->db->where('id', $id);
        $result = $this->db->delete($tabel);
        return $result;
    }

    // MODEL PAKAIAN
    public function get_all_pakaian()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('pakaian');
        return $query->result();
    }

    // MODEL UNDANGAN
    public function get_all_undangan()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('undangan');
        return $query->result();
    }

    // MODEL DOKUMENTASI
    public function get_all_dokumentasi()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('dokumentasi');
        return $query->result();
    }

    // MODEL SOUVENIR
    public function get_all_souvenir()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('souvenir');
        return $query->result();
    }

    // MODEL CATERING
    public function get_all_catering()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id',);

        $query = $this->db->get('catering');
        return $query->result();
    }
}