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
            <h2 class="font-weight-bold font-size-24 text-center">Reset Password</h2>
            <p class="card-text text-center mb-4">Masukkan password baru anda.</p>

            <?php if ($error) : ?>
                <div class="alert alert-danger alert-dismissable text-center mb-4 mt-4 pt-2" role="alert">
                    <?= $error ?>
                </div>
                <p class="text-center">Ada masalah dengan permintaan reset password anda, silakan ulangi permintaan reset password <a href="<?= base_url('auth/recover-pw') ?>" class="text-success fw-semibold"> disini </a></p>
            <?php else : ?>
                <!-- Form -->
                <form action="<?= base_url('/auth/reset-password') ?>" method="POST" class="custom-form pt-2">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <label class="form-label">Password</label>
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

                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <label class="form-label">Konfirmasi Password</label>
                            </div>
                        </div>

                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : '' ?>" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon" name="password_confirm">
                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password_confirm'); ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button style="border-radius: 12px; font-weight: 800;" class="btn btn-success w-100 waves-effect waves-light" type="submit">Simpan</button>
                    </div>
                <?php endif; ?>
                </form>
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