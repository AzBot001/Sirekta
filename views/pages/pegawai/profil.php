  <?php include 'app/controller/post_profil.php'; ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">

        <div class="col-12">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bgc-yellow">
              <h4 class="widget-user-username text-white"><?= $nama_pegawai; ?></h4>
              <h6 class="widget-user-desc text-white"><?= $nip ?> | <?= $status = '' ? $status : 'Belum ada status' ?></h6>
            </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="public/dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $fb ?></h5>
                    <span class="description-text">Jumlah Akun Facebook</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $teman ?></h5>
                    <span class="description-text">Jumlah Total Pertemanan</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $grup ?></h5>
                    <span class="description-text">Jumlah Akun Group</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-3">
                  <div class="description-block">
                    <h5 class="description-header"><?= $anggota ?></h5>
                    <span class="description-text">Jumlah Total Anggota Grup WA</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <!-- /.row -->
              </div>
              <div class="mt-5 d-flex justify-content-center">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                  <i class="fas fa-edit"></i> Edit
                </button>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
    </section>
  </div>
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bgc-yellow">
          <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form action="" method="post">
          Identitas Diri
            <div class='form-group'>
              <label for="">Nama</label>
              <input type="hidden" name="nip" value="<?= $nip ?>" id="">
              <input type="text" class="form-control" name="nama" value="<?= $nama_pegawai ?>">
            </div>
            <div class='form-group mb-5'>
              <label for="">Status</label>
              <select name="status" class="form-control">
                <option value="" hidden><?= $status = '' ? $status : 'Belum ada Status'  ?></option>
                <option value="PNS">PNS</option>
                <option value="PTT">PTT</option>
                <option value="GTT">GTT</option>
              </select>
            </div>
            Media Sosial
            <div class="form-group">
              <label for="">Jumlah Akun Facebook</label>
              <input type="number" name="fb" value="<?= $fb ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Jumlah Total Pertemanan</label>
              <input type="number" name="teman" value="<?= $teman ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Jumlah Akun Grup</label>
              <input type="number" name="grup" value="<?= $grup ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Jumlah Total Anggota Grup WA  </label>
              <input type="number" name="anggota" value="<?= $anggota ?>" class="form-control">
            </div>
          
          <div class="form-group">
             <button type="submit" name="ubah_profil" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
     
        </div>
       
      </div>
    </div>
  </div>