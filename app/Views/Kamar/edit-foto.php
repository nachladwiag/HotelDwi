<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>pengeditan data kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mengubah data kamar.</p>
<form method="POST" action="/kamar/updatefoto" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">no kamar</label>
        <input type="hidden" value="<?=$detailkamar[0]['foto'];?> name="foto>
        <input type="text" name="txtinputkamar" class="form-control"
        placeholder="Masukan username" autocomplete="off" value="<?$detailkamar[0]['no_kamar'];?>" readonly> </div>

        <label class="font-weight-bold">foto</label>
        <br>
        <?php
        if(!empty($detailkamar[0]['foto'])){
            echo '<img src="'.base_url("/gambar/".$detailkamar[0]['foto']).'" width="150" >';

        }

        ?>
        <br><br>
        <input type="file" name="txtinputfoto" class="form-control">
        <br>



        <button class="btn btn-primary">update kamar</button>
    </div>
    </form>
    <?= $this->endSection() ?>