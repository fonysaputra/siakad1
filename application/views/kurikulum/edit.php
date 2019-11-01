<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Kurikulum
          
        </div>
        <div class="panel-body">

            <?php
            echo form_open('kurikulum/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id_kurikulum', $kurikulum['id_kurikulum']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA KURIKULUM
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $kurikulum['nama_kurikulum'];?>" name="nama_kurikulum" placeholder="MASUKAN NAMA KURIKULUM" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    IS AKTIF
                </label>
                <div class="col-sm-9">
                    <?php echo form_dropdown('is_aktif',array('n'=>'TIDAK','y'=>'AKTIF'),$kurikulum['is_aktif'],"class='form-control'")?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('kurikulum', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>