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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mb-4">
                                                <img src="assets/images/logo-sm.svg" alt="" height="24"><span class="logo-txt">RSD Kalisat</span>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="mb-4 d-flex flex-column align-items-end gap-2">
                                                <h4 class="float-end font-size-16">Invoice # 12345</h4>
                                                <div class="badge badge-soft-success font-size-14">Sudah dibayar</div>
                                            </div>
                                        </div>
                                    </div>


                                    <p class="mb-1">Jl. MH. Thamrin No.31, Dusun Krajan, Ajung, Kec. Kalisat, Kabupaten Jember, Jawa Timur 68193</p>
                                    <p class="mb-1"><i class="mdi mdi-email align-middle mr-1"></i> rsdkalisat@gmail.com</p>
                                    <p><i class="mdi mdi-phone align-middle mr-1"></i> (0331) 593997</p>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5 class="font-size-15 mb-3">Ditagihkan Kepada:</h5>
                                            <h5 class="font-size-14 mb-2">Alviyan Mahendra</h5>
                                            <p class="mb-1">1208 Sherwood Circle
                                                Lafayette, LA 70506</p>
                                            <p class="mb-1">RichardSaul@rhyta.com</p>
                                            <p>337-256-9134</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <div>
                                                <h5 class="font-size-15">Jadwal Konsultasi:</h5>
                                                <p>16 Februari, 2022</p>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="font-size-15">Dokter</h5>
                                                <p class="mb-1">dr. Teguh Santoso, Sp. OG.</p>
                                                <p>Dokter Spesialis Kandungan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-2 mt-3">
                                    <h5 class="font-size-15">Pelayanan</h5>
                                </div>
                                <div class="p-4 border rounded">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 70px;">No.</th>
                                                    <th>Item</th>
                                                    <th class="text-end" style="width: 120px;">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">01</th>
                                                    <td>
                                                        <h5 class="font-size-15 mb-1">Konsultasi</h5>
                                                        <p class="font-size-13 text-muted mb-0">Konsultasi dengan dr. Teguh Santoso, Sp. OG.</p>
                                                    </td>
                                                    <td class="text-end">Rp 50.000</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                                    <td class="text-end">Rp 50.000</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">
                                                        Pajak</th>
                                                    <td class="border-0 text-end">Rp 2.500</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0">Rp 52.500</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-print-none mt-3">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i> Cetak</a>
                                        <button id="pay-button" class="btn btn-primary w-md waves-effect waves-light">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>

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