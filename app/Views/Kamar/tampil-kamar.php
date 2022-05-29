<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar petugas kamar hotel yang
sudah terdaftar dalam database.</p>
<p>
<a href="/kamar/tambah" class="btn btn-primary
btn-sm">Tambah Kamar</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>No</th>
<th>no_kamar</th>
<th>tipe_kamar</th>
<th>deskripsi</th>
<th>foto</th>
<th>Aksi</th>
</tr>

</thead>
<tbody>
<?php
$htmlData=null;
$nomor=null;
foreach ($ListPetugas as $row){
$nomor++;
$htmlData ='<tr>';
$htmlData .='<td>'.$nomor.'</td>';
$htmlData .='<td>'.$row['no_kamar'].'</td>';
$htmlData .='<td>'.$row['type_kamar'].'</td>';
$htmlData .='<td>'.$row['deskripsi'].'</td>';
$htmlData .='<td>'.'<img src="'.base_url("/gambar/".$row['foto']).'" width="150" >'.'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/kamar/edit/'.$row['no_kamar'].'" class="btn btn-info btn-sm mr-1">Update</a>';
$htmlData .='<a href="/kamar/foto/edit/'.$row['no_kamar'].'" class="btn btn-info btn-sm mr-2">Foto</a>';
$htmlData .='<a href="/kamar/hapus/'.$row['no_kamar'].'" class="btn btn-danger btn-sm">Hapus</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
<?php echo $this->endSection(); ?>