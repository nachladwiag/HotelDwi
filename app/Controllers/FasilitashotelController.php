<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Fasilitashotel;

class FasilitashotelController extends BaseController
{
	public function index()
	{
		return view('Hotel/tampil-Fasilitashotel');
	}

public function tampil(){
	if(!session()->get('sudahkahLogin')){
		return redirect()->to('/petugas');
		exit;
	}
	//cek apakah yang login bukan admin ? 
	
	$fasilitas = new Fasilitashotel;
	$data['ListFasilitashotel'] =
	$fasilitas->findAll();
	return view('Hotel/tampil-Fasilitashotel', $data);
}
public function tambahFasilitas(){
if(!session()->get('sudahkahLogin')){
return redirect()->to('/petugas');
exit;
}
// cek apakah yang login bukan admin ?
if(session()->get('level')!='admin'){
return redirect()->to('/petugas/dashboard');
exit;
}
return view('Hotel/tambah-Fasilitashotel');    
}
public function simpanFasilitas(){
helper(['form']);
$upload = $this->request->getFile('txtInputFoto');
$upload->move(WRITEPATH. '../public/gambar/');
$datanya=[
	'nama_fasilitas_hotel'=>$this->request->getPost('txtInputNamaFasilitas'),
	'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
	'foto'=>$upload->getName()
];
$fasilitas = new Fasilitashotel;
$fasilitas->insert($datanya);
return redirect()->to('/fasilitas_hotel')->with('berhasil', 'Data Berhasil di simpan');
}
public function editfasilitashotel($id_fasilitashotel){
	if(session()->get('sudahkah login')){
	return redirect()->to('/petugas');
	exit;
			}
		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
		return redirect()->to('/petugas/dashboard');
		exit;
		}
		$Datafasilitashotel = New Fasilitashotel;
		$data['detailfasilitashotel'] = $Datafasilitashotel->where('id_fasilitashotel', $id_fasilitashotel)->findAll();
		return view('Hotel/edit-FasilitasHotel', $data);
}
public function editfoto($id_fasilitashotel){ 
// cek apakah sudah login ?
	 if(!session()->get('sudahkahLogin')){
		  return redirect()->to('/petugas'); 
		  exit; }
		  
		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){ 
			return redirect()->to('/petugas/dashboard'); 
			exit; }
		$Datahotel = New FasilitasHotel;
		$data['detailhotel']=$Datahotel->where('id_fasilitashotel',$id_fasilitashotel)->findAll();
		return view('Hotel/edit-foto',$data); 
	}
	public function updateFasilitashotel(){
		// cek apakah sudah login ?
		if(session()->get('sudahkah login')){
		return redirect()->to('/petugas');
		exit;
		}
		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
		return redirect()->to('/petugas/dashboard');
		exit;
	}
	$Datahotel = New FasilitasHotel;
		helper(['form']);
		$data=[
		'nama_fasilitas_hotel'=>$this->request->getPost('txtInputnama_fasilitas_hotel'),
		'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
	];
	$Datahotel->update($this->request->getPost('txtInputid_fasilitashotel'),$data);
		return redirect()->to('/fasilitas_hotel');
		
	}             
	public function updatefoto(){
		 // cek apakah sudah login 
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas'); exit; }
	// cek apakah yang login bukan admin ? 
	if(session()->get('level')!='admin'){
		return redirect()->to('/petugas/dashboard');
		exit; }
		
		helper(['form']);
   $upload = $this->request->getFile('txtinputfoto');
   $id_fasilitashotel = $this->request->getPost('id_fhotel');
   $syarat = ['id_fasilitashotel' => $id_fasilitashotel];
   $upload->move(WRITEPATH . '../public/gambar/');
   $data=['foto'=> $upload->getName()];
//    dd($data);
	$this->fasilitashotel->update($id_fasilitashotel, $data);
	return redirect()->to('/fasilitas_hotel')->with('berhasil', 'Data Berhasil di update'); 
		}
// hapus fasilitashotel
public function hapusfasilitashotel($id_fasilitashotel)
{
	if(!session()->get('sudahkahLogin')){
		return redirect()->to('/petugas');
		exit; 
}
// cek apakah yang login bukan admin ?
	if(session()->get('level')!='admin'){
		return redirect()->to('/petugas/dashboard');
		exit;   
}
$Datafasilitashotel = New FasilitasHotel;
$Datafasilitashotel->where('id_fasilitashotel',$id_fasilitashotel)->delete();
return redirect()->to('/fasilitas_hotel');
}
}