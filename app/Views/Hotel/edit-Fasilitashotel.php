<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Penambahan Data Petugas</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata petugas
baru.</p>
    <form method="POST" action="/fasilitas_hotel/update">
    <div class="form-group">
    <label class="font-weight-bold">Nama Fasilitas Hotel </label>
    <input type="hidden" name="txtInputIdFhotel" value="<?=$detailfasilitashotel[0]['id_fasilitashotel'];?> class="form-control" placeholder="Masukan  tipe kamar" >
    <input type="text" name="txtInputnama_fasilitas_hotel"class="form-control" placeholder="Masukan  tipe kamar" 
    value="<?=$detailfasilitashotel[0]['nama_fasilitas_hotel'];?>"
    autocomplete="off" autofocous reaquire>
    </div>

    <div class="form-group">
    <label class="font-weight-bold">Deskripsi Fasilitas Hotel</label>
    <input type="text" name="txtInputDeskripsi"
    class="form-control" placeholder="Masukan deskripsi fasilitas hotel" value="<?=$detailfasilitashotel[0]["deskripsi"];?>">
    </div>

    <div class="form-group">
    <label class="font-weight-bold">Foto Fasilitas Hotel</label>
    <?php
    if (!empty($detailfasilitashotel[0]['foto'])){
    echo'<img src="' .base_url("/gambar/".$detailfasilitashotel[0]['foto']).'"width="150">';
}
?>
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">Update Fasilitas Hotel</button>
</div>
</form>
<?= $this->endSection() ?>