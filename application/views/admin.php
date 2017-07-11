<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
            <h1>Halo <?php echo $this->session->userdata('username'); ?></h1>
            <a style="align:right;" href="<?php echo site_url()?>/login/logout">Keluar</a>
            </br>
            <h3>Tabel Buku</h3>
            <?php
                if(count($buku) > 0){
            ?>
            <table border=1>
                <tr>
                    <th>No.</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penenrbit</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $i = 1;
                    foreach ($buku as $row){ 
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->aap_kode_buku; ?></td>
                    <td><?php echo $row->aap_judul_buku; ?></td>
                    <td><?php echo $row->aap_pengarang; ?></td>
                    <td><?php echo $row->aap_penerbit; ?></td>
                    <td><?php echo $row->aap_tahun_terbit; ?></td>
                    <td><?php echo $row->aap_harga; ?></td>
                    <td><a href="<?php echo site_url();?>/admin/edit_buku/<?php echo $row->aap_kode_buku;?>">Edit</a> | <a href="<?php echo site_url();?>/admin/hapus_buku/<?php echo $row->aap_kode_buku;?>">Hapus</a></td>
                </tr>
                <?php 
                    $i++;
                } ?>
            </table>
            <?php }else{ ?>
                <p>Tidak ada buku.</p>
            <?php } ?>
            </br>
            <a href="<?php echo site_url()?>/admin/add_buku">Tambah Buku</a>
            </br>
            <h3>Tabel Pemesan</h3>
            <table border=1>
                <tr>
                    <th>No.</th>
                    <th>Email Pemesan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                    $i = 1;
                    foreach($pemesanan as $row){
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row->aap_email_pemesanan;?></td>
                    <td><?php echo $row->aap_keterangan;?></td>
                    <td>
                        <?php 
                            if($row->aap_kode_bayar == 0){
                                echo "Belum Bayar";
                            }else{
                                echo "Sudah Bayar";
                            }
                        ?>
                    </td>
                    <td><a href="<?php echo site_url();?>/admin/ubah_status?email=<?php echo $row->aap_email_pemesanan;?>">Ubah Status</a></td>
                </tr>
                <?php $i++; } ?>
            </table>
    </body>
</html>