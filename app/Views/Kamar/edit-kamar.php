<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata kamar baru.</p>
<form method="POST" action="/kamar/update" enctype="multipart/form-data">
    <input type="hidden">
<div class="form-group">
<label class="font-weight-bold">No Kamar</label>
<input type="text" name="txtInputNoKamar"
class="form-control" placeholder="Masukan no kamar" value="<?=$detailKamar[0]['no_kamar'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipeKamar"
class="form-control" placeholder="Masukan Tipe Kamar" value="<?=$detailKamar[0]['type_kamar'];?>"> 
</div>
<div class="form-group">
<label class="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
<input name="txtInputDeskripsi" 
class="form0control" placeholder="Masukan Deskripsi Kamar" value="<?=$detailKamar[0]['deskripsi'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Kamar</label>
<?php
if (!empty($detailKamar[0]['foto'])){
    echo'<img src="'.base_url("/gambar/".$detailKamar[0]['foto']).'"width="150>';
}
?>
</div>
<div class="form-group">
<button class="btn btn-primary">Update Kamar</button>
</div>
</form>
<?= $this->endSection() ?>