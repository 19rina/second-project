<?php

class Dosen_model extends CI_Model {

    public function getAllDosen()
    {
       return $this->db->get('dosen')->result_array(); //fakultas nama table

    }

     

    public function tambahDataDosen()
    {
      $data = [
         "role_id" => "2",
         "nidn" => $this->input->post('nidn', true),
         "nama_dosen" => htmlspecialchars($this->input->post('nama_dsn', true)),
         "password" => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
      ];
        $this->db->insert('dosen', $data);
    }


}


?>
