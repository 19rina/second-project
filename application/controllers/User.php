<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index(){
        $data['title'] = 'Menu Login';
        $data['mhs'] = $this->db->get_where('mhs',['nim'=> $this->session->userdata('nim')])->row_array();
        //$data['mhs'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
       $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
}
}