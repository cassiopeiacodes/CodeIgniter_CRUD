<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Create extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bacadata');
	}
	public function index()
	{
		$this->load->helper('formdata');
		$data['_form'] = _form();

		$this->load->view('header');
		$this->load->view('CreateView',$data);
		$this->load->view('footer');
	}
	public function cek()
	{
		if($this->form_validation->run('tambah')==FALSE)
		{
			$this->load->helper('formdata');
			$data['_form'] = _form();

			$this->load->view('header');
			$this->load->view('CreateView',$data);
			$this->load->view('footer');
		}
		else {
			$arg = $this->input->post();
			$this->bacadata->tambah($arg);
			$this->session->set_flashdata('msg_data','Data Berhasil Ditambahkan!');
			redirect('Read');
		}
	}
}
