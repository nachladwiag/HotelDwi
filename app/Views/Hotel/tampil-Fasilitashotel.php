<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Hotel</h2>
<p>Berikut ini daftar petugas kamar hotel yang
sudah terdaftar dalam database.</p>
<p>
<a href="/fasilitas_hotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
<div class="alert aler-succes">
    <?php echo session()->getFlashdata('berhasil') ; ?>
</div>
<?php endif; ?>
<table class="table table-sm table-hover">
    <thead class="bg-light text-center">
        <tr>
            <th>Nama Fasilitas Hotel</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
</tr>
</thead>
<tbody>
    <?php foreach ($ListFasilitashotel as $row) : ?>
    <tr>
        <td><?=$row['nama_fasilitas_hotel'] ?></td>
        <td><?=$row['deskripsi'] ?></td>
        <td><img src="/gambar/<?=$row['deskripsi'] ?>" alt=""></td>
        <td class="text-center">
            <a href="/fasilitas_hotel/edit/<?= $row['id_fasilitashotel'] ?>" class="btn btn-info btn-sm mr-1">edit</a>
            <a href="/fasilitas_hotel/foto/edit/'.$row['id_fasilitashotel'].'" class="btn btn-info btn-sm mr-2">Foto</a>
            <a href="/fasilitas_hotel/hapus/<?= $row['id_fasilitashotel'] ?>" class="btn btn-danger btn-sm">hapus</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?= $this->endSection() ?>