<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('pemesanan_model');
        date_default_timezone_set('Asia/Jakarta');

	}

	public function index(){

        if(!$this->input->post()){
            $data['buku'] = $this->buku_model->select_all()->result();
            $data['aap_kode_buku'] = [];
            $data['aap_judul_buku'] = [];
            $data['aap_tahun_terbit'] = [];
            $data['aap_harga'] = [];
		    $this->load->view('pemesanan',$data);
        }else{
            $data['buku'] = $this->buku_model->select_all()->result();
            $kode_buku = $this->input->post('kode_buku');
        
            $kd_buku = [];
            $judul_buku = [];
            $tahun_terbit = [];
            $harga = [];
            foreach($kode_buku as $row){
                $buku = $this->buku_model->select_one($row)->row();
                array_push($kd_buku,$buku->aap_kode_buku);
                array_push($judul_buku,$buku->aap_judul_buku);
                array_push($tahun_terbit,$buku->aap_tahun_terbit);
                array_push($harga,$buku->aap_harga);
            }

            $data['aap_kode_buku'] = $kd_buku;
            $data['aap_judul_buku'] = $judul_buku;
            $data['aap_tahun_terbit'] = $tahun_terbit;
            $data['aap_harga'] = $harga;

            $this->load->view('pemesanan',$data);
        }
	}

    public function transaksi(){

        $time = time();

        $kode_buku = $this->input->post('kode_buku');
        $jumlah = $this->input->post('jumlah');
        $email_pemesanan = $this->input->post('email_pemesanan');
        $tanggal_pemesanan =  mdate('%Y-%m-%d', $time);       

        for($i=0;$i<count($kode_buku);$i++){    

            $get_kode = $this->pemesanan_model->select_last()->row();
            
            if(count($get_kode) <= 0){
                $kode_pemesanan = "TRX001";
            }else{
            
                $ambil_digit = substr($get_kode->aap_kode_pemesanan,3,6);
                $digit_int = (int)$ambil_digit;
                $digit_int++;
                
                if($digit_int < 10){
                    $kode_pemesanan = "TRX00".$digit_int;
                }else if($digit_int >= 10 && $digit_int < 100){
                    $kode_pemesanan = "TRX0".$digit_int;
                }else{
                    $kode_pemesanan = "TRX".$digit_int;
                }
            }

            $data['aap_kode_pemesanan'] = $kode_pemesanan;
            $data['aap_tanggal_pemesanan'] = $tanggal_pemesanan;
            $data['aap_email_pemesanan'] = $email_pemesanan;
            $data['aap_kode_buku'] = $kode_buku[$i];
            $data['aap_jumlah_pemesanan'] = $jumlah[$i];
            $data['aap_kode_bayar'] = 0;

            $this->pemesanan_model->insert($data);

        }

        $parts = explode("@", $email_pemesanan);
        $username = $parts[0];
        redirect(site_url('pemesanan/detail/'.$username));

    }
	

    public function detail($username){
        
        $time = time();
        $data['tahun_sekarang'] = mdate('%Y',$time);

        if(!$this->input->post()){
            $data['pemesanan'] = $this->pemesanan_model->select_pemesanan($username)->result();
            $this->load->view('detail_pemesanan',$data);
        }else{
            $data['pemesanan'] = $this->pemesanan_model->select_email_tgl($this->input->post('email'),$this->input->post('tgl_pemesanan'))->result();
            $this->load->view('detail_pemesanan',$data);
        }
    }

}
