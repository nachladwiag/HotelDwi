<?php

namespace App\Controllers;
use App\Controllers\Home\reservasi;
use TCPDF;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	public function home_tamu()
	{
		return view('Layout/home');
	}
	public function kamar()
	{
		return view('Layout/Kamar');
	}
    public function hotel()
    {
        return view('template/hoteltamu');
    }
    public function reservasi()
    {
        $data['ListKamar'] = 
        $this->kamar->findAll();
        return view('template/reservasi',$data);
    }
	public function cari(){
        $keyword = $this->request->getVar('keyword');
        $datatamu = $this->reservasi->cari($keyword);
        $data = [
            'title'=> 'Berikut ini daftar Tamu yang sudah terdaftar dalam database.',
            'tamu' => $datatamu
            ] ;
        return view ('/reservasi/cari', $data);
    }
	public function simpanreservasi()
	{
		helper(['form']);
		$datanya=[
			'no_kamar'=>$this->request->getPost('TipeKamar'),
			'nama_pemesan'=>$this->request->getPost('nama'),
			'telepon'=>$this->request->getPost('nohp'),
			'email'=>$this->request->getPost('email'),
			'nama_tamu'=>$this->request->getPost('tamu'),
			'tgl_cek_in'=>$this->request->getPost('checkin'),
			'tgl_cek_out'=>$this->request->getPost('checkout'),
			'jumlah_kamar'=>$this->request->getPost('jml_kmr'),
		];
        // dd($datanya);
		$this->reservasi->insert($datanya);
		return redirect()->to('/inv/'.$this->reservasi->getInsertId())->with('berhasil', 'Data Berhasil di simpan');


        }
    }
