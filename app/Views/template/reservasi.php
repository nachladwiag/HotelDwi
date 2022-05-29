<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>

<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Form Pemesanan Kamar</h2>
        </div>
            <form action="/Reservasi/simpan" method="post" >
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="text-black font-weight-bold" for="kamar">Pilih Jenis Kamar</label>
                <select class="form-control" name="TipeKamar" required>
                <?php foreach($ListKamar as $row):?>
                <option value="<?php echo $row['no_kamar'];?>"><?php echo $row['type_kamar'];?></option>
                <?php endforeach;?>
                </select>
              </div>
            </div>

            <input type="hidden" name="id_reservasi">
            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="nama">Nama Pemesanan</label>
                <input required type="text" id="nama" name="nama" class="form-control"/>
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="phone">Telepon</label>
                <input required type="text" id="phone" name="nohp" class="form-control "/>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="email">Email</label>
                <input required type="email" id="email" name="email" class="form-control "/>
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="tamu">Nama Tamu</label>
                <input required type="text" id="tamu" name="tamu" class="form-control "/>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="checkin_date">Tanggal Check In</label>
                <input required type="date" id="checkin_date" name="checkin" class="form-control">
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="checkout_date">Tanggal Check Out</label>
                <input required type="date" id="checkout_date" name="checkout" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label for="jml" class="font-weight-bold text-black">Jumlah Kamar</label>
                <div class="field-icon-wrap">
                  <select name="jml_kmr" id="jml" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
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