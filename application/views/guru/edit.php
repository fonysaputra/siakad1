<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Guru
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                
                <a class="btn btn-xs btn-link panel-refresh" href="#">
                    <i class="fa fa-refresh"></i>
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-resize-full"></i>
                </a>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('guru/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id_guru', $guru['id_guru']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NUPTK
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nuptk" value="<?php echo $guru['nuptk']?>" placeholder="MASUKAN NUPTK" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA GURU
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $guru['nama_guru']?>" name="nama_guru" placeholder="MASUKAN NAMA GURU" id="form-field-1" class="form-control">
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NO TELFON
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $guru['no_telp']?>" name="no_telp" placeholder="MASUKAN NAMA GURU" id="form-field-1" class="form-control">
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TEMPAT, TGL LAHIR
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" value="<?php echo $guru['tempat_lahir'] ?>" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?php echo $guru['tgl_lahir'] ?>" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-9">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama', $guru['agama']);
                    ?>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" value="<?php echo $guru['alamat'] ?>" placeholder="MASUKAN ALAMAT" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Foto
                </label>
                <div class="col-sm-2">
                    <input type="file" name="userfile">
                </div>
            </div>   

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    USERNAME
                </label>
                <div class="col-sm-9">
                    <input type="text" name="username"  value="<?php echo $guru['username']?>" placeholder="MASUKAN USERNAME" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PASSWORD
                </label>
                <div class="col-sm-9">
                    <input type="password" name="password" placeholder="MASUKAN PASSWORD" id="form-field-1" class="form-control">
                </div>
            </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('guru', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>