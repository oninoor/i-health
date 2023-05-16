<!doctype html>
<html lang="en">

<head>

  <?= $title_meta ?>

  <?= $this->include('partials/head-css') ?>

  <link rel="stylesheet" href="/assets/css/patient.css">

  <!-- DataTables -->
  <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable examples -->
  <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

  <?= $this->include('partials/patient-menu') ?>

  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <?= $page_title ?>
        <p class="mb-4">Cari dan kelola data pasien</p>
        <!-- end page title -->

        <!-- Search Doctor Form -->
        <div class="row g-3 mb-5">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

                <form action="" method="post">
                  <?= csrf_field(); ?>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" id="nik" name="nik" placeholder="NIK" value="<?= old('nik') ?>" autofocus>
                        <div class="invalid-feedback">
                          <?= $validation->getError('nik'); ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Nama" value="<?= old('name') ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('name'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>" id="gender" name="gender">
                          <option value="" disabled selected>Pilih Jenis Kelamin</option>
                          <option value="Laki-laki" <?= (old('gender') === 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                          <option value="Perempuan" <?= (old('gender') === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('gender'); ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control <?= ($validation->hasError('birth_date')) ? 'is-invalid' : '' ?>" id="birth_date" name="birth_date" value="<?= old('birth_date') ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('birth_date'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Status Pernikahan</label>
                        <select class="form-select <?= ($validation->hasError('marital_status')) ? 'is-invalid' : '' ?>" name="marital_status">
                          <option value="" disabled selected>Pilih Status Pernikahan</option>
                          <option value="Belum Menikah" <?= (old('marital_status') == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah</option>
                          <option value="Menikah" <?= (old('marital_status') == 'Menikah') ? 'selected' : '' ?>>Menikah</option>
                          <option value="Duda" <?= (old('marital_status') == 'Duda') ? 'selected' : '' ?>>Duda</option>
                          <option value="Janda" <?= (old('marital_status') == 'Janda') ? 'selected' : '' ?>>Janda</option>
                          <option value="Lainnya" <?= (old('marital_status') == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('marital_status'); ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label for="mobile_phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control <?= ($validation->hasError('mobile_phone')) ? 'is-invalid' : '' ?>" id="mobile_phone" name="mobile_phone" placeholder="Nomor Telepon" value="<?= old('mobile_phone') ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('mobile_phone'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('email'); ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <select class="form-select <?= ($validation->hasError('religion')) ? 'is-invalid' : '' ?>" name="religion" aria-label="Agama">
                          <option value="" disabled selected>Pilih Agama</option>
                          <option value="Islam" <?= (old('religion') == "Islam") ? 'selected' : '' ?>>Islam</option>
                          <option value="Kristen" <?= (old('religion') == "Kristen") ? 'selected' : '' ?>>Kristen</option>
                          <option value="Katholik" <?= (old('religion') == "Katholik") ? 'selected' : '' ?>>Katholik</option>
                          <option value="Hindu" <?= (old('religion') == "Hindu") ? 'selected' : '' ?>>Hindu</option>
                          <option value="Buddha" <?= (old('religion') == "Buddha") ? 'selected' : '' ?>>Buddha</option>
                          <option value="Konghucu" <?= (old('religion') == "Konghucu") ? 'selected' : '' ?>>Konghucu</option>
                          <option value="Penganut Kepercayaan" <?= (old('religion') == "Penganut Kepercayaan") ? 'selected' : '' ?>>Penganut Kepercayaan</option>
                          <option value="Lainnya" <?= (old('religion') == "Lainnya") ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('religion'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Hak akses</label>
                        <select class="form-select <?= ($validation->hasError('role')) ? 'is-invalid' : '' ?>" name="role">
                          <option value="" disabled selected>Pilih Hak Akses</option>
                          <option value="patient" <?= (old('role') == 'patient') ? 'selected' : '' ?>>Patient</option>
                          <option value="doctor" <?= (old('role') == 'doctor') ? 'selected' : '' ?>>Doctor</option>
                          <option value="nurse" <?= (old('role') == 'nurse') ? 'selected' : '' ?>>Nurse</option>
                          <option value="admin" <?= (old('role') == 'admin') ? 'selected' : '' ?>>Admin</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('role'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select <?= ($validation->hasError('active')) ? 'is-invalid' : '' ?>" name="active">
                          <option value="" disabled selected>Pilih Status</option>
                          <option value="unregistered" <?= (old('active') == 'unregistered') ? 'selected' : '' ?>>Unregistered</option>
                          <option value="active" <?= (old('active') == 'active') ? 'selected' : '' ?>>Active</option>
                          <option value="blocked" <?= (old('active') == 'blocked') ? 'selected' : '' ?>>Blocked</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('active'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mb-5">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" id="address" name="address" rows="3"><?= old('address') ?></textarea>
                    <div class="invalid-feedback">
                      <?= $validation->getError('address'); ?>
                    </div>
                  </div>

                  <div class="mb-3 d-flex justify-content-end">
                    <button style="border-radius: 12px; font-weight: 800;" class="btn btn-success w-lg waves-effect waves-light" type="submit">Simpan</button>
                  </div>
                </form>
              </div>

            </div> <!-- end col -->
          </div> <!-- end row -->
          <!-- End Search Doctor Form -->

        </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->


      <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->


  <?= $this->include('partials/right-sidebar') ?>

  <!-- JAVASCRIPT -->
  <?= $this->include('partials/vendor-scripts') ?>

  <script src="/assets/js/app.js"></script>

  <!-- Notification -->
  <script src="/assets/libs/alertifyjs/build/alertify.min.js"></script>
  <script src="/assets/js/pages/notification.init.js"></script>

  </body>

</html>