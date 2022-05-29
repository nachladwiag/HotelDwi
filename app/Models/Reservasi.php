<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservasi extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'reservasi';
	protected $primaryKey           = 'id_reservasi';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_reservasi', 'no_kamar' , 'nama_tamu', 'tgl_cek_in', 'tgl_cek_out', 'jumlah_kamar', 'status', 'nama_pemesan', 'telepon', 'email'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function search($keyword){
		return $this->table('reservasi')
		->select('*')
		->like('nama_tamu', $keyword)
		->orLike('tgl_cek_in', $keyword)
		->get()->getResultArray();
		}
	
		public function cari($keyword){
			$this->table('reservasi')->like('email', $keyword);
			$this->table('reservasi')->like('status', 'cek in');
			return $this->table('reservasi')->find();
			}
}
