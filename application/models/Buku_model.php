<?php
//kelas buku model
class Buku_model extends CI_Model {
    
    //konstruktor
    public function __construct(){
        parent::__construct();
    }

    //select all data
    public function select_all(){
        $this->db->select('*');
        $this->db->from('aap_buku');
    
        return $this->db->get();
    }

    //select 1 data
    public function select_one($kode_buku){
        $this->db->select('*');
        $this->db->from('aap_buku');
        $this->db->where('aap_kode_buku',$kode_buku);

        return $this->db->get();
    }

    //select data terakhir
    public function select_last(){
        $this->db->select('*');
        $this->db->from('aap_buku');
        $this->db->order_by('aap_kode_buku','desc');
        $this->db->limit(1);

        return $this->db->get();
    }

    //untuk insert data
    public function insert($data){
        $this->db->insert('aap_buku',$data);
    }
    
    //untuk update data
    public function update($kode_buku,$data){
        $this->db->where('aap_kode_buku',$kode_buku);
        $this->db->update('aap_buku',$data);
    }

    //untuk hapus data
    public function delete($kode_buku){
        $this->db->where('aap_kode_buku',$kode_buku);
        $this->db->delete('aap_buku');
    }


    

}