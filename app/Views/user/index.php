<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("style/user.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<body class="d-flex vh-100">
    <div class="container-sm content shadow overflow-auto">
        <!-- =================== Header ================== -->
        <div class="col-12">
            <p class="text-end"><a href="">Halo, User <i class="bi bi-caret-down-fill" style="font-size: 12px;"></i></a></p>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <img src="<?php echo base_url("images/logo.png") ?>" alt="" class="img-fluid mx-auto d-block mt-2 w-75">
                </div>
                <div class="col-lg-8 mb-0">
                    <p class="text-uppercase text-center pt-2 fs-5 fs-1 fw-bold">standar pelayanan minimum</p>
                </div>
            </div>
        </div>
        <!-- =================== End Header ================== -->
        <?= $this->endSection(); ?>
        <hr class="border border-primary border-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="col-sm-4">
                        <p class="fw-bold fs-4">SPM Aktif </p>
                    </div>
                    <div class="col-sm-4 text-end">
                        <a href="" class="btn btn-success" style="font-size: 13px;"><i class="bi bi-plus"></i>Tambah Temuan</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12" style="min-height: 65vh;">
            <div class="row g-1">
                <?php for ($i = 0; $i < 5; $i++) {  ?>
                    <div class="col-sm-12 col-lg-4 g-2 rounded">
                        <div class="border">
                            <div id="carouselExample<?php echo $i ?>" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?php echo $i ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?php echo $i ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- <img class="img-fluid p-2" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""> -->
                            <table class="table table-borderless">
                                <tr>
                                    <td>Kategori</td>
                                    <td>Indikator</td>
                                </tr>
                                <tr>
                                    <td>Issue date</td>
                                    <td>18 - 02 - 2024</td>
                                </tr>
                                <tr>
                                    <td>Target Pemenuhan</td>
                                    <td>20 - 02 - 2024</td>
                                </tr>
                                <tr>
                                    <td>Progress</td>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <td>PIC</td>
                                    <td>User</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <hr class="border border-primary border-1 border-opacity-75">
        <div class="align-self-end text-center m-3">
            <span>Copyright &copy; Bidang Operasi dan IT 2024</span>
        </div>

        <!-- 
        <footer class="align-self-end text-center">
            <span>Copyright &copy; Bidang Operasi dan IT 2024</span>
        </footer> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>