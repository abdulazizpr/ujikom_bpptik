<html>
    <head>
        <title>Ubah Status Pesanan</title>
    </head>
    <body>
        <h1>Ubah Status Pemesanan</h1>
        <form action="<?php echo site_url();?>/admin/ubah_status?email=<?php echo $pemesanan->aap_email_pemesanan;?>" method="post">
            Status : <input type="radio" name="kode_bayar" value="0" <?php if($pemesanan->aap_kode_bayar==0) echo 'checked';?> />Belum Bayar <input type="radio" name="kode_bayar" value="1" <?php if($pemesanan->aap_kode_bayar==1) echo 'checked';?> />Sudah Bayar </br>
            Keterangan : <textarea name="keterangan" placeholder="Opsional"><?php echo $pemesanan->aap_keterangan; ?></textarea></br>
            <input type="submit" value="Ubah"/></br>
        </form>
    </body>
</html>