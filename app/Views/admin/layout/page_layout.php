<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"> -->
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>

    <script type="text/javascript">
        window.onload = function() {
            // if (data_ais_open !== 0) {
            //     console.log("true")
            // }
            var options = {
                // exportEnabled: true,
                animationEnabled: true,
                // title: {
                //     text: "SPM Aktif"
                // },
                height: 200,
                legend: {
                    horizontalAlign: "right",
                    verticalAlign: "center"
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                    indexLabel: "{name}",
                    legendText: "{name} (#percent%)",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "white",
                    dataPoints: [{
                            y: <?= $data_ais_open; ?>,
                            name: "AIS"
                        },
                        {
                            y: <?= $data_db_open; ?>,
                            name: "DB"
                        },
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);
        }
    </script>
</head>

<body id="page-top">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <script>
            swal("<?= session()->getFlashdata('pesan'); ?>", {
                // dangerMode: true,
                // buttons: true,
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3">SPM : Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <div class="sidebar-heading">
                Navigation
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>" id="dashboard">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSPM" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-list"></i>
                    <span>SPM</span>
                </a>
                <div id="collapseSPM" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php $no = 1 ?>
                        <?php if (!$mitra) { ?>
                            <a class="collapse-item" href="#" id="nama_mitra">Belum ada Data Mitra</a>
                            <!-- echo "data belum ada"; -->
                        <?php } else { ?>
                            <?php foreach ($mitra as $mi) { ?>
                                <a class="collapse-item" href="<?= $mi->link_halaman; ?>" id="nama_mitra<?= $no++ ?>" style="text-transform: capitalize;"><?= $mi->nama_mitra ?></a>
                                <!-- <a class="collapse-item" href="#">Delameta</a> -->
                            <?php } ?>

                        <?php } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= session()->getFlashdata('utilitas') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUtilitas" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-gear"></i>
                    <span>Utilitas</span>
                </a>
                <div id="collapseUtilitas" class="collapse <?= session()->getFlashdata('utilitas') ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'mitra' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/mitra'); ?>" id="mitra">Mitra</a>
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'kategori' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/kategori'); ?>" id="kategori">Kategori</a>
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'indikator' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/indikator'); ?>" id="indikator">Indikator</a>
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'subindikator' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/subindikator'); ?>" id="kategori">Sub-Indikator</a>
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'akun' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/akun'); ?>" id="akun">Akun</a>
                        <a class="collapse-item <?= (session()->getFlashdata('utilitas') == 'role' ? 'active' : ''); ?>" href="<?= base_url('admin/utilitas/role'); ?>" id="role">Role</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform: capitalize;"><?= session()->get('nama_akun'); ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('img/undraw_profile.svg'); ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div> -->
                            <form action="<?= base_url('/login/keluar'); ?>" method="post" class="dropdown-item" data-toggle="model" data-target="#logoutModal">
                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-link w-100 text-left text-dark" style="text-decoration: none;">Logout</button>
                            </form>
                            <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a> -->
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <?php
                        // session()->getFlashdata('pesan'); 
                        ?>
                        <span class="fst-italic">Copyright &copy; Althof Fauzan Fahmi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

    <script src="<?= base_url('vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- <script src="<? basename('js/demo/datatables-demo.js') ?>"></script> -->
    <!-- script chart js -->
    <!-- <script src="<?= base_url('vendor/chart.js/Chart.js'); ?>"></script> -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function konfirmasi() {
            Swal({
                title: 'This is a custom alert',
                text: 'Welcome',
                confirmButtonText: 'OK'
            })
        }
    </script>

    <script>
        // // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        // // Pie Chart Example
        // var ctx = document.getElementById("myPieChart");
        // var myPieChart = new Chart(ctx, {
        //     type: 'doughnut',
        //     data: {
        //         labels: ["AIS", "DB"],
        //         datasets: [{
        //             data: [<?= $data_ais_count; ?>, <?= $data_db_count; ?>],
        //             backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        //             hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        //             hoverBorderColor: "rgba(234, 236, 244, 1)",
        //         }],
        //     },
        //     options: {
        //         maintainAspectRatio: false,
        //         tooltips: {
        //             backgroundColor: "rgb(255,255,255)",
        //             bodyFontColor: "#858796",
        //             borderColor: '#dddfeb',
        //             borderWidth: 1,
        //             xPadding: 15,
        //             yPadding: 15,
        //             displayColors: false,
        //             caretPadding: 10,
        //         },
        //         legend: {
        //             display: false
        //         },
        //         cutoutPercentage: 80,
        //     },
        // });
    </script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script> -->
</body>

</html>