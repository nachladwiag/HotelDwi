<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>

<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Form Pemesanan Kamar</h2>
    </div>
    <?= session()->getFlashdata('info') ?>
    <form action="/simpan-pemesanan" method="post">
      <div class="row">
        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="kamar">Pilih Tipe Kamar</label>
          <select class="form-control" name="TipeKamar" required>
            <option selected disabled>Silahkan pilih tipe kamar</option>
            <?php foreach ($datatipekamar as $row) : ?>
              <option value="<?php echo $row['type_kamar']; ?>"><?php echo $row['type_kamar']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="nama">Nama Tamu</label>
          <input required type="text" id="nama" name="nama" class="form-control" />
        </div>

        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="phone">Telepon</label>
          <input required type="text" id="phone" name="nohp" class="form-control " />
        </div>
      </div>

      <div class="row">
        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="phone">Email</label>
          <input required type="email" id="phone" name="email" class="form-control " />
        </div>

        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="email">NIK</label>
          <input required type="text" id="nik" name="nik" class="form-control " />
        </div>
      </div>

      <!-- <div class="col-md-6 form-group">
          <label class="text-black font-weight-bold" for="tamu">Nama Tamu</label>
          <input required type="text" id="tamu" name="tamu" class="form-control " />
        </div>
      </div> -->

      <div class="row">
        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="checkin_date">Tanggal Check In</label>
          <input required type="date" id="checkin_date" name="checkin" class="form-control">
        </div>
        <div class="col-md-9 form-group">
          <label class="text-black font-weight-bold" for="checkout_date">Tanggal Check Out</label>
          <input required type="date" id="checkout_date" name="checkout" class="form-control">
        </div>
      </div>


      <div class="row">
        <div class="col-md-9 form-group">
          <label for="jml" class="font-weight-bold text-black">Jumlah Kamar</label>
          <div class="field-icon-wrap">
            <input type="number" id="jml" name="jml_kmr" min="1" class="form-control">
          </div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-6 form-group">
          <button class="btn btn-primary text-white py-3 px-5 font-weight-bold">Pesan</button>
        </div>
      </div>
    </form>
  </div>
</section><!-- End Contact Section -->

<?= $this->endSection() ?>