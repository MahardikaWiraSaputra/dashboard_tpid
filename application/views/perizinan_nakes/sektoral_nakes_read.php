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
        <h2 style="margin-top:0px">Sektoral_nakes Read</h2>
        <table class="table">
	    <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $sex; ?></td></tr>
	    <tr><td>Tgl Berlaku</td><td><?php echo $tgl_berlaku; ?></td></tr>
	    <tr><td>Jenis Surat</td><td><?php echo $jenis_surat; ?></td></tr>
	    <tr><td>Tempat Praktek Ke</td><td><?php echo $tempat_praktek_ke; ?></td></tr>
	    <tr><td>Tempat Praktek</td><td><?php echo $tempat_praktek; ?></td></tr>
	    <tr><td>Alamat Tempat Praktek</td><td><?php echo $alamat_tempat_praktek; ?></td></tr>
	    <tr><td>Kecamatan Tempat Praktek</td><td><?php echo $kecamatan_tempat_praktek; ?></td></tr>
	    <tr><td>Kelurahan Tempat Praktek</td><td><?php echo $kelurahan_tempat_praktek; ?></td></tr>
	    <tr><td>Kecamatan Tempat Praktek Pribadi</td><td><?php echo $kecamatan_tempat_praktek_pribadi; ?></td></tr>
	    <tr><td>Kelurahan Tempat Praktek Pribadi</td><td><?php echo $kelurahan_tempat_praktek_pribadi; ?></td></tr>
	    <tr><td>Status Berlaku</td><td><?php echo $status_berlaku; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Profesi</td><td><?php echo $profesi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('perizinan_nakes') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>