<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata kamar baru.</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">No Kamar</label>
<input type="text" name="txtInputNama"
class="form-control" placeholder="Masukan no kamar" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipeKamar"
class="form-control" placeholder="Masukan Tipe Kamar" autocomplate="off"aoutocomplate required>
</div>
<div class="form-group">
<label class="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
<input name="txtInputDeskripsi" class="form0control rounded-0" id="exampleFormControlTextareal" row="10">
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Kamar</label>
<input type="file" name="txtInputFoto" class="fore-control">
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Kamar</button>
</div>
</form>
<?= $this->endSection() ?>