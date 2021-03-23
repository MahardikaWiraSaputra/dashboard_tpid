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
        <h2 style="margin-top:0px">Sektoral_nakes <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nik <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Sex <?php echo form_error('sex') ?></label>
            <input type="text" class="form-control" name="sex" id="sex" placeholder="Sex" value="<?php echo $sex; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Berlaku <?php echo form_error('tgl_berlaku') ?></label>
            <input type="text" class="form-control" name="tgl_berlaku" id="tgl_berlaku" placeholder="Tgl Berlaku" value="<?php echo $tgl_berlaku; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Surat <?php echo form_error('jenis_surat') ?></label>
            <input type="text" class="form-control" name="jenis_surat" id="jenis_surat" placeholder="Jenis Surat" value="<?php echo $jenis_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Tempat Praktek Ke <?php echo form_error('tempat_praktek_ke') ?></label>
            <input type="text" class="form-control" name="tempat_praktek_ke" id="tempat_praktek_ke" placeholder="Tempat Praktek Ke" value="<?php echo $tempat_praktek_ke; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Praktek <?php echo form_error('tempat_praktek') ?></label>
            <input type="text" class="form-control" name="tempat_praktek" id="tempat_praktek" placeholder="Tempat Praktek" value="<?php echo $tempat_praktek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Tempat Praktek <?php echo form_error('alamat_tempat_praktek') ?></label>
            <input type="text" class="form-control" name="alamat_tempat_praktek" id="alamat_tempat_praktek" placeholder="Alamat Tempat Praktek" value="<?php echo $alamat_tempat_praktek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan Tempat Praktek <?php echo form_error('kecamatan_tempat_praktek') ?></label>
            <input type="text" class="form-control" name="kecamatan_tempat_praktek" id="kecamatan_tempat_praktek" placeholder="Kecamatan Tempat Praktek" value="<?php echo $kecamatan_tempat_praktek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan Tempat Praktek <?php echo form_error('kelurahan_tempat_praktek') ?></label>
            <input type="text" class="form-control" name="kelurahan_tempat_praktek" id="kelurahan_tempat_praktek" placeholder="Kelurahan Tempat Praktek" value="<?php echo $kelurahan_tempat_praktek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan Tempat Praktek Pribadi <?php echo form_error('kecamatan_tempat_praktek_pribadi') ?></label>
            <input type="text" class="form-control" name="kecamatan_tempat_praktek_pribadi" id="kecamatan_tempat_praktek_pribadi" placeholder="Kecamatan Tempat Praktek Pribadi" value="<?php echo $kecamatan_tempat_praktek_pribadi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan Tempat Praktek Pribadi <?php echo form_error('kelurahan_tempat_praktek_pribadi') ?></label>
            <input type="text" class="form-control" name="kelurahan_tempat_praktek_pribadi" id="kelurahan_tempat_praktek_pribadi" placeholder="Kelurahan Tempat Praktek Pribadi" value="<?php echo $kelurahan_tempat_praktek_pribadi; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Status Berlaku <?php echo form_error('status_berlaku') ?></label>
            <input type="text" class="form-control" name="status_berlaku" id="status_berlaku" placeholder="Status Berlaku" value="<?php echo $status_berlaku; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Profesi <?php echo form_error('profesi') ?></label>
            <input type="text" class="form-control" name="profesi" id="profesi" placeholder="Profesi" value="<?php echo $profesi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perizinan_nakes') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>