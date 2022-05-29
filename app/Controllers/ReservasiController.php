<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpParser\Node\Expr\Cast\Array_;
use TCPDF;

class ReservasiController extends BaseController
{
	public function index()
	{
		$currentPage = $this->request->getVar('page_reservasi') ? $this->request->getVar('page_reservasi') :1; 

        //d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $datatamu = $this->reservasi->search($keyword);
        }else{
            $datatamu = $this->reservasi->findAll();    
        }

        $data = [
            'title'=> 'Berikut ini daftar Tamu yang sudah Memesan Kamar.',
            // 'tamu' => $datatamu->paginate(10, 'reservasi'),
            'tamu' => $datatamu,
            'currentPage' => $currentPage,
            //'ListKamar'=>$this->Kamar->find()
            ];
            // dd($data);
            // dd($keyword);
        return view('Reservasi/tampil', $data);
    } 

    public function in($idreservasi){
        $datanya = ['status' => 'cek in'];
        $this->reservasi->update($idreservasi, $datanya);
        return redirect()->to(site_url('/reservasi'))->with('berhasil','Data berhasil diupdate');
    }

    public function out($idreservasi){
        $datanya = ['status' => 'cek out'];
        $this->reservasi->update($idreservasi, $datanya);
        return redirect()->to(site_url('/reservasi'))->with('berhasil','Data berhasil diupdate');
    }
public function invoice($id_reservasi){
    $this->reservasi->select('reservasi.id_reservasi, reservasi.nama_pemesan, reservasi.email, 
                                reservasi.tgl_cek_in, reservasi.tgl_cek_out, kamar.type_kamar, 
                                kamar.harga, reservasi.jumlah_kamar,
                                (datediff(reservasi.tgl_cek_out, reservasi.tgl_cek_in))as jml_hari, 
                                (datediff(reservasi.tgl_cek_out, reservasi.tgl_cek_in)*reservasi.jumlah_kamar* kamar.harga)as total_bayar');
        $this->reservasi->join('kamar', 'kamar.no_kamar=reservasi.no_kamar');
		$data['transaksi'] = $this->reservasi->find($id_reservasi);
		$html = view('Reservasi/invoice',$data);
		$pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Hotel SCADA');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('invoice.pdf', 'I');
    
}
}

