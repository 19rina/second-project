<?php
class Bimbing extends CI_Controller {
    function index()
	{
        $data['judul'] = 'Halaman Dosen Pembimbing';
        $this->load->view('dbimbing/vheader', $data);
        $this->load->view('dbimbing/index');
        $this->load->view('dbimbing/vfooter');
        
    }
}