<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Fasilitas Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas kamar baru.</p>
<form method="POST" action="/fasilitas-kamar/update" enctype="multipart/form-data">
<input type="hidden">
<div class="form-group">
<label class="font-weight-bold">Id Fasilitaskamar</label>
<input type="text" name="txtInputIdFasilitaskamar"
class="form-control" placeholder="Masukan failitas kamar" value="<?=$detailfasilitaskamar[0]['id_fasilitaskamar'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipeKamar"
class="form-control" placeholder="Masukan Tipe Kamar" value="<?=$detailfasilitaskamar[0]['tipe_kamar'];?>">
</div>
<div class="form-group">
<label class="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
<input name="txtInputNamaFasilitas" 
class="form-control" placeholder="Masukan Nama Fasilitas" value="<?=$detailfasilitaskamar[0]['nama_fasilitas'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold"></label>
</div>
<div class="form-group">
<button class="btn btn-primary">Update Kamar</button>
</div>
</form>
<?= $this->endSection() ?>