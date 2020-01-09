<?php
class Judul extends CI_Controller {
    function index()
	{
        $data['judul'] = 'Halaman Judul Skripsi';
        $this->load->helper('url');
        $this->load->view('skripsi/vheader', $data);
        $this->load->view('skripsi/index');
        $this->load->view('skripsi/vfooter');
        
    }
}