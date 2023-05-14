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
        <p class="mb-4">Cari dokter dan mulai konsultasi</p>
        <!-- end page title -->

        <!-- Search Doctor Form -->
        <div class="row g-3 mb-5">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                    <thead>
                      <tr class="bg-transparent">
                        <th style="width: 120px;">ID Konsultasi</th>
                        <th>Tanggal</th>
                        <th>Dokter</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th style="width: 90px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><a href="javascript: void(0);" class="text-dark fw-medium">#MN0215</a> </td>
                        <td>
                          12 Oct, 2020
                        </td>
                        <td>Connie Franco</td>

                        <td>
                          $26.30
                        </td>
                        <td>
                          <div class="badge badge-soft-success font-size-12">Paid</div>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-horizontal-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="<?= base_url('patient/appointment-detail') ?>">Detail</a></li>
                              <li><a class="dropdown-item" href="#">Print</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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