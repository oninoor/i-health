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
                <p class="mb-4">Selamat datang Alviyan</p>
                <!-- end page title -->

                <!-- Content -->
                <!-- Consultation Card -->
                <div class="row">
                    <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-3">
                        <div class="card consultation-card">
                            <div class="card-body">
                                <h2 class="card-title mb-3 text-white">Sesi Konsultasi Anda</h2>
                                <div class="d-flex flex-row gap-3 align-items-center mb-4">
                                    <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid doctor-thumb">
                                    <div>
                                        <span class="font-medium d-block">dr. Teguh Santoso, Sp. OG.</span>
                                        <span class="font-size-13">RSD Kalisat Jember</span>
                                    </div>
                                </div>

                                <span class="d-block mb-1">Spesialisasi</span>
                                <span class="consultation-detail d-block mb-3">Dokter Spesialis Kandungan</span>

                                <div class="d-flex flex-row gap-4 mb-5">
                                    <div>
                                        <span class="d-block mb-1">Jam</span>
                                        <span class="consultation-detail d-block">07.00 - 08.00</span>
                                    </div>
                                    <div>
                                        <span class="d-block mb-1">Status</span>
                                        <span class="consultation-detail d-block">Konsultasi</span>
                                    </div>
                                </div>

                                <a href="javascript: void(0);" class="btn btn-bg-custom waves-effect waves-light w-100">Buka Chat</a>
                            </div>
                            <img src="/assets/images/ornamen-doctor-card.png" class="consultation-ornament img-fluid">
                        </div>
                    </div>
                </div>
                <!-- End Consultation Card -->

                <!-- Doctor Schedules -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <h2 class="font-size-16">Jadwal Dokter Hari Ini</h2>
                                    <a href="#" class="text-dark">Lihat Jadwal Lengkap <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table doctor-schedule table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Poli</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Sesi Konsultasi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td scope="row" class="">
                                                <div class="d-flex flex-row gap-3 align-items-center">
                                                    <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                                                    <div>
                                                        <span class="font-medium d-block">dr. Teguh Santoso, Sp. OG.</span>
                                                        <span class="font-size-13">Dokter Spesialis Kandungan</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="font-medium">Kandungan</td>
                                            <td>
                                                <div>
                                                    <span class="font-medium d-block">07.00 s.d 13.00</span>
                                                    <span class="font-size-13">Hari ini</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="font-size-12 font-medium py-1 px-2 rounded bg-success text-white">Tersedia</span>
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-bg-custom waves-effect waves-light w-100">Konsultasi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="">
                                                <div class="d-flex flex-row gap-3 align-items-center">
                                                    <img src="/assets/images/users/dr-teguh-s.jfif" alt="Dokter Teguh" class="rounded-circle img-fluid">
                                                    <div>
                                                        <span class="font-medium d-block">dr. Teguh Santoso, Sp. OG.</span>
                                                        <span class="font-size-13">Dokter Spesialis Kandungan</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="font-medium">Kandungan</td>
                                            <td>
                                                <div>
                                                    <span class="font-medium d-block">07.00 s.d 13.00</span>
                                                    <span class="font-size-13">Hari ini</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="font-size-12 font-medium py-1 px-2 rounded bg-danger text-white">Sesi Penuh</span>
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-bg-custom waves-effect waves-light w-100 disabled">Konsultasi</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <!-- End Doctor Schedules -->
                <!-- End Content -->

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

<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();

        $(".dataTables_length select").addClass('form-select form-select-sm');
    });
</script>

<script src="/assets/js/app.js"></script>

</body>

</html>