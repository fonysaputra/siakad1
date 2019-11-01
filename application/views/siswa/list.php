<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
   <?php echo anchor('siswa/add','Input Data Baru',array('class'=>'btn btn-danger btn-sm'))?>
   <!-- Trigger the modal with a button 
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Import Data Excel Dari Dapodik</button> -->

    <div style="margin-bottom: 10px;"></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Siswa
            <div class="panel-tools">
             
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
            
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
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
                        <th>FOTO</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                         <th>NAMA AYAH</th>
                          <th>NAMA IBU</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
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
                "ajax": '<?php echo site_url('siswa/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    { "data": "foto" },
                    {
                        "data": "nim",
                        "width": "120px",
                        "sClass": "text-center"
                    },
                    { "data": "nama" },
                      { "data": "nama_ayah" },
                        { "data": "nama_ibu" },
                    { "data": "tempat_lahir" },
                    { "data": "tanggal_lahir", "width": "150px" },
                    { "data": "aksi","width": "75px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Upload</h4>
      </div>
      <div class="modal-body">
          <p>Silahkan pilih file excel hasil export data siswa dari aplikasi dapodik.</p>
          <table class="table table-bordered">
              <tr><td width="100">Pilih File</td><td><input type="file" name="file"></td></tr>
          </table>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-sm">Upload Data</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>