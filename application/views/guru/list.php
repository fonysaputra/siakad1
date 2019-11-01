<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php echo anchor('guru/add','Input Data Baru',array('class'=>'btn btn-danger btn-sm'))?>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Guru
            <div class="panel-tools">
             
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
            
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
             
            </div>
        </div>
        <div class="table-responsive">
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FOTO </th>
                        <th>NUPTK</th>
                        <th>NAMA GURU</th>
                        <th>ALAMAT</th>
                        <th>NO TELFON</th>
                    
                        <th>-</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>


  <script>
        $(document).ready(function() {
            var t = $('#mytable').DataTable( {
                "ajax": '<?php echo site_url('guru/data'); ?>',
                "order": [[ 2, 'desc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    { "data": "foto" },
                    {
                        "data": "nuptk",
                        "width": "120px",
                        "sClass": "text-left"
                    },
                    { "data": "nama_guru" },
                    { "data": "alamat" },
                    { "data": "no_telp","width": "90px", },

                    { "data": "aksi","width": "80px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>