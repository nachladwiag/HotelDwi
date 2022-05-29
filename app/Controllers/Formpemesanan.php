<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Formpemesanan extends BaseController
{
	public function index()
	{
		$data['judulHalaman'] = 'Form Reservasi Online';
        $data['intro'] = '<p>Silahkan masukan data Anda pada form yang disediakan dibawah ini</p>';
        // untuk menampilkan pilihan kamar di form daftar
        $data['datatipekamar'] = $this->tipekamar->findAll();
        return view('formpemesanan', $data);
    }

    public function simpan()
    {
        // rumus harga
        // harga = harga_tipe_kamar * jumlah_kamar_dipesan * lama_menginap

        $id_tipe_kamar = $this->request->getPost('TipeKamar');
        $tipe_kamar = $this->tipekamar->find($id_tipe_kamar);
        $harga_tipe_kamar = $tipe_kamar['harga'];

        $jumlah_kamar_dipesan = $this->request->getPost('jml_kmr');

        $ckin = strtotime($this->request->getPost('checkin'));
        $ckout = strtotime($this->request->getPost('checkout'));
        $lama_menginap = ($ckout - $ckin) / 60 / 60 / 24;

        $harga = $harga_tipe_kamar * $jumlah_kamar_dipesan * $lama_menginap;
        // nampung data

        $kamar_tersedia = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->get()->getNumRows();

        $data = [
            'nama_tamu' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('nohp'),
            'jumlah_kamar' => $this->request->getPost('jml_kmr'),
            'cek-in' => $this->request->getPost('checkin'),
            'cek-out' => $this->request->getPost('checkout'),
            'harga' => $harga,
            'status' => 'Belum Dibayar',
            'id_tipe_kamar' => $this->request->getPost('TipeKamar'),
        ];
        // dd($data);
        $this->reservasi->save($data);
        $id_reservasi = $this->reservasi->db()->insertId();
        return redirect()->to('/inv/' . $id_reservasi)->with('info', '<div class="alert alert-success alert-sm">Pemesanan anda telah berhasil </div>');
    }
}

