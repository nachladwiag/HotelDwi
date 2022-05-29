<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas Kamar</h2>
<p>Silahkan Masukan data fasilitas kamar baru pada form dibawah ini.</p>
<form method="POST" action="/fasilitas/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipeKamar"
class="form-control" placeholder="Masukan tipe kamar"autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Nama Fasilitas Kamar</label>
<input type="text" name="txtInputNamaFasilitas"
class="form-control" placeholder="Masukan Nama Fasilitas Kamar" autocomplete="off"required>
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Fasilitas</button>
</div>
</form>
<?= $this->endSection() ?>