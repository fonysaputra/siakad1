<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Tahun AKademik
           
        </div>
        <div class="panel-body">

            <?php
            echo form_open('tahunakademik/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id_tahun_akademik', $tahunakademik['id_tahun_akademik']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TAHUN AKADEMIK
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $tahunakademik['tahun_akademik'];?>" name="tahun_akademik" placeholder="MASUKAN TAHUN AKADEMIK" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    IS AKTIF
                </label>
                <div class="col-sm-9">
                    <?php echo form_dropdown('is_aktif',array('n'=>'TIDAK','y'=>'AKTIF'),$tahunakademik['is_aktif'],"class='form-control'")?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('tahunakademik', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>