<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Read extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('bacadata'));
	}

	public function index()
	{
		if($this->bacadata->cek() == 0 ) $data['cek'] = "Tidak Ada Data!";
		else {
			$this->load->helper('dataolah');
			foreach ($this->bacadata->baca() as $key => $value) {
				$d[$key]['nama'] = $value['nama'];
				$d[$key]['deskripsi'] =$value['deskripsi'];
				$d[$key]['tgl'] = tgl_indo($value['tgl']);
			}
			$data['baca'] = $d;
		}

		$this->load->view('header');
		$this->load->view('ReadView',$data);
		$this->load->view('footer');	
	}
}
