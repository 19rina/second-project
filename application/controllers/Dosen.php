<?php

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');
    }    


    public function index()
    {
    $this->load->model('Dosen_model');
    $data['judul'] = 'Daftar Dosen';
    $data['dosen'] = $this->Dosen_model->getAllDosen(); //samakan dengan table di model mahasiswa
    $this->load->view('template/auth_vheader', $data); 
    $this->load->view('auth/vregisdosen', $data);
    $this->load->view('template/auth_vfooter');
    }


    public function tambah()
    {


    //$data['nidn'] = $this->Dosen_model->getAllDosen(); //samakan dengan table di model mahasiswa
    //$data['fakultas'] = $this->Mahasiswa_model->getFak();    
    $data['judul'] = 'Form Tambah Dosen';

    $this->form_validation->set_rules('nama_dsn', 'Nama', 'required|trim');
    $this->form_validation->set_rules('nidn', 'Nidn', 'required|numeric|trim|is_unique[dosen.nidn]',[
        'is_unique' => 'Nim ini sudah diinputkan'
    ]);
    
    $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]');
    $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass2]');

        if($this->form_validation->run() == FALSE )
        {

        $this->load->view('template/auth_vheader', $data); 
        $this->load->view('auth/vregisdosen');
       $this->load->view('template/auth_vfooter');

        }
        else
        {
        $this->Dosen_model->tambahDataDosen();
        $this->session->set_flashdata('massage','<div class="alert alert-success" role="alert">
        Akun telah sukses dibuat!
      </div>');
      redirect('auth/login');
        
        
        }
    }


}


?>