<?php

class Model_guru extends CI_Model {

    public $table ="tbl_guru";
    
    function save($foto) {
        $data = array(
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
          
            'username'   => $this->input->post('username', TRUE),
               'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
                  'tgl_lahir'   => $this->input->post('tanggal_lahir', TRUE),
                     'no_telp'   => $this->input->post('no_telp', TRUE),
                        'agama'   => $this->input->post('agama', TRUE),
                        'alamat'   => $this->input->post('alamat', TRUE),
                        'foto'          => "$foto",
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert($this->table,$data);
    }
    
    function update($foto) {
        if(empty($foto)){

        $data = array(
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'tgl_lahir'   => $this->input->post('tanggal_lahir', TRUE),
            'no_telp'   => $this->input->post('no_telp', TRUE),
            'password'   => md5($this->input->post('password', TRUE)),
             'username'   => $this->input->post('username', TRUE),
            'agama'   => $this->input->post('agama', TRUE),
            'alamat'   => $this->input->post('alamat', TRUE),
            'gender'     => $this->input->post('gender', TRUE)
        );
                 }else{
                    $data = array(
                        'nuptk'      => $this->input->post('nuptk', TRUE),
                        'nama_guru'  => $this->input->post('nama_guru', TRUE),
                        'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
                        'tgl_lahir'   => $this->input->post('tanggal_lahir', TRUE),
                        'no_telp'   => $this->input->post('no_telp', TRUE),
                        'password'   => md5($this->input->post('password', TRUE)),
                         'username'   => $this->input->post('username', TRUE),
                        'agama'   => $this->input->post('agama', TRUE),
                        'foto'          => $foto,
                        'alamat'   => $this->input->post('alamat', TRUE),
                        'gender'     => $this->input->post('gender', TRUE)
                    );
                 }
        $id_guru   = $this->input->post('id_guru');
        $this->db->where('id_guru',$id_guru);
        $this->db->update($this->table,$data);
    }
    
    function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_guru')->row_array();
        return $user;
    }

}