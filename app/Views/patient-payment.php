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
                <div class="d-block d-flex justify-content-end mb-4">
                    <a href="<?= base_url('patient/register') ?>" class="btn rounded-3 btn-soft-light waves-effect waves-light"><i class="mdi mdi-chevron-left"></i> Kembali</a>
                </div>
                <!-- end page title -->

                <!-- Search Doctor Form -->
                <div class="row g-3 mb-5">
                    <div class="order-2 order-md-1 col-md-5 col-lg-4">
                        <div class="card mb-0">
                            <div class="card-body doctor-info">

                                <span class="text-uppercase font-medium d-block mb-3">info</span>

                                <div class="rounded-circle img-border d-flex flex-row justify-content-center align-items-center mx-auto mb-3">
                                    <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                                </div>

                                <div class="text-center mb-5">
                                    <p class="font-medium font-size-16 d-block mb-2">dr. Teguh Santoso, Sp. OG.</p>
                                    <p class="font-size-14">Dokter Spesialis Kandungan</p>
                                </div>

                                <p class="text-uppercase font-medium d-block mb-3 d-flex justify-content-center align-items-center gap-2"><i class="mdi mdi-google-maps"></i> RSD Kalisat Jember</p>
                                <p class="font-size-13 text-center">Jl. MH. Thamrin No.31, Dusun Krajan, Ajung, Kec. Kalisat, Kabupaten Jember, Jawa Timur 68193</p>

                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15798.722134396105!2d113.8213212!3d-8.1339695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12d1859c7212337d!2sRSUD%20Kalisat%20Kabupaten%20Jember!5e0!3m2!1sid!2sid!4v1672646259573!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" height="200" class="w-100 p-0 m-0"></iframe>
                        </div>
                    </div> <!-- end col -->

                    <div class="order-1 order-md-2 col-md-7 col-lg-8">
                        <div class="card h-100">
                            <div class="card-header">
                                <h1 class="font-medium font-size-16 d-block">Pembayaran</h1>
                                <p class='mb-0'>Pilih metode pembayaran yang ingin anda gunakan</p>
                            </div>
                            <div class="card-body">
                                <h2 class='font-medium font-size-15 mb-3'>Detail Konsultasi</h2>
                                <!-- Schedule detail -->
                                <div class="d-flex gap-5 mb-3">
                                    <div>
                                        <h3 class="font-size-15 font-medium text-green mb-1">Tanggal</h3>
                                        <p class="font-size-14 mb-0">15-12-2022 07.00</p>
                                    </div>
                                    <div>
                                        <h3 class="font-size-15 font-medium text-green mb-1">Dokter</h3>
                                        <p class="font-size-14 mb-0">dr. Teguh Santoso, Sp. OG.</p>
                                    </div>
                                </div>

                                <!-- Sickness -->
                                <div class="mb-5">
                                    <h3 class="font-size-15 font-medium text-green mb-1">Keluhan</h3>
                                    <p class="font-size-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus facilisis neque sit amet lorem pretium, sed consequat neque bibendum. Nulla mattis commodo nisl, quis blandit augue consequat tristique. Ut ut arcu mauris. Vivamus ut sapien risus. Curabitur vel augue mi. Nulla feugiat libero enim, id efficitur massa maximus eu. Morbi at lorem non metus fringilla convallis vitae mollis diam. Maecenas blandit nunc a mi auctor finibus. Nunc non commodo urna.</p>
                                </div>

                                <!-- Fee -->
                                <div class="bg-green d-flex justify-content-between align-items-center p-2 rounded-3">
                                <p class="mb-0">Total</p>
                                <p class="mb-0">Rp 70.000</p>
                                </div>
                            </div>
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

</body>

</html>