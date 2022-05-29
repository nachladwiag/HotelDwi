<?= $this->extend('Dashboard') ?>
 <?= $this->section('content') ?>
<h2>pengeditan data fasilital hotel</h2>
 <p>Silahkan gunakan form dibawah ini untuk mengubah data fasilitas hotel.</p>
<form method="POST" action="/fasilitas_hotel/updatefoto" enctype="multipart/form-data"> 
    <div class="form-group"> 
        <label class="font-weight-bold">Nama fasilitas hotel</label>
        <input type="hidden" value="<?=$detailhotel[0]['id_fasilitashotel'];?>" name="id_fasilitashotel">
         <input type="text" name="txtinputnokamar" class="form-control" 
         placeholder="Masukan username" autocomplete="off" value="<?=$detailhotel[0]['nama_fasilitas_hotel'];?>"> </div>

     <label class="font-weight-bold">foto</label> 
     <br>
     <?php 
     if(!empty($detailhotel[0]['foto'])){
         echo '<img src="'.base_url("/gambar/".$detailhotel[0]['foto']).'" width="150" >';
         
     }
     
     ?>
     <br><br>
     <input type="file" name="txtinputfoto" class="form-control">
    <br>
    
    

    <button  class="btn btn-primary" type="submit">update fasilitas hotel</button>
 </div>
</form>
 <?= $this->endSection() ?>