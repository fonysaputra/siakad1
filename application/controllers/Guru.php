<?php

Class Guru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_guru');
    }

    function data() {
        // nama tabel
        $table = 'tbl_guru';
        // nama PK
        $primaryKey = 'id_guru';
        // list field
        $columns = array(
            array('db' => 'foto',
            'dt' => 'foto',
            'formatter' => function( $d) {
               if(empty($d)){
                   return "<img width='30px' src='".  base_url()."/uploads/user-siluet.jpg'>";
               }else{
                   return "<img width='20px' src='".  base_url()."/uploads/".$d."'>";
               }   
            }
              ),
            array('db' => 'id_guru', 'dt' => 'id_guru'),
            array('db' => 'nuptk', 'dt' => 'nuptk'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'no_telp', 'dt' => 'no_telp'),
          
                
            array(
                'db' => 'id_guru',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('guru/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('guru/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $this->template->load('template', 'guru/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_guru();
        
            $this->Model_guru->save($uploadFoto);
            redirect('guru');
        } else {
            $this->template->load('template', 'guru/add');
        }
    }

      function daftar_guru(){
     
         if($this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $nim= $this->session->userdata('id_siswa');
            $sql = "SELECT tj.id_jadwal,tjr.nama_jurusan,ts.`nim`,ts.`nama`,tj.kelas,tm.nama_mapel,tj.jam,tr.nama_ruangan,tj.hari,tj.semester,tg.`nama_guru`
                    FROM tbl_jadwal as tj 
                    inner join tbl_jurusan as tjr on tj.`kd_jurusan`=tjr.`kd_jurusan`
                    
                    inner join tbl_ruangan as tr on tj.`kd_ruangan`= tr.`kd_ruangan`
                    inner join tbl_mapel as tm on tj.`kd_mapel`=tm.`kd_mapel`
                    inner join tbl_siswa as ts on ts.`id_rombel`=tj.`id_rombel` 
                    inner join tbl_guru as tg on tj.`id_guru`=tg.`id_guru`
                    where ts.`nim`= '$nim' group by tj.`id_jadwal` "
             ;
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','jadwal/jadwal_ajar_guru_siswa',$data);
        }
        else{
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $this->template->load('template','jadwal/list',$data);
        }
    }
    
    
        function profil(){
        if(isset($_POST['submit'])){
            $this->Model_guru->update();
            redirect('guru');
        }else{
            $id_guru      =$this->session->userdata('id_guru');
            $data['guru'] = $this->db->get_where('tbl_guru',array('id_guru'=>$id_guru))->row_array();
            $this->template->load('template', 'guru/editguru',$data);
        }
    }

    function edit(){
        if(isset($_POST['submit'])){
            $uploadFoto = $this->upload_foto_guru();
            $this->Model_guru->update($uploadFoto );
            redirect('guru');
        }else{
            $id_guru      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tbl_guru',array('id_guru'=>$id_guru))->row_array();
            $this->template->load('template', 'guru/edit',$data);
        }
    }

     function editguru(){
        if(isset($_POST['submit'])){
            $uploadFoto = $this->upload_foto_guru();
            $this->Model_guru->update( $uploadFoto);
            redirect('jadwal');
        }else{
            $id_guru      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tbl_guru',array('id_guru'=>$id_guru))->row_array();
            $this->template->load('template', 'guru/editguru',$data);
        }
    }

    function upload_foto_guru(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|PNG|JPEG|JPG';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
    
    function delete(){
        $id_guru = $this->uri->segment(3);
        if(!empty($id_guru)){
            // proses delete data
            $this->db->where('id_guru',$id_guru);
            $this->db->delete('tbl_guru');
        }
        redirect('guru');
    }

}