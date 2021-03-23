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
        <h2 style="margin-top:0px">Sektoral_disnaker <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('NIK') ?></label>
            <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Lengkap <?php echo form_error('nm_lengkap') ?></label>
            <input type="text" class="form-control" name="nm_lengkap" id="nm_lengkap" placeholder="Nm Lengkap" value="<?php echo $nm_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gelar Belakang <?php echo form_error('gelar_belakang') ?></label>
            <input type="text" class="form-control" name="gelar_belakang" id="gelar_belakang" placeholder="Gelar Belakang" value="<?php echo $gelar_belakang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Perkawinan <?php echo form_error('status_perkawinan') ?></label>
            <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan" placeholder="Status Perkawinan" value="<?php echo $status_perkawinan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Wilayah <?php echo form_error('nama_wilayah') ?></label>
            <input type="text" class="form-control" name="nama_wilayah" id="nama_wilayah" placeholder="Nama Wilayah" value="<?php echo $nama_wilayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Instansi <?php echo form_error('nm_instansi') ?></label>
            <input type="text" class="form-control" name="nm_instansi" id="nm_instansi" placeholder="Nm Instansi" value="<?php echo $nm_instansi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sektoral_disnaker') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>