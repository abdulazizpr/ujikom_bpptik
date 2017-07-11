<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        <center>
            <h1>Halo <?php echo $this->session->userdata('username'); ?></h1>
            <a style="align:right;" href="<?php echo site_url()?>/login/logout">Keluar</a>

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

            <a href="<?php echo site_url()?>/admin/add_buku">Tambah Buku</a>
        </center>
    </body>
</html>