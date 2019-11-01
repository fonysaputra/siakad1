
<!-- add wali kelas -->
<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Tambah Wali Kelas
          
        </div>
        <div class="panel-body">

            <?php
            echo form_open('walikelas/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="col-md-12">
             <table class="table table-bordered">
                <tr><td width='200'>TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik') ?></td></tr>
                <tr><td>SEMESTER</td><td> : <?php echo get_tahun_akademik_aktif('semester_aktif') ?></td></tr>
            </table>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Kelas Belajar
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel') ?>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Wali Kelas
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('walikelas', 'tbl_guru', 'nama_guru', 'id_guru') ?>
                </div>
            </div>

   
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">TAMBAH WALI KELAS</button>
                </div>
               
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Wali Kelas
            <div class="panel-tools">
              
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
              
                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KELAS BELAJAR</th>
                        <th>NAMA JURUSAN</th>
                        <th>KELAS</th>
                        <th>NAMA WALIKELAS</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>


<script type="text/javascript">
    function updateDataWalikelas(id_walikelas){
        var id_guru = $("#guru"+id_walikelas).val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/walikelas/updateWalikelas',
            data:'id_walikelas='+id_walikelas+'&id_guru='+id_guru,
            success:function(html){
                //$("#showRombel").html(html);
                //loadPelajaran();
            }
        })
    }

</script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('walikelas/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
                {
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                { "data": "nama_rombel" },
                { "data": "nama_jurusan" },
                { "data": "kelas" },
                { "data": "nama_guru" },
                    
            ]
        } );
               
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>