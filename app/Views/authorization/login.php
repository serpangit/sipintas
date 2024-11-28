<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SPM Login :.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url("style/style.css") ?>" rel="stylesheet">
</head>

<body>
    <!-- <div class="container-fluid bg-success" style="height: 100vh;">
    </div> -->
    <?= session()->getFlashdata('message'); ?>
    <div class="login-container d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="col">
                <form action="<?= base_url('/login/auth'); ?>" class="login-form text-center" method="post">
                    <?php echo csrf_field() ?>
                    <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" name="username" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-custom text-uppercase btn-lg rounded-pill btn-lg w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>