<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('v_login');
    }
        public function login(){
        $syarat = [ 'username'=>$this->request->getPost('txtUsername'),
        'password'=>md5($this->request->getPost('txtPassword'))];
        $DataPetugas = new Petugas;                       
        $Userpetugas = $DataPetugas->where($syarat)->find();
        if(count($Userpetugas)==1){
            $session_data=[
            'username' => $Userpetugas[0]['username'],
            'nama' => $Userpetugas[0]['nama'],
            'level' => $Userpetugas[0]['level'],
            'sudahkahLogin' => TRUE];
        session()->set($session_data);
        if (session()->get('level') == 'admin') {
        return redirect()->to('/petugas/dashboard');
        }else{
        return redirect()->to('/resepsionis/dashboard');
    }
} else {
        session()->setFlashdata('salahLogin', 'Username atau Password Anda salah');
        return redirect()->to('petugas');
    }
}
public function logout(){
    session()->destroy();
    return redirect()->to('/admin');
    }
public function tampilKamar()
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
    $DataKamar = new Kamar;
    $data['ListPetugas'] = $DataKamar->findAll();
    return view('Kamar/tampil-kamar', $data);
}
public function tambahkamar(){
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        return view('Kamar/tambah-kamar');    
    }
public function simpanKamar(){
        helper(['form']);
    $Datakamar = New Kamar;
    $upload = $this->request->getFile('txtInputFoto');
    $upload->move(WRITEPATH. '../public/gambar/');
    $datanya=[
        'id_kamar'=>$this->request->getPost('txtId'),
        'no_kamar'=>$this->request->getPost('txtInputNama'),
        'type_kamar'=>$this->request->getPost('txtInputTipeKamar'),
        'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
        'foto'=>$upload->getName()
        ];
    $Datakamar->insert($datanya);
    return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di simpan');
        }
public function editFoto($no_kamar){
    if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        $Datakamar= New Kamar;
        $Datakamar->where('no_kamar',$no_kamar)->findAll();
            return redirect('/Kamar/edit-foto');
    
        }    
public function editKamar($no_kamar){
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
                }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
                }
        $Datakamar= new Kamar;
        $Data['detailKamar'] = $Datakamar->where('no_kamar', $no_kamar)->findAll();
        return view('kamar/edit-kamar', $Data);
                }
public function updateKamar(){
        // cek apakah sudah login
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        $DataKamar = New Kamar;
        helper(['form']);
        $data=[
        'type_kamar'=>$this->request->getPost('txtInputTipeKamar'),
        'deskripsi'=>$this->request->getPost('txtInputDeskripsi')
        ];
        $DataKamar->update($this->request->getPost('txtInputNoKamar'),$data);
    return redirect()->to('/kamar');
    }    
    // hapus kamar
public function hapusKamar($no_kamar)
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
$Datakamar = New Kamar;
$Datakamar->where('no_kamar',$no_kamar)->delete();
return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di Hapus');
}

public function dashboardPetugas()
{
    return view('dashboard');
}
}