<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Siswa
          
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('nim', $siswa['nim']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NISN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['nim'] ?>"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13"s readonly="" placeholder="MASUKAN NIM" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA LENGKAP
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['nama'] ?>" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    USERNAME
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['username'] ?>" name="username" placeholder="MASUKAN USERNAME" id="form-field-1" class="form-control">
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PASSWORD
                </label>
                <div class="col-sm-9">
                    <input type="text"  name="password" placeholder="MASUKAN PASSWORD" id="form-field-1" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TEMPAT, TGL LAHIR
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir'] ?>" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?php echo $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>
               <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    ALAMAT 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" value="<?php echo $siswa['alamat'] ?>" placeholder="MASUKAN ALAMAT" id="form-field-1" class="form-control">
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NAMA ORANG TUA
                </label>
                <div class="col-sm-5">
                    <input type="text" name="nama_ibu" value="<?php echo $siswa['nama_ibu'] ?>" placeholder="Nama Ibu" id="form-field-1" class="form-control">
                </div>
               
                <div class="col-sm-4">
                    <input type="text" name="nama_ayah" value="<?php echo $siswa['nama_ayah'] ?>" placeholder="Nama Ayah" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    GENDER
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), $siswa['gender'], "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-3">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama', $siswa['kd_agama']);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Foto
                </label>
                <div class="col-sm-2">
                    <input type="file" name="userfile">
                    <img src="<?php echo base_url()."/uploads/".$siswa['foto']?>" width="200">
                </div>
            </div>
                        <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PILIH ROMBEL
                </label>
                <div class="col-sm-6">
                   <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel',$siswa['id_rombel'])?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>