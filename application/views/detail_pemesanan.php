<!DOCTYPE Html>
<html>
    <head>
        <title>Detail Transaksi</title>
    </head>
    <body>
        <?php
            if($pemesanan){
        ?>
        <h1>Detail Transaksi</h1>
        <?php
            foreach($pemesanan as $row){
                $tgl_pemesanan = $row->aap_tanggal_pemesanan;
                $email = $row->aap_email_pemesanan;
                $keterangan = $row->aap_keterangan;
                $kode_bayar = $row->aap_kode_bayar;
            }
        ?>
        <p>Email Pemesan : <?php echo $email; ?></p>
        <p>Tanggal Pemesanan : <?php echo $tgl_pemesanan; ?></p>
        <p>Status : 
            <?php 
                if($kode_bayar==0){
                    echo "Belum Bayar";
                }else{
                    echo "Sudah Bayar";
                }
            ?>
        </p>
        <p>Keterangan : 
            <?php
                if(!$keterangan) echo "-";
                else echo $keterangan;
            ?>
        </p>
        <p>Buku yang dipesan : </p>
        <table border=1>
            <tr>
                <td>No.</td>
                <td>Kode Pembayaran</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td>Tahun</td>
                <td>Harga</td>
                <td>Jumlah Buku Yang di Pesan</td>
                <td>Total Harga</td>
                <td>Diskon 1</td>
                <td>Diskon 2</td>
                <td>Diskon 3</td>
            </tr>
            <?php $i=1; foreach($pemesanan as $row){ ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row->aap_kode_pemesanan; ?></td>
                <td><?php echo $row->aap_judul_buku; ?></td>
                <td><?php echo $row->aap_pengarang; ?></td>
                <td><?php echo $row->aap_penerbit; ?></td>
                <td><?php echo $row->aap_tahun_terbit; ?></td>
                <td><?php echo $row->aap_harga; ?></td>
                <td><?php echo $row->aap_jumlah_pemesanan; ?></td>
                <td><?php 
                        $total_harga = $row->aap_harga * $row->aap_jumlah_pemesanan;
                         echo $total_harga;
                    ?>
                </td>
                <td>
                    <?php
                           $durasi_tahun = $tahun_sekarang - $row->aap_tahun_terbit;
                           echo $durasi_tahun;                                         
                    ?>
                </td>
            </tr>
            <?php $i++; } ?>
        </table>
        <?php
            }else{
                echo "Maaf pesanan yang anda cari tidak tersedia</br>";
            }
        ?>
        <a href="<?php echo site_url();?>/pemesanan/">Kembali ke Pemesanan</a>
    </body>
</html>