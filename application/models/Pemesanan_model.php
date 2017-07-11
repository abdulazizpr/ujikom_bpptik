<?php

class Pemesanan_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    //select all
    public function select_all(){
        $this->db->select('*');
        $this->db->from('aap_pemesanan');
    
        return $this->db->get();
    }

    public function select_one($kode_pemesanan){
        $this->db->select('*');
        $this->db->from('aap_pemesanan');
        $this->db->where('aap_kode_pemesanan',$kode_pemesanan);

        return $this->db->get();
    }

    public function select_last(){
        $this->db->select('*');
        $this->db->from('aap_pemesanan');
        $this->db->order_by('aap_kode_pemesanan','desc');
        $this->db->limit(1);

        return $this->db->get();
    }

    public function select_pemesanan($email_pemesanan){
        $this->db->select('*');
        $this->db->from('aap_pemesanan');
        $this->db->join('aap_buku', 'aap_buku.aap_kode_buku = aap_pemesanan.aap_kode_buku');
        $this->db->like('aap_email_pemesanan',$email_pemesanan,'both');

        return $this->db->get();
    }

    public function select_email_tgl($email_pemesanan,$tgl_pemesanan){
        $this->db->select('*');
        $this->db->from('aap_pemesanan');
        $this->db->join('aap_buku', 'aap_buku.aap_kode_buku = aap_pemesanan.aap_kode_buku');
        $this->db->where('aap_email_pemesanan',$email_pemesanan);
        $this->db->where('aap_tanggal_pemesanan',$tgl_pemesanan);

        return $this->db->get();
    }

    public function insert($data){
        $this->db->insert('aap_pemesanan',$data);
    }
    
    public function update($kode_pemesanan,$data){
        $this->db->where('aap_kode_pemesanan',$kode_pemesanan);
        $this->db->update('aap_pemesanan',$data);
    }


}