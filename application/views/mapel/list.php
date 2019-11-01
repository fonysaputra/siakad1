<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php echo anchor('mapel/add','Input Data Baru',array('class'=>'btn btn-danger btn-sm'))?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Mata Pelajaran
            <div class="panel-tools">
               
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
            
                
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="table-responsive">
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE MAPEL</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th></th>
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
                "ajax": '<?php echo site_url('mapel/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "70px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "kd_mapel",
                        "width": "120px",
                        "sClass": "text-center"
                    },
                    { "data": "nama_mapel" },
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