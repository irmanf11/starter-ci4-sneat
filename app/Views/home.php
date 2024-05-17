<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-0">Selamat Datang, <strong><?= session()->get('nama_lengkap') ?></strong></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-user card-icon"></i>
                    <h1 class="card-title text-white mb-0">1.000.000</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-secondary text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-store card-icon"></i>
                    <h1 class="card-title text-white mb-0">500</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-success text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-cabinet card-icon"></i>
                    <h1 class="card-title text-white mb-0">123</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-info text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-money card-icon"></i>
                    <h1 class="card-title text-white mb-0">1.500.000</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-warning text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-bar-chart card-icon"></i>
                    <h1 class="card-title text-white mb-0">11.500.000</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-danger text-white mb-3">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <i class="bx bx-money-withdraw card-icon"></i>
                    <h1 class="card-title text-white mb-0">500.000</h1>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>