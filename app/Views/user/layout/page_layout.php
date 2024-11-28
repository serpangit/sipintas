<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipintas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("style/user.css") ?>">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <!-- js maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- end js maps -->

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $(function() {
            $(".tabs").tabs();
        });
    </script>

</head>

<body class="d-flex vh-100">
    <div class="container-sm content shadow overflow-auto">
        <!-- =================== Header ================== -->
        <div class="col-12">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <form action="<?= base_url('/login/keluar'); ?>" method="post"><?= csrf_field(); ?>
                        <button type="submit" class="btn btn-link w-100 text-left text-primary" style="text-decoration: none; font-size: 12px; padding: 0px;" onclick="return confirm('Anda yakin ingin keluar?')">Logout</button>
                    </form>
                </div>
                <div class="p-2">Halo, <?= session()->get('nama_akun'); ?> |</div>
            </div>

            <!-- <p class="text-end"><a href="">Halo, <?= session()->get('nama_akun'); ?> <i class="bi bi-caret-down-fill" style="font-size: 12px;"></i></a></p> -->
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <img src="<?php echo base_url("images/logo.png") ?>" alt="" class="img-fluid mx-auto d-block mt-2 w-75" draggable="false">
                </div>
                <div class="col-lg-8 mb-0">
                    <!-- <p class="text-uppercase text-center pt-2 fs-5 fs-1 fw-bold">sistem pelayanan informasi jalan tol</p> -->
                    <p class="text-uppercase text-center pt-2 fs-3 fs-1 fw-bold">standar pelayanan minimum</p>
                </div>
            </div>
        </div>
        <!-- =================== End Header ================== -->
        <p id="tanggal"></p>

        <!-- ====================== Content ======================== -->
        <hr class="border border-primary border-5">
        <div class="col-12" style="min-height: 75vh;">
            <?= $this->renderSection('content') ?>

        </div>
        <!-- ====================== End Content ======================== -->
        <hr class="border border-primary border-1 border-opacity-75">

        <!-- ========================== Footer ========================== -->
        <div class="align-self-end text-center m-3" style="font-size: 10px;">
            <!-- <span>Copyright &copy; Bidang Operasi dan IT 2024</span> -->
            <i><span>Copyright &copy; Althof Fauzan Fahmi 2024</span></i>
        </div>
        <!-- ========================== End Footer ========================== -->
        <!-- 
        <footer class="align-self-end text-center">
            <span>Copyright &copy; Bidang Operasi dan IT 2024</span>
        </footer> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $(".nav-tabs a").click(function() {
                $(this).tab('show');
            });
        });
    </script>

    <script>
        var a = navigator.geolocation.getCurrentPosition(successFunction);
        var latitude = document.getElementById("lat");
        var longitude = document.getElementById("long");

        function successFunction(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            $('#lat').val(lat);
            $('#long').val(long);
        }
    </script>

    <script>
        // var b = navigator.geolocation.getCurrentPosition(successFunction);   
        function dapatMaps(a, b) {
            var map = L.map('peta').setView([a, b], 13);
            console.log(a);
            console.log(b);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".tombol").click(function() {
                $.LoadingOverlay("show");
            })
        })
    </script>
</body>
<script>
    $('#subindikator').on('change', (event) => {
        getKategori(event.target.value).then(kat => {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month < 10) {
                month = '0' + month
            }

            var d = date.getDate()
            if (d < 10) {
                d = '0' + d
            }

            var c_date = year + "-" + month + "-" + day;
            var res = new Date(c_date);
            var res2 = res.setDate(res.getDate() + parseInt(kat.target_pemenuhan));
            var result = new Date(res2);

            var a = result.getDate();
            var b = result.getMonth() + 1;
            var c = result.getFullYear();
            var d_date = c + "-" + b + "-" + a;
            console.log(b);
            console.log(result);
            console.log(d_date);
            $('#target_pemenuhan').val(d_date);
        });
    });
    async function getKategori(id_subindikator) {
        let response = await fetch('/api/user/show/' + id_subindikator)
        let data = await response.json();
        return data;
    }


    //get data indikator
    function fetchIndikatorData(id_kategori) {
        // alert(id_kategori);
        $.ajax({
            url: "<?= site_url("user/indikator") ?> ",
            method: "POST",
            data: {
                kId: id_kategori
            },
            success: function(result) {
                let data = JSON.parse(result);
                let output = "<option disabled selected>Pilih Indikator</option>";
                let outputSubIndikator = "<option disabled selected>Pilih Sub Indikator</option>";
                // let outputTarget = " ";
                for (let row in data) {
                    output += `<option value="${data[row].id_indikator}">${data[row].nama_indikator}</option>`;
                    // console.log(data[row].id_indikator);
                    // console.log(data[row].nama_indikator);
                }
                document.querySelector("#indikator").innerHTML = output;
                document.querySelector("#subindikator").innerHTML = outputSubIndikator;
                // document.querySelector("#target_pemenuhan").innerHTML = outputSubIndikator;
                // console.log(result);
            }
        })
    }


    //get data subindikator
    function fetchsubIndikatorData(id_indikator) {
        $.ajax({
            url: "<?= site_url("user/subindikator"); ?>",
            method: "POST",
            data: {
                sId: id_indikator
            },
            success: function(result) {
                let data = JSON.parse(result);
                let output = "<option disabled selected>Pilih Sub Indikator</option>";
                for (let row in data) {
                    output += `<option value="${data[row].id_subindikator}">${data[row].nama_subindikator}</option>`;
                    // console.log(data[row].id_subindikator);
                    // console.log(data[row].nama_subindikator);
                }

                document.querySelector("#subindikator").innerHTML = output;
            }
        })
    }
</script>


</html>