<!DOCTYPE Html>
<html>
    <head>
        <title><?php echo $judul; ?> Buku</title>
    </head>
    <body>
        <h1><?php echo $judul; ?> Buku</h1>
        <form action="<?php echo $url; ?>" method="post">
            Judul Buku : <input type="text" name="judul_buku" value="<?php echo $buku['aap_judul_buku'];?>"></br>
            Pengarang : <input type="text" name="pengarang" value="<?php echo $buku['aap_pengarang'];?>"></br>
            Penerbit : <input type="text" name="penerbit" value="<?php echo $buku['aap_penerbit'];?>"></br>
            Tahun Terbit : <input type="text" name="tahun_terbit" value="<?php echo $buku['aap_tahun_terbit']?>"></br>
            Harga : <input type="number" name="harga" value="<?php echo $buku['aap_harga'];?>"></br>
            <input type="submit" value="Simpan"></br>
        </form>
    </body>
</html>