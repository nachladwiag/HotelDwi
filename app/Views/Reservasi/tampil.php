<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="row">
<h2><?=$title?></h2>
    <div class="col-4">
    <form action="" method="post" >
        <div class="input-group mb-3">
        <input type="date" class="form-control" name="keyword">
        <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
        </div>
    </form>
    </div>
    <div class="col-4">
    <form action="" method="post" >
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukan Nama Tamu" name="keyword">
        <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
        </div>
    </form>
    </div>

</div>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nama Tamu</th>
<th>Tanggal Cek In</th>
<th>Tanggal Cek Out</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
<tbody  class="bg-light text-center">
<?php $i = 1 + (10 * ($currentPage - 1));?>
<?php
$htmlData=null;
foreach ($tamu as $row){
$htmlData ='<tr>';
$htmlData .='<td>'.$row['nama_tamu'].'</td>';
$htmlData .='<td>'.$row['tgl_cek_in'].'</td>';
$htmlData .='<td>'.$row['tgl_cek_out'].'</td>';
$htmlData .='<td>'.$row['status'].'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/reservasi/in/'.$row['id_reservasi'].'" class="btn btn-info btn-sm mr-1">Cek In</a>';
$htmlData .='<a href="/reservasi/out/'.$row['id_reservasi'].'" class="btn btn-danger btn-sm mr-1">Cek Out</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
<?= $this->endSection() ?>