<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Kelas Belajar
          
        </div>
        <div class="panel-body">

            <?php
            echo form_open('rombel/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id_rombel', $rombel['id_rombel']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA ROMBEL
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $rombel['nama_rombel']?>" name="nama_rombel" placeholder="MASUKAN NAMA ROMBEL" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    JURUSAN
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan',$rombel['kd_jurusan']) ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TINGKAT
                </label>
                <div class="col-sm-9">
                    <select name="kelas" class="form-control">

                        <?php
                        for ($i = 10; $i <= 12; $i++) {
                            echo "<option value='$i' ";
                            echo $rombel['kelas']==$i?'selected':'';
                            echo ">Kelas $i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('rombel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>