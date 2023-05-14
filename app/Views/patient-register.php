<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

    <link rel="stylesheet" href="/assets/css/patient.css">

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
                <p class="mb-4">Cari dokter dan mulai konsultasi</p>
                <!-- end page title -->

                <!-- Search Doctor Form -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="font-size-16">Cari Dokter</h2>
                            </div>
                            <div class="card-body">

                                <form action="">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                            </div>
                                        </div><!-- End Col -->

                                        <div class="col-md-6">
                                            <div>
                                                <label for="polyclinic" class="form-label">Poli</label>
                                                <select class="form-select" name="polyclinic" id="polyclinic">
                                                    <option>Select</option>
                                                    <option>Large select</option>
                                                    <option>Small select</option>
                                                </select>
                                            </div>
                                        </div><!-- End Col -->

                                    </div><!-- End Row -->

                                    <div class="d-flex flex-row gap-2 justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-bg-custom waves-effect waves-light">Cari Dokter</button>
                                        <button type="submit" style="font-weight: 600; border-radius: 12px;" class="btn btn-light waves-effect waves-light px-4">Clear</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <!-- End Search Doctor Form -->

                <!-- Doctor Result -->
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <div class="card p-4 doctor-search-card">
                            <div class="rounded-circle img-border d-flex flex-row justify-content-center align-items-center mx-auto mb-3">
                                <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                            </div>

                            <div class="text-center mb-4">
                                <span class="font-medium font-size-16 d-block mb-2">dr. Teguh Santoso, Sp. OG.</span>
                                <span class="font-size-14">RSD Kalisat Jember</span>
                            </div>

                            <a href="<?= base_url('patient/booking') ?>" class="btn btn-bg-custom waves-effect waves-light">Konsultasi</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <div class="card p-4 doctor-search-card">
                            <div class="rounded-circle img-border d-flex flex-row justify-content-center align-items-center mx-auto mb-3">
                                <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                            </div>

                            <div class="text-center mb-4">
                                <span class="font-medium font-size-16 d-block mb-2">dr. Teguh Santoso, Sp. OG.</span>
                                <span class="font-size-14">RSD Kalisat Jember</span>
                            </div>

                            <a href="<?= base_url('patient/booking') ?>" class="btn btn-bg-custom waves-effect waves-light">Konsultasi</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <div class="card p-4 doctor-search-card">
                            <div class="rounded-circle img-border d-flex flex-row justify-content-center align-items-center mx-auto mb-3">
                                <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                            </div>

                            <div class="text-center mb-4">
                                <span class="font-medium font-size-16 d-block mb-2">dr. Teguh Santoso, Sp. OG.</span>
                                <span class="font-size-14">RSD Kalisat Jember</span>
                            </div>

                            <a href="<?= base_url('patient/booking') ?>" class="btn btn-bg-custom waves-effect waves-light">Konsultasi</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <div class="card p-4 doctor-search-card">
                            <div class="rounded-circle img-border d-flex flex-row justify-content-center align-items-center mx-auto mb-3">
                                <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                            </div>

                            <div class="text-center mb-4">
                                <span class="font-medium font-size-16 d-block mb-2">dr. Teguh Santoso, Sp. OG.</span>
                                <span class="font-size-14">RSD Kalisat Jember</span>
                            </div>

                            <a href="<?= base_url('patient/booking') ?>" class="btn btn-bg-custom waves-effect waves-light">Konsultasi</a>
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->
                <!-- End Doctor Result -->

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

</body>

</html>