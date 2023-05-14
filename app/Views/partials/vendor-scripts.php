<!-- Notification -->
<?php if (session()->getFlashdata('success')) : ?>
  <div id="notification-success" data-message="<?= session()->getFlashdata('success') ?>"></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
  <div id="notification-error" data-message="<?= session()->getFlashdata('error') ?>"></div>
<?php endif; ?>
<?php if (session()->getFlashdata('message')) : ?>
  <div id="notification-message" data-message="<?= session()->getFlashdata('message') ?>"></div>
<?php endif; ?>
<?php if (session()->getFlashdata('warning')) : ?>
  <div id="notification-warning" data-message="<?= session()->getFlashdata('warning') ?>"></div>
<?php endif; ?>

<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>
<script src="/assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="/assets/libs/pace-js/pace.min.js"></script>