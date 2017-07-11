<!DOCTYPE html>
<html>
    <head>
        <title>Pemesanan</title>
    </head>
    <body>
        <h1>Pemesanan Buku</h1>
        <p>Cek Pesanan : 
        <form action="<?php echo site_url();?>/pemesanan/detail/search" method="post">
            <input type="email" name="email" placeholder="Masukan alamat email"/> <input type="date" name="tgl_pemesanan"/><input type="submit" value="Cek Status"/></form></p>
        <p>Silahkan pilih buku utk melakukan pemesanan</p>
          <?php
                if(count($buku) > 0){
            ?>
            <form action="<?php echo site_url();?>/pemesanan/" method="post">
            <table border=1>
                <tr>
                    <th>Pilih</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penenrbit</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                </tr>
                <?php 
                    $i = 1;
                    foreach ($buku as $row){ 
                ?>
                <tr>
                    <td><input type="checkbox" name="kode_buku[]" value="<?php echo $row->aap_kode_buku;?>"></td>
                    <td><?php echo $row->aap_kode_buku; ?></td>
                    <td><?php echo $row->aap_judul_buku; ?></td>
                    <td><?php echo $row->aap_pengarang; ?></td>
                    <td><?php echo $row->aap_penerbit; ?></td>
                    <td><?php echo $row->aap_tahun_terbit; ?></td>
                    <td><?php echo $row->aap_harga; ?></td>
                </tr>
                <?php 
                    $i++;
                } ?>
            </table>
            </br>
            <input type="submit" value="Masukan ke dalam keranjang"/ dissabled>
            </form>
            <?php }else{ ?>
                <p>Tidak ada buku.</p>
            <?php } ?>

            <?php
                if(count($aap_kode_buku) > 0){
            ?>
                <p>Silahkan masukan jumlah buku tiap pesanan</p>
                    <form action="<?php echo site_url()?>/pemesanan/transaksi/" method="post">
                    <table border=1>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tahun Terbit</th>
                            <th>Harga</th>
                            <th>Jumlah Buku</th>
                        </tr>
                        <?php 
                            for($i=0;$i<count($aap_kode_buku);$i++){
                        ?>
                        <tr>
                            <td><?php echo $aap_kode_buku[$i]; ?><input type="hidden" name="kode_buku[]" value="<?php echo $aap_kode_buku[$i];?>"/></td>
                            <td><?php echo $aap_judul_buku[$i]; ?></td>
                            <td><?php echo $aap_tahun_terbit[$i]; ?></td>
                            <td><?php echo $aap_harga[$i]; ?></td>
                            <td><input type="number" name="jumlah[]"/></td>
                        </tr>
                            <?php } ?>
                    </table>
                    <br/>
                    <input type="email" name="email_pemesanan" placeholder="Alamat Email"/>
                    <input type="submit" value="Kirim Pesanan"/>
                    </form>
            <?php } ?>
    </body>
</html>