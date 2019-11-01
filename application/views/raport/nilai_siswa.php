<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>

       
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Nilai Siswa
            <div class="panel-tools">

            </div>
        </div>
     
        <div class="panel-body">
                <table class="table table-bordered">
                    <tr><th width="250">MATA PELAJARAN</th>
                        <th>KKM</th>
                        <th>ANGKA</th>
                         <th>HURUF</th>
                         <th>KETERCAPAIAN</th>
                         <th>RATA-RATA KELAS</th>
                    </tr>
                    <?php

                       $sqlMapel = "SELECT tj.id_jadwal,tm.nama_mapel 
                    FROM tbl_jadwal as tj inner join tbl_mapel as tm on tj.kd_mapel=tm.kd_mapel group by tm.`kd_mapel`
                   ";
        $mapel = $this->db->query($sqlMapel);

                    foreach ($mapel->result() as $row){
                        $nilai= chek_nilai($nim, $row->id_jadwal);
                        $id_jadwal=$row->id_jadwal;

                         if($nilai>90){
                         $ter="Sangat Baik";
                          }elseif($nilai>80 and $nilai<=90){
                             $ter="Baik";
                        }elseif($nilai>75 and $nilai<=80){
                        $ter="Cukup";
                          }else{
                          $ter="Kurang";
                         }
                           $sql   =  "SELECT sum(nilai)/count(nim) as nilai_rata_rata FROM tbl_nilai WHERE id_jadwal=$id_jadwal";
                          $rata = $this->db->query($sql);
                            foreach ($rata->result() as $q){
                                $a=$q->nilai_rata_rata;
                            }

                        echo "<tr>
                            <td width='100'>$row->nama_mapel</td>
                            <td>75</td>";?>
                            <td><?php echo $nilai ?> </td>
                            <td><?php echo Terbilang($nilai) ?></td>
                            <td><?php  echo $ter;   ?></td>
                            <td><?php  echo ceil($a); ?></td>
                         </tr>
                 <?php   }
                    ?>
                </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
