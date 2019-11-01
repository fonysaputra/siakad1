<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Jurusan
         
        </div>
        <div class="panel-body">

            <?php
            echo form_open('jurusan/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('kd_jurusan', $jurusan['kd_jurusan']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KODE MAPEL
                </label>
                <div class="col-sm-9">
                    <input type="text" readonly="" value="<?php echo $jurusan['kd_jurusan'];?>" name="kd_jurusan" placeholder="MASUKAN KODE MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $jurusan['nama_jurusan'];?>" name="nama_jurusan" placeholder="MASUKAN NAMA MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('jurusan', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>