<div class="col-sm-6">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Form Data Peserta Didik
          
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NISN
                </label>
                <div class="col-sm-4">
                    <input type="text" name="nim" placeholder="MASUKAN NISN"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13" id="form-field-1" class="form-control">
                </div>
              
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NAMA 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>
               <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    USERNAME 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="username" placeholder="MASUKAN USERNAME" id="form-field-1" class="form-control">
                </div>
            </div>

               <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    PASSWORD 
                </label>
                <div class="col-sm-9">
                    <input type="password" name="password" placeholder="MASUKAN PASSWORD" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    TTL
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="date" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    ALAMAT 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" placeholder="MASUKAN ALAMAT" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    JENIS KELAMIN
                </label>
                <div class="col-sm-5">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), null, "class='form-control'");
                    ?>
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NAMA ORANG TUA
                </label>
                <div class="col-sm-5">
                    <input type="text" name="nama_ibu" placeholder="Nama Ibu" id="form-field-1" class="form-control">
                </div>
               
                <div class="col-sm-4">
                    <input type="text" name="nama_ayah" placeholder="Nama Ayah" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-5">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Foto
                </label>
                <div class="col-sm-2">
                    <input type="file" name="userfile">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                PILIH ROMBEL
                </label>
                <div class="col-sm-6">
                    <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-2">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-3">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>


    <!-- end: TEXT FIELDS PANEL -->
</div>
