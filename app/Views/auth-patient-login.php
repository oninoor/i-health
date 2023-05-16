<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | I-Health RSD Kalisat Jember</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Konsultasi Online Dengan Dokter di RSD Kalisat Menggunakan Telemedicine">
    <meta content='Alviyan Mahendra' name='author'>

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Import -->
    <?= $this->include('partials/head-css'); ?>

</head>

<!-- Body -->
<?= $this->include('partials/body'); ?>

<div style='min-height:100vh;' class='container-fluid p-4 d-flex justify-content-center align-items-center bg-success'>
    <div style="max-width: 444px; border-radius: 12px;" class="card p-2 w-100">
        <div class="card-body">
            <img src="/assets/images/hospital/LOGO.png" alt="Logo RSD Kalisat Jember" style="max-width: 210px; max-height: 48px;" class="mx-auto d-block mb-5">
            <h2 class="font-weight-bold font-size-24 text-center">Selamat Datang</h2>
            <p class="card-text text-center mb-4">Masuk untuk melanjutkan.</p>

            <!-- Form -->
            <form action="<?= base_url('/auth') ?>" method="POST" class="custom-form pt-2">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">No Rekam Medis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_rm')) ? 'is-invalid' : '' ?>" id="no_rm" name="no_rm" placeholder="No Rekam Medis" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rm'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <label class="form-label">Password</label>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="">
                                <a href="/auth/recover-pw" class="text-muted">Lupa password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="input-group auth-pass-inputgroup">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon" name="password">
                        <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-check" name="remember-check" value="false">
                            <label class="form-check-label" for="remember-check">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button style="border-radius: 12px; font-weight: 800;" class="btn btn-success w-100 waves-effect waves-light" type="submit">Masuk</button>
                </div>
            </form>

            <p class="card-text text-center mb-3">Belum punya akun?</p>
            <div class="d-flex justify-content-evenly align-content-center gap-2">
                <div class="d-grid w-100">
                    <a href="/auth/patient-register" style="border-radius: 12px; font-weight: 800;" class="btn btn-outline-light waves-effect" type="button">Daftar</a>
                </div>
                <div class="d-grid w-100">
                    <a href="/auth/staff" style="border-radius: 12px; font-weight: 800;" class="btn btn-outline-light waves-effect" type="button">Login Pegawai</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts'); ?>

<!-- Password Addon Init -->
<script src="/assets/js/pages/pass-addon.init.js"></script>

<!-- Notification -->
<script src="/assets/libs/alertifyjs/build/alertify.min.js"></script>
<script src="/assets/js/pages/notification.init.js"></script>

</body>

</html>