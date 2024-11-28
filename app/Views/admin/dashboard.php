<?= $this->extend('admin/layout/page_layout')  ?>
<?= $this->section('content') ?>
<div id="content">



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutter align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Temuan SPM
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $data_ais_count + $data_db_count; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutter align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Temuan SPM Aktif
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $data_ais_open + $data_db_open; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-layer-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutter align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Temuan SPM Close
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $data_ais_close; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-check-double fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">SPM Aktif</h6>
                    </div>
                    <div class="card-body">
                        <div class="pt-4 pb-2" style="height: 23vh;">
                            <!-- <canvas id="myPieChart"></canvas> -->
                            <div id="chartContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>