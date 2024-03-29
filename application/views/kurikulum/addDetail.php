<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Tambah Detail
        
        </div>
        <div class="panel-body">

            <?php
            echo form_open('kurikulum/adddetail', 'role="form" class="form-horizontal"');
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KURIKULUM
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('id_kurikulum', 'tbl_kurikulum', 'nama_kurikulum', 'id_kurikulum',$this->uri->segment(3)) ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('kd_mapel', 'tbl_mapel', 'nama_mapel', 'kd_mapel') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    JURUSAN
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan') ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KELAS
                </label>
                <div class="col-sm-9">
                    <select name="kelas" class="form-control">

                        <?php
                        for ($i = 10; $i <= 12; $i++) {
                            echo "<option value='$i'>Kelas $i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('kurikulum/detail/'.$this->uri->segment(3), 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>