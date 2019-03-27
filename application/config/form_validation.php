<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['error_prefix'] = '<small class="text-danger">';
$config['error_suffix'] = '</small>';
$config['tambah'] = array(
  array(
    'field'       => "nama",
    'label'       => "Nama",
    'rules'       => "trim|required|max_length[20]",
    'errors'      => array(
      'required'      => "*{field} tidak boleh kosong!",
      'max_length'    => '*{field} tidak boleh lebih dari 20!'
    )
  ),
  array(
    'field'       => 'deskripsi',
    'label'       => 'Deskripsi',
    'rules'       => 'trim|required',
    'errors'      => array( 'required'  => "*{field} tidak boleh kosong!" )
  )
);
