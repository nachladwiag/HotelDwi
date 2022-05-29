<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\FasilitasKamar;

class FasilitasKamarController extends BaseController
{

public function index()
{
    return view('Fasilitas/tampil-FasilitasKamar');
}    
  public function tampil(){
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('/petugas');
            exit;
        }
        //cek apakah yang login bukan admin ? 
        
        $fasilitas = new FasilitasKamar;
        $data['ListFasilitasKamar'] =
        $fasilitas->findAll();
        return view('Fasilitas/tampil-FasilitasKamar', $data);
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
    return view('Fasilitas/tambah-fasilitaskamar');    
}
public function simpanFasilitas(){
    if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
    }
    //cek apakah login bukan admin ?
    if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
    }
    helper(['form']);
    $datanya=[
        'tipe_kamar'=>$this->request->getPost('txtInputTipeKamar'),
        'nama_fasilitas'=>$this->request->getPost('txtInputNamaFasilitas'),
    ];
    $this->fasilitas->insert($datanya);
    return redirect()->to('/fasilitas-kamar')->with('berhasil', 'Data Berhasil di simpan');
}
public function editFasilitasKamar($id_fasilitaskamar){
    if(session()->get('sudahkah login')){
    return redirect()->to('/petugas');
    exit;
            }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        $Datafasilitaskamar = New FasilitasKamar;
        $data['detailfasilitaskamar'] = $Datafasilitaskamar->where('id_fasilitaskamar', $id_fasilitaskamar)->findAll();
        return view('Fasilitas/edit-FasilitasKamar', $data);
}
public function updatefasilitaskamar(){
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
$Datafasilitaskamar = New FasilitasKamar;
helper(['form']);
$data=[
'tipe_kamar'=>$this->request->getPost('txtInputTipeKamar'),
'nama_fasilitas'=>$this->request->getPost('txtInputNamaFasilitas'),
];
$Datafasilitaskamar->update($this->request->getPost('txtInputIdFasilitaskamar'),$data);
return redirect()->to('/fasilitas-kamar');
}
// hapus fasilitaskamar
public function hapus($id_fasilitaskamar){
    $this->fasilitas->where('id_fasilitaskamar',$id_fasilitaskamar)->delete();
    return redirect()->to(site_url('/fasilitas-kamar'))->with('berhasil', 'Data Berhasil di Hapus');
}
}