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

        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="mb-3">
              <h5 class="card-title">Data Pasien <span class="text-muted fw-normal ms-2" id="totalPatients">(0)</span></h5>
            </div>
          </div>

          <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
              <div>
                <a href="<?= base_url('admin/add-patient') ?>" class="btn btn-light"><i class="bx bx-plus me-1"></i> Tambah Pasien</a>
              </div>
            </div>

          </div>
        </div>
        <!-- end row -->

        <!-- Search Doctor Form -->
        <div class="row g-3 mb-5">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf_test_name" />
                  <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                    <thead>
                      <tr class="bg-transparent">
                        <th>#</th>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tgl Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
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
      var tablePatient = $('#datatable').DataTable({
        'destroy': true,
        'responsive': true,
        'autoWidth': false,
        'processing': true,
        'serverSide': true,
        'order': [
          [0, 'asc']
        ],
        'ajax': {
          'url': '<?= base_url('admin/get-data-patients'); ?>',
          'type': 'POST',
          'data': function(d) {
            d.csrf_test_name = $('input[name=csrf_test_name]').val()
            d.search.value = $('#datatable_filter input').val();
          },
          "error": function(xhr, error, thrown) {
            console.log("An error occurred: " + xhr.status + " " + thrown);
          }
        },
        'drawCallback': function(settings) {
          $('#totalPatients').text('(' + settings.json.recordsTotal + ')');
          $('#csrf_test_name').val(settings.json.csrf_test_name);
        },
        "columns": [{
            "data": "patient_id"
          },
          {
            "data": "no_rm"
          },
          {
            "data": null,
            "render": function(data, type, full, meta) {
              return formatNameAndGender(full.name, full.gender);
            }
          },
          {
            "data": "nik"
          },
          {
            "data": "birth_date",
            'orderable': false
          },
          {
            "data": "address",
            'orderable': false
          },
          {
            "data": null,
            "render": function(data, type, full, meta) {
              return renderDropdown(full.patient_id);
            },
            'orderable': false
          }
        ]
      });

      tablePatient.ajax.reload();

      $(".dataTables_length select").addClass('form-select form-select-sm');
    });

    function formatNameAndGender(name, gender) {
      var genderBadge = (gender == "Laki-laki") ? "primary" : "success";
      return '<div><p class="mb-0">' + name + '</p><span class="badge font-size-12 badge-soft-' + genderBadge + '">' + gender + '</span></div>';
    }

    function renderDropdown(patientId) {
      var detailUrl = "<?= base_url("admin/patient") ?>/" + patientId;
      var editUrl = "<?= base_url("admin/edit-patient") ?>/" + patientId;
      var deleteUrl = "<?= base_url("admin/delete-patient") ?>/" + patientId;

      return '<div class="dropdown"><button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="' + detailUrl + '">Detail</a></li><li><a class="dropdown-item" href="' + editUrl + '">Edit</a></li><li><a class="dropdown-item" href="' + deleteUrl + '">Hapus</a></li></ul></div>';
    }
  </script>


  <script src="/assets/js/app.js"></script>

  <!-- Notification -->
  <script src="/assets/libs/alertifyjs/build/alertify.min.js"></script>
  <script src="/assets/js/pages/notification.init.js"></script>

  </body>

</html>