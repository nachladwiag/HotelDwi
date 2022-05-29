<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas Hotel</h2>
<p>Silahkan Masukan data fasilitas kamar baru pada form dibawah ini.</p>
<form method="POST" action="/fasilitas_hotel/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nama Fasilitas Hotel</label>
<input type="text" name="txtInputNamaFasilitas"
class="form-control" placeholder="Masukan Nama Fasilitas Hotel"autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi</label>
<input type="text" name="txtInputDeskripsi"
class="form-control" placeholder="Masukan Tipe Fasilitas Hotel" autocomplete="off"required>
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Fasilitas Hotel</label>
<input type="file" name="txtInputFoto" class="form-control"> 
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Fasilitas</button>
</div>
</form>
<?= $this->endSection() ?>