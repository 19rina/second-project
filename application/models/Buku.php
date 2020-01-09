<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Model {

	
	function getBuku()
	{
        $q = $this->db->get('data');
        return $q->result();
	}
	
}