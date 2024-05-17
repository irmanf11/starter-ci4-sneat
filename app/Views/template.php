<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets') ?>" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>starter-ci4-sneat | irmanf.com</title>

    <meta name="description" content="starter-ci4-sneat" />
    <meta name="author" content="irmanf.com" />

    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png') ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />

    <?= $this->renderSection('css') ?>

    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand d-flex justify-content-center demo">
                    <a href="<?= route_to('home') ?>" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="<?= base_url('assets/img/icon.png') ?>" height="50" alt="Logo" />
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <?php
                    $uri = service('uri');
                    $segment1 = $uri->getSegment(1);
                    $segment2 = ($uri->getTotalSegments() >= 2) ? $uri->getSegment(2) : null;
                    ?>

                    <li class="menu-item <?= $segment1 == '' || $segment1 == 'home' ? 'active' : '' ?>">
                        <a href="<?= route_to('home.link') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home"></i>
                            <div data-i18n="Home">Home</div>
                        </a>
                    </li>

                    <?php if (session()->get('level') == 'Admin') : ?>
                        <li class="menu-item <?= $segment1 == 'pengguna' ? 'active' : '' ?>">
                            <a href="<?= route_to('pengguna') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Pengguna">Pengguna</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $segment1 == 'menu' ? 'active open' : '' ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-printer"></i>
                                <div data-i18n="Menu">Menu</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item <?= $segment1 == 'menu' && $segment2 == 'submenu' ? 'active' : '' ?>">
                                    <a href="<?= route_to('menu.submenu') ?>" class="menu-link">
                                        <div data-i18n="Sub Menu">Sub Menu</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (session()->get('level') == 'User') : ?>
                        <li class="menu-item <?= $segment1 == 'menu' ? 'active open' : '' ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-printer"></i>
                                <div data-i18n="Menu">Menu</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item <?= $segment1 == 'menu' && $segment2 == 'submenu' ? 'active' : '' ?>">
                                    <a href="<?= route_to('menu.submenu') ?>" class="menu-link">
                                        <div data-i18n="Sub Menu">Sub Menu</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>

            </aside>

            <div class="layout-page">

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                starter-ci4-sneat <span class="ms-2">|</span> <span class="ms-2"><?= session()->get('level') ?></span>
                            </div>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url('assets/img/user.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url('assets/img/user.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block"><?= session()->get('nama_lengkap') ?></span>
                                                    <small class="text-muted"><?= session()->get('level') ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= route_to('password') ?>">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Ubah Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= route_to('logout') ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>

                <div class="content-wrapper">

                    <?= $this->renderSection('content') ?>

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <a href="https://irmanf.com/" target="_blank">irmanf.com</a>
                            </div>
                        </div>
                    </footer>

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>

    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <?= $this->renderSection('js') ?>

    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/js/myscript.js') ?>"></script>

</body>

</html>