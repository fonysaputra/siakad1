<?php
Class jadwal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_jadwal'));
    }
    
    function index(){
        if($this->session->userdata('id_level_user')==3){
            // load daftar ngajar guru
            $sql = "SELECT tj.id_jadwal,tjr.nama_jurusan,tj.kelas,tm.nama_mapel,tj.jam,tr.nama_ruangan,tj.hari,tj.semester
                    FROM tbl_jadwal as tj,tbl_jurusan as tjr,tbl_ruangan as tr,tbl_mapel as tm
                    WHERE tj.kd_jurusan=tjr.kd_jurusan and tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tj.id_guru=".$this->session->userdata('id_guru');
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','jadwal/jadwal_ajar_guru',$data);
        }
         elseif($this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $nim= $this->session->userdata('id_siswa');
            $sql = "SELECT tj.id_jadwal,tjr.nama_jurusan,ts.`nim`,ts.`nama`,tj.kelas,tm.nama_mapel,tj.jam,tr.nama_ruangan,tj.hari,tj.semester
                    FROM tbl_jadwal as tj 
                    inner join tbl_jurusan as tjr on tj.`kd_jurusan`=tjr.`kd_jurusan`
                    
                    inner join tbl_ruangan as tr on tj.`kd_ruangan`= tr.`kd_ruangan`
                    inner join tbl_mapel as tm on tj.`kd_mapel`=tm.`kd_mapel`
                    left join tbl_siswa as ts on ts.`id_rombel`=tj.`id_rombel` 
                    where ts.`nim`= '$nim' group by tj.`id_jadwal` "
             ;
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','jadwal/jadwal_ajar_siswa',$data);
        }
        else{
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $data['jadwalku'] = 2;
        $this->template->load('template','jadwal/list',$data);
        }
    }
    
    function generate_jadwal(){
        if(isset($_POST['submit'])){
            $this->model_jadwal->generateJadwal();
        }
        redirect('jadwal');
    }
    
    function dataJadwal(){
        $kd_jurusan     = $_GET['jurusan'];
        $kelas          = $_GET['kelas'];
        $id_kurikulum   = $_GET['id_kurikulum'];
        $rombel         = $_GET['rombel'];

        if($kelas=='semua_kelas'){
            $selected_kelas = '';
        }else{
            $selected_kelas="and kd.kelas='$kelas'";
        }
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MATA PELAJARAN</th>
                        <th>GURU</th>
                        <th>RUANGAN</th>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th></th>
                    </tr>
                </thead>";
        
        $sql = "SELECT tj.hari,tj.id_jadwal,tm.nama_mapel,tg.id_guru,tg.nama_guru,tr.kd_ruangan,tj.hari,tj.jam 
        FROM tbl_jadwal as tj inner join tbl_mapel as tm on tj.`kd_mapel`=tm.`kd_mapel` 
        inner join tbl_ruangan as tr on tj.`kd_ruangan`=tr.`kd_ruangan` 
        left join tbl_guru as tg on tg.`id_guru`=tj.`id_guru` where tj.`id_rombel`= '$rombel' 
       ";
        $jadwal = $this->db->query($sql)->result();
        $no=1;
        $jam_pelajaran = $this->model_jadwal->getJamPelajaran();
        $hari          = array (
                        'Pilih Hari'=>'Pilih Hari',
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU');
        foreach ($jadwal as $row){
            echo"<tr><td>$no</td>
                <td>$row->nama_mapel</td>
                <td>".  cmb_dinamis('guru', 'tbl_guru', 'nama_guru', 'id_guru',$row->id_guru,"id='guru".$row->id_jadwal."' onchange='updateGuru(".$row->id_jadwal.")'")."</td>
                <td>".  cmb_dinamis('ruangan', 'tbl_ruangan', 'nama_ruangan', 'kd_ruangan',$row->kd_ruangan,"id='ruangan".$row->id_jadwal."' onchange='updateRuangan(".$row->id_jadwal.")'")."</td>
                <td>".  form_dropdown('hari',$hari,$row->hari,"class='form-control' id='hari".$row->id_jadwal."' onchange='updateHari(".$row->id_jadwal.")'")."</td>
                <td>".  form_dropdown('jam',$jam_pelajaran,$row->jam,"class='form-control' id='jam".$row->id_jadwal."' onchange='updateJam(".$row->id_jadwal.")'")."</td>
                <td>".anchor('jadwal/deletejadwal/'.$row->id_jadwal,'<i class="fa fa-trash"></i>')."</td></tr>";
            $no++;
        }
        
        echo"</table>";
        

    }
    
    function updateGuru(){
        $id_guru = $_GET['id_guru'];
        $id_jadwal = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('id_guru'=>$id_guru));
    }
    
   function updateRuangan(){
        $kd_ruangan = $_GET['kd_ruangan'];
        $id_jadwal  = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('kd_ruangan'=>$kd_ruangan));
    }
    
    function updateHari(){
        $hari       = $_GET['hari'];
        $id_jadwal  = $_GET['id_jadwal'];
      

        $cek = "SELECT tbl_jadwal.*,COUNT(jam) as jumlah FROM tbl_jadwal WHERE hari='$hari'  ";
        $tbrk= $this->db->query($cek)->result();
        foreach ($tbrk as $row){
            $jam = $row->jam;
            $oke=$row->jumlah;
            if($oke >= 1){

                $cek2 = "SELECT COUNT(jam) as jumlah_jam FROM tbl_jadwal WHERE jam='$jam'   ";
                $tbrk2= $this->db->query($cek2)->result();
    
                foreach($tbrk2 as $row2){
                    $jumlah_jam = $row2->jumlah_jam;
                    
                    if($jumlah_jam >= $oke+1){
                       // echo"Jadwal Sudah Ada...... ";
                       $this->db->where('id_jadwal',$id_jadwal);
                       $this->db->update('tbl_jadwal',array('hari'=>$hari));
                    }else{

                        $this->db->where('id_jadwal',$id_jadwal);
                        $this->db->update('tbl_jadwal',array('hari'=>$hari));
                    }
                }
            }else{
                $this->db->where('id_jadwal',$id_jadwal);
                $this->db->update('tbl_jadwal',array('hari'=>$hari));

            }
    }

}
    
    function updateJam(){
        $jam        = $_GET['jam'];
        $id_jadwal  = $_GET['id_jadwal'];

        $cek = "SELECT tbl_jadwal.*,COUNT(jam) as jumlah FROM tbl_jadwal WHERE jam='$jam'  ";
        $tbrk= $this->db->query($cek)->result();
        foreach ($tbrk as $row){
            $hari = $row->hari;
             $ruangan = $row->kd_ruangan;
            $oke=$row->jumlah;
            if($oke >= 1){

                $cek2 = "SELECT tbl_jadwal.*,COUNT(hari) as jumlah_hari FROM tbl_jadwal WHERE hari='$hari' and kd_ruangan='$ruangan' and jam='$jam'   ";
                $tbrk2= $this->db->query($cek2)->result();
    
                foreach($tbrk2 as $row2){
                    $jumlah_hari = $row2->jumlah_hari;
                    $hari2= $row2->hari;
                   if($jumlah_hari > 1 ){
                    echo "Jadwal Sudah Ada.. ";
                   }else{
                   
                    $this->db->where('id_jadwal',$id_jadwal);
                    $this->db->update('tbl_jadwal',array('jam'=>$jam));
                       
                   }
                }
                    
                //     if($jumlah_hari < $oke){

                //         $this->db->where('id_jadwal',$id_jadwal);
                //         $this->db->update('tbl_jadwal',array('jam'=>$jam));
                //         echo"Jadwal Sudah Ada 2 ...... ";
                      
                //     }else{
                     
                //         if($jumlah_hari > 2){
                //             echo"Jadwal Sudah Ada...... " + $jumlah_hari;
                       
                //         }
                //         else{
                //             $this->db->where('id_jadwal',$id_jadwal);
                //             $this->db->update('tbl_jadwal',array('jam'=>$jam));
                //             echo"Jadwal Sudah Ada...... " + $oke;
                //         }
                   
                //     }
                // }
            }else{
                $this->db->where('id_jadwal',$id_jadwal);
                $this->db->update('tbl_jadwal',array('jam'=>$jam));

              //  echo"Jadwal Sudah Ada...... " + $oke;

            }        
            
        }

      
    }
    
    function show_rombel(){
        echo "<select id='rombel' name='rombel' class='form-control' onchange='loadPelajaran()'>";
        $where  = array ('kd_jurusan'=>$_GET['jurusan'],'kelas'=>$_GET['kelas']);
        $rombel = $this->db->get_where('tbl_rombel',$where);
        foreach ($rombel->result() as $row){
            echo "<option value='$row->id_rombel'>$row->nama_rombel</option>";
        }
        echo "</select>";
    }
    
    function cetak_jadwal(){
        $rombel = $_POST['rombel'];
        $this->load->library('CFPDF');
        $days          = array (
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU');
        
        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,10,'NO',1,0,'L');
        $pdf->Cell(30,10,'WAKTU',1,0,'L');
        // foreach di kolom judul
        foreach ($days as $day){
            $pdf->Cell(40,10,$day,1,0,'L');
        }
        $pdf->Cell(30,10,'',0,1,'L');
        
        $jam_ajar = $this->model_jadwal->getJamPelajaranCetak();
        $no=1;
        foreach ($jam_ajar  as $jam){
            $pdf->Cell(10,10,$no,1,0,'L');
            $pdf->Cell(30,10,$jam,1,0,'L');
            // foreach hari di kolom jadwal
            foreach ($days as $day){
                $pdf->Cell(40,10,  $this->getPelajaran($jam, $day, $rombel),1,0,'L');
            }
             $pdf->Cell(30,10,'',0,1,'L');
            $no++;
        }
        $pdf->Output();
    }
    
    
    function getPelajaran($jam,$hari,$rombel){
        $sql = "SELECT tj.*,tm.nama_mapel
                FROM tbl_jadwal as tj,tbl_mapel as tm 
                WHERE tj.kd_mapel=tm.kd_mapel and tj.id_rombel=$rombel and tj.hari='$hari' and tj.jam='$jam'";
        $pelajaran = $this->db->query($sql);
        if($pelajaran->num_rows()>0){
            $row = $pelajaran->row_array();
            return $row['nama_mapel'];
        }else{
            return '-';
        }
    }

      function deletejadwal(){
        $kd = $this->uri->segment(3);
        if(!empty($kd)){
            // proses delete data
            $this->db->where('id_jadwal',$kd);
            $this->db->delete('tbl_jadwal');
        }
        redirect('jadwal');
    }
    
}