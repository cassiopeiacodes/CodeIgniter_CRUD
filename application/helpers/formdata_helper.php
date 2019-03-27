<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// input
	function _form(){
    $_form['nama'] = array(
      'name'					=> 'nama',
			'id'   					=> 'nama',
      'type'					=> 'text',
      'class'					=> 'form-control mt-2 mb-2',
			'value'					=> set_value('nama'),
      'placeholder'		=> 'Masukkan Nama'
    );
		$_form['deskripsi'] = array(
      'name'					=> 'deskripsi',
      'type'					=> 'text',
      'class'					=> 'form-control mt-2 mb-2',
			'value'					=> set_value('deskripsi'),
      'placeholder'		=> 'Masukkan Deskripsi'
    );

		//	button
    $_form['tambah'] = array(
      'name'					=> 'tambah',
      'class'					=> 'btn btn-warning form-control mt-2 mb-2',
      'type'					=> 'submit',
      'content'				=> 'Tambah'
    );
		$_form['update'] = array(
			'name'					=> 'update',
      'class'					=> 'btn btn-info form-control mt-2 mb-2',
      'type'					=> 'submit',
      'content'				=> 'Ubah'
		);
	  return $_form;
	}
