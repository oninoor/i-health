<?php
$uri = service('uri');
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li <?= in_array($uri->setSilent()->getPath(), ['/', 'patient', 'patient/dashboard']) ? 'class="mm-active"' : '' ?>>
                    <a href="<?= base_url('/patient/dashboard') ?>">
                        <i data-feather="grid"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="heart"></i>
                        <span data-key="t-konsultasi">Konsultasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('patient/register') ?>">
                                <span data-key="t-calendar">Daftar</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('patient/my-appointments') ?>">
                                <span data-key="t-chat">Konsultasi Saya</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('/patient/prescribtion') ?>">
                        <i data-feather="file-text"></i>
                        <span data-key="t-resep">Resep</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('/patient/history') ?>">
                        <i data-feather="folder"></i>
                        <span data-key="t-riwayat-pemeriksaan">Riwayat Pemeriksaan</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('/patient/profile') ?>">
                        <i data-feather="user"></i>
                        <span data-key="t-profil">Profil</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->