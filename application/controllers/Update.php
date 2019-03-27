<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Update extends CI_Controller {
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
				$d[$key]['id']				= $value['id'];
				$d[$key]['nama'] 			= $value['nama'];
				$d[$key]['deskripsi']	= $value['deskripsi'];
				$d[$key]['tgl'] 			= tgl_indo($value['tgl']);
			}
			$data['baca'] = $d;
		}
		$this->load->helper('formdata');
		$data['_form'] = _form();
		$this->load->view('header');
		$this->load->view('UpdateView',$data);
		$this->load->view('footer');
	}

	public function ubahdata()
	{
		$arg = $this->input->post('id');
		$dataolah = $this->bacadata->bacasatu($arg);

		$this->form_validation->set_data($dataolah);
		$this->form_validation->run('tambah');

		$this->load->helper('formdata');
		$data['_form'] = _form();

		$data['asalurl'] = uri_string();

		$this->load->view('header');
		$this->load->view('CreateView',$data);
		$this->load->view('footer');
	}

	public function verifikasi()
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
			if ($this->bacadata->update($arg)==0) {
				$this->session->set_flashdata('msg_data','Data '.$arg['nama'].' Tidak Di Ubah!');
			}
			else {
				$this->session->set_flashdata('msg_data','Data '.$arg['nama'].' Berhasil Diubah!');
			}
			redirect('Update');
		}
	}
}
