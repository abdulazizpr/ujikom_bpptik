<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    //konstruktor
	public function __construct(){
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('pemesanan_model');
        date_default_timezone_set('Asia/Jakarta');

	}

    //proses di halaman index
	public function index(){

        //jika tidak ada kiriman data maka masuk ke halaman pemesanan
        if(!$this->input->post()){
            $data['buku'] = $this->buku_model->select_all()->result();
            $data['aap_kode_buku'] = [];
            $data['aap_judul_buku'] = [];
            $data['aap_tahun_terbit'] = [];
            $data['aap_harga'] = [];
		    $this->load->view('pemesanan',$data);
        }else{
            
            $data['buku'] = $this->buku_model->select_all()->result();
            $kode_buku = $this->input->post('kode_buku'); //mengambil data kode buku secara array
        
            //inisialisasi
            $kd_buku = [];
            $judul_buku = [];
            $tahun_terbit = [];
            $harga = [];

            //proses memasukan tiap atribut ke dalam array
            foreach($kode_buku as $row){
                $buku = $this->buku_model->select_one($row)->row();
                array_push($kd_buku,$buku->aap_kode_buku);
                array_push($judul_buku,$buku->aap_judul_buku);
                array_push($tahun_terbit,$buku->aap_tahun_terbit);
                array_push($harga,$buku->aap_harga);
            }

            //proses penampungan atribut
            $data['aap_kode_buku'] = $kd_buku;
            $data['aap_judul_buku'] = $judul_buku;
            $data['aap_tahun_terbit'] = $tahun_terbit;
            $data['aap_harga'] = $harga;

            $this->load->view('pemesanan',$data);
        }
	}

    //prosedur untuk melakukan transaksi
    public function transaksi(){

        $time = time();

        $kode_buku = $this->input->post('kode_buku');
        $jumlah = $this->input->post('jumlah');
        $email_pemesanan = $this->input->post('email_pemesanan');
        $tanggal_pemesanan =  mdate('%Y-%m-%d', $time);       

        //proses pemasukan data pemesanan secara looping (karena data yang dipesan lebih dari 1)
        for($i=0;$i<count($kode_buku);$i++){    

            //pengambilan kode terakhir di oemesanan
            $get_kode = $this->pemesanan_model->select_last()->row();
            
            //jika belum ada data maka kode transaksi di set TRX001
            if(count($get_kode) <= 0){
                $kode_pemesanan = "TRX001";
            }else{
            
                $ambil_digit = substr($get_kode->aap_kode_pemesanan,3,6); //pengambilan 3 digit dari digit 3
                $digit_int = (int)$ambil_digit;//konversi ke dalam integer
                $digit_int++;//increment
                
                if($digit_int < 10){
                    $kode_pemesanan = "TRX00".$digit_int;       //1 digit
                }else if($digit_int >= 10 && $digit_int < 100){
                    $kode_pemesanan = "TRX0".$digit_int;        //2 digit
                }else{
                    $kode_pemesanan = "TRX".$digit_int;         //3 digit
                }
            }

            //proses pemasukan data pemesanan
            $data['aap_kode_pemesanan'] = $kode_pemesanan;
            $data['aap_tanggal_pemesanan'] = $tanggal_pemesanan;
            $data['aap_email_pemesanan'] = $email_pemesanan;
            $data['aap_kode_buku'] = $kode_buku[$i];
            $data['aap_jumlah_pemesanan'] = $jumlah[$i];
            $data['aap_kode_bayar'] = 0;

            $this->pemesanan_model->insert($data);

        }

        //pengambilan nama user dari email
        $parts = explode("@", $email_pemesanan);
        $username = $parts[0];
        redirect(site_url('pemesanan/detail/'.$username));

    }
	

    public function detail($username){
        
        //waktu
        $time = time();
        $data['tahun_sekarang'] = mdate('%Y',$time);

        //masuk ke halaman detail pemesanan
        if(!$this->input->post()){
            $data['pemesanan'] = $this->pemesanan_model->select_pemesanan($username)->result();
            $this->load->view('detail_pemesanan',$data);
        }else{
            $data['pemesanan'] = $this->pemesanan_model->select_email_tgl($this->input->post('email'),$this->input->post('tgl_pemesanan'))->result();
            $this->load->view('detail_pemesanan',$data);
        }
    }

}
