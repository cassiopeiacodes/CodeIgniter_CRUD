<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bacadata extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	private function namatabel($arg)
	{
		$str = array('TABLE_SCHEMA'=>'db_crud', 'TABLE_NAME'=>"$arg");
		$query = $this->db->get_where('INFORMATION_SCHEMA.COLUMNS',$str)->result_array();

		foreach ($query as $value) {
			if($value['COLUMN_NAME'])
			{
				$datakolom[] = $value['COLUMN_NAME'];
			}
		}
		return $datakolom;
	}

	public function cek()
  {
    return $this->db->get("item")->num_rows();
  }

	public function baca()
	{
		$this->db->select("*");
		$d = $this->db->get("item");
		return $d->result_array();
	}
	public function bacasatu($arg)
	{
		$this->db->select("*");
		$this->db->where('id',$arg);
		$d = $this->db->get("item");
		return $d->row_array();
	}

	public function tambah($arg)
	{
		//	untuk mendapatkan nama tabel dari database
		$datakolom = $this->bacadata->namatabel("item");

		foreach ($datakolom as $value) {
			if(isset($arg[$value])) {
				$d[$value] = $value;
				$datamasuk[$value] = $arg[$value];
			}
		}
		$datakolom = $d;
		$datamasuk = $this->db->escape($datamasuk);
		$datakolom = implode(",",$datakolom);
		$datamasuk = implode(",",$datamasuk);
		$sql = "INSERT INTO item ($datakolom) VALUES ($datamasuk)";

		return $this->db->query($sql);
	}
	public function update($arg)
	{
		$datamasuk = array(
			'nama'			=> $arg['nama'],
			'deskripsi'	=> $arg['deskripsi']
		);
		$cek = $this->db->where('id',$arg['id'])->get('item')->row_array();

		if( ($cek['nama']===$arg['nama']) || ($cek['deskripsi']===$arg['deskripsi']))
		{
			return 0;
		}
		else{
			$this->db->where('id',$arg['id']);
			$this->db->update('item',$datamasuk);
			return 1;
		}
	}

	public function delete($arg)
	{
		$this->db->where_in('id',$arg);
		return $this->db->delete('item');
	}
}
