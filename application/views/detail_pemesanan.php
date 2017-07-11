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
                <th>No.</th>
                <th>Kode Pembayaran</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Diskon 1</th>
                <th>Diskon 2</th>
                <th>Diskon 3</th>
                <th>Total Pembayaran</th>
            </tr>
            <?php $total_keseluruhan=0; $i=1; foreach($pemesanan as $row){ ?>
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
                         echo "Rp ".number_format($total_harga,2,',','.');
                    ?>
                </td>
                <td>
                    <?php
                           $durasi_tahun = $tahun_sekarang - $row->aap_tahun_terbit;
                           if($durasi_tahun > 0 && $durasi_tahun <= 10){
                               $diskon1 = 0.005 * $total_harga;
                           }else{
                               $diskon1 = 0 *$total_harga;
                           }

                           echo "Rp ".number_format($diskon1,2,',','.');                                         
                    ?>
                </td>
                <td>
                    <?php 
                        if($row->aap_jumlah_pemesanan >= 20 && $row->aap_jumlah_pemesanan < 40){
                            $diskon2 = 0.02 * $total_harga;
                        }else if($row->aap_jumlah_pemesanan >= 40){
                            $diskon2 = 0.04 * $total_harga;
                        }else{
                            $diskon2 = 0 * $total_harga;
                        }

                        echo "Rp ".number_format($diskon2,2,',','.');
                    ?>
                </td>
                <td>
                    <?php 
                        if(count($pemesanan) <= 5){
                            $diskon3 = (0.01 * count($pemesanan)) * $total_harga; 
                        }else{
                            $diskon3 = 0.05 * $total_harga;
                        }

                        echo "Rp ".number_format($diskon3,2,',','.');
                    ?>
                </td>
                <td>
                    <?php 
                        $total_pembayaran = $total_harga - ($diskon1+$diskon2+$diskon3);
                        $total_keseluruhan = $total_keseluruhan + $total_pembayaran;
                        echo "Rp ".number_format($total_pembayaran,2,',','.');
                    ?>
                </td>
            </tr>
            <?php $i++; } ?>
            <tr>
                <td colspan=12><b>Total Bayar Keseluruhan</b></td>
                <td><?php echo "Rp ".number_format($total_keseluruhan,2,',','.'); ?></td>
            </tr>
        </table>
        <?php
            }else{
                echo "Maaf pesanan yang anda cari tidak tersedia</br>";
            }
        ?>
        <a href="<?php echo site_url();?>/pemesanan/">Kembali ke Pemesanan</a>
    </body>
</html>