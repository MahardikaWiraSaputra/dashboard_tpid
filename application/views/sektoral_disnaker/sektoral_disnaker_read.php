<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Sektoral_disnaker Read</h2>
        <table class="table">
	    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
	    <tr><td>Nm Lengkap</td><td><?php echo $nm_lengkap; ?></td></tr>
	    <tr><td>Gelar Belakang</td><td><?php echo $gelar_belakang; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Status Perkawinan</td><td><?php echo $status_perkawinan; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nama Wilayah</td><td><?php echo $nama_wilayah; ?></td></tr>
	    <tr><td>Nm Instansi</td><td><?php echo $nm_instansi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sektoral_disnaker') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>