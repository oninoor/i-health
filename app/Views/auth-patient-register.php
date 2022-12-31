<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | Telemedicine RSD Kalisat Jember</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Konsultasi Online Dengan Dokter di RSD Kalisat Menggunakan Telemedicine">
    <meta content='Alviyan Mahendra' name='author'>

    <!-- App Favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <!-- Import -->
    <?= $this->include('partials/head-css'); ?>
</head>

<!-- Body -->
<?= $this->include('partials/body'); ?>

<div style='min-height:100vh;' class='container-fluid p-4 d-flex justify-content-center align-items-center bg-success'>
    <div style="max-width: 444px; border-radius: 12px;" class="card p-2 w-100">
        <div class="card-body">
            <img src="/assets/images/hospital/LOGO.png" alt="Logo RSD Kalisat Jember" style="max-width: 210px; max-height: 48px;" class="mx-auto d-block mb-5">
            <h2 class="font-weight-bold font-size-24 text-center">Buat Akun</h2>
            <p class="card-text text-center mb-4">Pembuatan akun hanya tersedia untuk pasien lama.</p>

            <!-- Form -->
            <form action="" class="custom-form pt-2">
                <div class="mb-3">
                    <label class="form-label">No Rekam Medis</label>
                    <input type="text" class="form-control" id="norm" name="norm" placeholder="No Rekam Medis">
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                </div>

                <div class="mb-3">
                    <button style="border-radius: 12px; font-weight: 800;" class="btn btn-success w-100 waves-effect waves-light" type="submit">Daftar</button>
                </div>
            </form>

            <p class="card-text text-center mb-3">Sudah punya akun?</p>
            <div class="mb-3">
                <a href="/auth/patient-login" style="border-radius: 12px; font-weight: 800;" class="btn btn-outline-light w-100 waves-effect waves-light" type="submit">Masuk</a>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts'); ?>
</body>

</html>