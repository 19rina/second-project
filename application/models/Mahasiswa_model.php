<?php

class Mahasiswa_model extends CI_Model {

    public function getAllMahasiswa()
    {
       //return $this->db->get('mhs')->result_array(); //fakultas nama table
       $this->db->select('mhs.id, mhs.nim, mhs.nama_mhs, fakultas.nama_fakultas, prodi.nama_prodi, mhs.id_judul, mhs.image, mhs.password');
      $this->db->from('mhs');
      $this->db->join('fakultas','mhs.id_fakultas = fakultas.id');
      $this->db->join('prodi','mhs.id_prodi = prodi.id');
      return $this->db->get()->result_array();

    }

    public function getProdi()
    {
       return $this->db->get('prodi')->result_array(); //prodi nama table
    }  
    
    public function getFak()
    {
       return $this->db->get('fakultas')->result_array(); //prodi nama table
    }     

    public function getUser(){
      return $this->db->get('user')->result_array(); //prodi nama table
    }

    public function tambahDataMahasiswa()
    {
      date_default_timezone_set('Asia/Jakarta');
      $skr = date("dmy-Hi");

      $foto=$_FILES['foto'];
      //$extensionnya = explode('.', $foto);//pisah ambil extensionnya saja
      $nm_file = $this->input->post('nama');
      $nama_file = "$nm_file$skr";

      if($foto=''){
      }
      else
      {
      $config['upload_path'] = 'img/';
      $config['allowed_types'] = 'jpg|jpeg|png|gift';
      $config['max_size'] = 1000; //1mb
      $config['max_width'] = 1024;
      $config['max_height'] = 768;
      $config['file_name'] = $nama_file;
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('foto')){
      echo "gagal";
      }else
      {
      $foto=$this->upload->data('file_name');
      }
      
      }


      $data = [
         "id_fakultas" => $this->input->post('fakul', true),
         "id_prodi" => $this->input->post('pro', true),
         "role_id" => "3",
         "nim" => htmlspecialchars($this->input->post('nim', true)),
         "nama_mhs" => htmlspecialchars($this->input->post('nama', true)),
         'image' => 'default.jpg',
         "password" => password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
      ];
      $this->db->insert('mhs', $data);
      $datau = [
         "nama_user" =>  $this->input->post('nama', true),
         "no_user" =>  $this->input->post('nim', true),
         "password" => password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
      ];
      $this->db->insert('user', $datau);
    }
    public function hapusdataMHS($id)
    {
     // $this->db->where('id', $id);
      //$this->db->delete('mhs');
      //atau dengan seperti ini.. sama aja
      $this->db->delete('mhs', ['nim' => $id]);
    }    

   public function editdataMHS($id)
   {
   //$this->db->where('id', $id);
  // $this->db->get('mhs');
   return $this->db->get_where('mhs', ['id' => $id])->row_array();

   }  
   
   

   public function ubahMahasiswa()
   {

      date_default_timezone_set('Asia/Jakarta');
      $skr = date("dmy-Hi");
      //ambil data foto, cek ganti atau tidak
     // $dt_ft = $this->input->post('foto');
//$datafto = $this->db->get_where('mhs', ['image' => $dt_ft])->row_array();

//
      ///cek apakah pass tidak di ubah, jika tidak maka jgn md5
      $inputpass = $this->input->post('pass');
      $passtersimpan = $this->db->get_where('mhs', ['password' => $inputpass])->row_array();
      if(!empty($passtersimpan))
      {
         $pass = $inputpass;

      }
      else
      {
         $pass = password_hash($this->input->post('pass', true));

      }
      ///akhir prosses cek pass konvert md5  


      $foto=$_FILES['foto'];
      $nm_file = $this->input->post('nama');
      $nama_file = "$nm_file$skr";

      if($foto = '')
      {

      }
      else
      {
      //$nama_file = "$nm_file$skr";
      $config['upload_path'] = 'assets/img/';
      $config['allowed_types'] = 'jpg|jpeg|png|gift';
      $config['max_size'] = 1000; //1mb
      $config['max_width'] = 1024;
      $config['max_height'] = 768;
      $config['file_name'] = $nama_file;
      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('foto')){
      echo "Foto Gagal Di Upload";

      }else
      {
      $inputfto = $this->upload->data('file_name');
      }
      
      }

      $data = [
         "nama_mhs"    => $this->input->post('nama', true),
         "nim"         => $this->input->post('nim', true),
         "id_fakultas" => $this->input->post('fakul', true),
         "id_prodi"    => $this->input->post('pro', true),
         "role_id"     => "3",
         "password"    => $pass, //MD5($this->input->post('pass', true)),
         "image"       => $inputfto
   ];

   $this->db->where('id', $this->input->post('id'));
   $this->db->update('mhs', $data); 

   }

   

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('tbl_buku')
                 ->order_by('id_buku', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("tbl_buku", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id_user)
    {
        $this->db->select('user.*,mhs.*');
        $this->db->from('mhs');
        $this->db->join('user','mhs.nim=user.no_user','left');
        $this->db->where('mhs.nim',$id_user);
        $query = $this->db->get();

        if($query){
            return $query->row();
        }else {
            return false;
        }


        // $query = $this->db->where("id", $id_user)
        //         ->get("mhs");

        // if($query){
        //     return $query->row();
        // }else{
        //     return false;
        // }

    }

    public function update($data, $id)
    {
        
      //$id['id'] = $this->input->post("id");

         $data = [
            "id_fakultas" => $this->input->post('fakul', true),
            "id_prodi" => $this->input->post('pro', true),
            "role_id" => "3",
            "nim" => htmlspecialchars($this->input->post('nim', true)),
            "nama_mhs" => htmlspecialchars($this->input->post('nama', true)),
            'image' => 'default.jpg',
            "password" => password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
         ];
         //$this->db->insert('mhs', $data);
         $datau = [
            "nama_user" =>  $this->input->post('nama', true),
            "no_user" =>  $this->input->post('nim', true),
            "password" => password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
         ];
         //$this->db->insert('user', $datau);


                      
      $query = $this->db->update("mhs", $data, $id);
      $queryuser = $this->db->update("user", $datau, $id);

        if($query && $queryuser){
            return true;
        }else{
            return false;
        }

    }


    public function perbarui($data, $id){
        $query = $this->db->update("mhs", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("mhs", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
 





?>
