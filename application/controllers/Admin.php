<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    //konstruktor
	public function __construct(){
		parent::__construct();
		
        //load model buku dan pemesanan
        $this->load->model('buku_model');
		$this->load->model('pemesanan_model');

        //cek session login
        if(!$this->session->userdata('logged_in')){
            redirect(site_url('login'));
        }

	}

    //prosedur untuk masuk ke halaman admin
	public function index(){
        $data['buku'] = $this->buku_model->select_all()->result();
        $data['pemesanan'] = $this->pemesanan_model->select_group()->result();
		
        $this->load->view('admin',$data);
	}
	
    //prosedur untuk menambah buku
    public function add_buku(){
        //jika tidak ada kiriman data maka masuk ke halaman form buku
        if(!$this->input->post()){
            $data['judul'] = "Tambah";
            $data['buku']['aap_judul_buku'] = "";
            $data['buku']['aap_pengarang'] = "";
            $data['buku']['aap_penerbit'] = "";
            $data['buku']['aap_tahun_terbit'] = "";
            $data['buku']['aap_harga'] = "";
            $data['url'] = site_url()."/admin/add_buku/";
		    $this->load->view('form_buku',$data);
        }else{
            //ambil kode buku terakhir
            $get_kode = $this->buku_model->select_last()->row();
            
            //jika belum ada data maka di set kode buku menjadi BK001
            if(count($get_kode) <= 0){
                $kode_buku = "BK001";
            }else{
                $ambil_digit = substr($get_kode->aap_kode_buku,2,5); //pengambilan digit mulai dari digit 3
                $digit_int = (int)$ambil_digit;//konversi ke int
                $digit_int++;//increment digit
                
                //set jika hanya 1 digit
                if($digit_int < 10){
                    $kode_buku = "BK00".$digit_int;
                }else if($digit_int >= 10 && $digit_int < 100){ //2 digit
                    $kode_buku = "BK0".$digit_int;
                }else{                                          //3 digit
                    $kode_buku = "BK".$digit_int;
                }   
            }

            //proses penginputan ke dalam database
            $data['aap_kode_buku'] = $kode_buku;
            $data['aap_judul_buku'] = $this->input->post('judul_buku');
            $data['aap_pengarang'] = $this->input->post('pengarang');
            $data['aap_penerbit'] = $this->input->post('penerbit');
            $data['aap_tahun_terbit'] = $this->input->post('tahun_terbit');
            $data['aap_harga'] = $this->input->post('harga');

            $this->buku_model->insert($data);
            redirect(site_url('admin'));
        }
	}

    //prosedur untuk edit buku
    public function edit_buku($id){
        //jika tidak ada kiriman data maka masuk ke form buku
        if(!$this->input->post()){
            $data['judul'] = "Edit";
            $row = $this->buku_model->select_one($id)->row();//ambil data berdasarkan kode buku
            $data['buku']['aap_judul_buku'] = $row->aap_judul_buku;
            $data['buku']['aap_pengarang'] = $row->aap_pengarang;
            $data['buku']['aap_penerbit'] = $row->aap_penerbit;
            $data['buku']['aap_tahun_terbit'] = $row->aap_tahun_terbit;
            $data['buku']['aap_harga'] = $row->aap_harga;
            $data['url'] = site_url()."/admin/edit_buku/".$id;
            $this->load->view('form_buku',$data);
        }else{

            //proses untuk mengupdate data
            $kode_buku =  $id;
            $data['aap_judul_buku'] = $this->input->post('judul_buku');
            $data['aap_pengarang'] = $this->input->post('pengarang');
            $data['aap_penerbit'] = $this->input->post('penerbit');
            $data['aap_tahun_terbit'] = $this->input->post('tahun_terbit');
            $data['aap_harga'] = $this->input->post('harga');

            $this->buku_model->update($kode_buku,$data);
            redirect(site_url('admin'));
        }
	}

    //prosedur untuk penghapusan buku
    public function hapus_buku($id){
        $this->buku_model->delete($id);
        redirect(site_url('admin'));
    }

    //prosedur untuk mengubah status
    public function ubah_status(){

        $email = $_GET['email'];//mengambil nama email di link dengan method GET
        //jika tidak ada kiriman data maka masuk ke halaman ubah status kode pembayaran
        if(!$this->input->post()){
            $data['pemesanan'] = $this->pemesanan_model->select_email($email)->row();
            $this->load->view('ubah_status_pemesanan',$data);
        }else{

            //proses untuk mengupdate data
            $data['aap_keterangan'] = $this->input->post('keterangan');
            $data['aap_kode_bayar'] = $this->input->post('kode_bayar');

            $this->pemesanan_model->update_kode_bayar($email,$data);
            redirect(site_url('admin'));
        }
    }
	

}
