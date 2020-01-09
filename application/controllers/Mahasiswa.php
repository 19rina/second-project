<?php

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }    


    public function index()
    {
        $this->load->model('Mahasiswa_model');
    $data['title'] = 'Daftar Mahasiswa';
    //$data['fakultas'] = $this->Mahasiswa_model->getFak(); 
    $data['mhs'] = $this->Mahasiswa_model->getAllMahasiswa(); //samakan dengan table di model mahasiswa
    $data['query_joinnya'] = $this->Mahasiswa_model->getAllMahasiswa(); //samakan dengan table di model mahasiswa
    $this->load->view('template/header', $data); 
    $this->load->view('template/sidebar', $data); 
    $this->load->view('template/topbar', $data); 
    $this->load->view('mahasiswa/index', $data);
    //$this->load->view('templates/footer');



    //     $this->load->model('Mahasiswa_model');
    //     $data['title'] = 'Menu Login';
    //     $data['mhs'] = $this->Mahasiswa_model->getAllMahasiswa(); //samakan dengan table di model mahasiswa
    //     //$data['mhs'] = $this->Mahasiswa_model->getAllMahasiswa();
    //     $this->load->view('template/header', $data);
    //     $this->load->view('template/sidebar', $data);
    //    $this->load->view('template/topbar', $data);
    //     $this->load->view('auth/vregistration', $data);
    //     //$this->load->view('template/footer');


    // $this->load->model('Mahasiswa_model');
    // $data['judul'] = 'Daftar Mahasiswa';
    // $data['mhs'] = $this->Mahasiswa_model->getAllMahasiswa(); //samakan dengan table di model mahasiswa
    // $this->load->view('template/auth_vheader', $data); 
    // $this->load->view('auth/vregistration', $data);
    // $this->load->view('template/auth_vfooter');
    }


    public function tambah()
    {


    $data['prodi'] = $this->Mahasiswa_model->getProdi(); //samakan dengan table di model mahasiswa
    $data['fakultas'] = $this->Mahasiswa_model->getFak();    
    $data['title'] = 'Form Tambah Mahasiswa';

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('nim', 'Nim', 'required|numeric|trim|is_unique[mhs.nim]',[
        'is_unique' => 'Nim ini sudah diinputkan'
    ]);
    $this->form_validation->set_rules('fakul', 'Fakultas', 'required|numeric');
    $this->form_validation->set_rules('pro', 'Prodi', 'required');
    $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]');
    $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass2]');

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('template/header', $data); 
    $this->load->view('template/sidebar', $data); 
    $this->load->view('template/topbar', $data); 
    $this->load->view('mahasiswa/tambah', $data);



        // $this->load->view('template/auth_vheader', $data); 
        // $this->load->view('auth/vregistration');
        // $this->load->view('template/auth_vfooter');

        }
        else
        {
            ///cek duplikat nim
     $inputnim = $this->input->post('nim');
     $nimtersimpan = $this->db->get_where('mhs', ['nim' => $inputnim])->row_array();
     if(!empty($nimtersimpan))
     {
      
       $this->load->view('templates/header', $data); 
       $this->load->view('mahasiswa/tambah');
       $this->load->view('templates/footer');
       $this->session->set_flashdata('flash', "Nim : $inputnim Sudah Pernah Ada.");
       redirect('mahasiswa/tambah');

     }
     else
     {
        $this->Mahasiswa_model->tambahDataMahasiswa();
        $this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
        redirect('mahasiswa');

     }
     ///akhir cek duplikat nim


    //     $this->Mahasiswa_model->tambahDataMahasiswa();
    // //     $this->session->set_flashdata('massage','<div class="alert alert-success" role="alert">
    // //     Akun telah sukses dibuat!
    // //   </div>');
    //   redirect('mahasiswa');
        
        
        }
    }

    // function edit($id){
    //     $where = array('id' => $id);
    //     $data['user'] = $this->m_data->edit_data($where,'user')->result();
    //     $this->load->view('v_edit',$data);
    // }
    public function hapusmhs($id)
    {
        $this->Mahasiswa_model->hapusdataMHS($id);
        //$this->session->set_flashdata('flash', 'Telah Dihapus');
        redirect('mahasiswa');
    }

    public function detailmhs($id)
    {
        $data['prodi'] = $this->Mahasiswa_model->getProdi(); //samakan dengan table di model mahasiswa
        $data['fakultas'] = $this->Mahasiswa_model->getFak();    
        $data['title'] = 'Edit Data Mahasiswa';
        $data['query_joinnya'] = $this->Mahasiswa_model->editdataMHS($id);


        //$this->session->set_flashdata('flash', 'Diubah');
       // redirect('mahasiswa');

       $this->form_validation->set_rules('nama', 'Nama', 'required');
       $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
       $this->form_validation->set_rules('fakul', 'Fakultas', 'required|numeric');
       $this->form_validation->set_rules('pro', 'Prodi', 'required');
       $this->form_validation->set_rules('pass', 'Password', 'required');
   
           if($this->form_validation->run() == FALSE )
           {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data); 
            $this->load->view('template/topbar', $data); 
            $this->load->view('mahasiswa/detailmhs', $data);
            //$this->load->view('template/footer');
   
           }
           else
           {
           $this->Mahasiswa_model->ubahMahasiswa();
           $this->session->set_flashdata('flash', 'Berhasil Diubah');
           redirect('mahasiswa');
           }


    } 

    public function editku($id_user)
    {
       
        //$id_user = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data User',
            'data_user' => $this->Mahasiswa_model->edit($id_user)

        );

        $this->load->view('edit_user', $data);
    
    }

    public function update()
    {
        $id['nim'] = $this->input->post("nim");
        $data = [
            "id_fakultas" => $this->input->post('fakul', true),
            "id_prodi" => $this->input->post('pro', true),
            "role_id" => "3",
            "nim" => htmlspecialchars($this->input->post('nim', true)),
            "nama_mhs" => htmlspecialchars($this->input->post('nama', true)),
            'image' => 'default.jpg',
            "password" => password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
         ];
         
       

        $this->Mahasiswa_model->perbarui($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('mahasiswa/');

    }
    
        


}


?>