<?= $this->extend('user/layout/page_layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <?php
    if (session()->getFlashdata('pesan')) { ?>

        <div class="alert alert-success" role="alert">
            <?=
            session()->getFlashdata('pesan');
            // session()->getFlashdata('error');
            // session()->getFlashdata('success');
            ?>
            <!-- This is a danger alert—check it out! -->
        </div>
    <?php
    }
    ?>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="col-sm-4">
                <p class="fw-bold fs-4"> </p>
            </div>
            <?php if (session()->get('role') == 2) { ?>
                <div class="col-lg-4 text-end d-none d-sm-block">
                    <a href="<?= base_url('user/tambah_temuan') ?>" class="btn btn-success" style="font-size: 13px;"><i class="bi bi-plus"></i>Tambah Temuan</a>
                </div>
                <div class="col-8 text-end d-block d-sm-none">
                    <a href="<?= base_url('user/tambah_temuan') ?>" class="btn btn-success" style="font-size: 10px;"><i class="bi bi-plus"></i>Tambah Temuan</a>
                </div>
            <?php } ?>
        </div>
        <?php if (session()->getFlashdata('errors')) { ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('errors'); ?>
            </div>
        <?php        } ?>
    </div>
</div>
<?php if (session()->get('role') == 2) { ?>
    <div class="col-12" style="min-height: 65vh;">
        <div class="tabs mt-3">
            <ul>
                <li><a href="#tabs-ais">SPM AIS <?php if ($data_ais_count) { ?>
                            <span class="badge rounded-pill bg-danger"><?= $data_ais_count; ?></span>
                        <?php } ?></a></li>
                <li><a href="#tabs-db">SPM DB</a></li>
            </ul>
            <div id="tabs-ais">
                <div class="row g-1 mt-2">
                    <?php $i = 0; ?>
                    <?php foreach ($data_ais as $key) {
                        $i++;
                    ?>
                        <div class="col-sm-12 col-lg-4 g-2 rounded overflow-y-auto">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $key->id_temuan ?>">
                                <div class="card">
                                    <div id="carouselExample<?php echo $i ?>" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="10000">
                                                <img src="<?= base_url() . "images/$key->dokumentasi_0";  ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <!-- <h5>First Slide Label</h5> -->
                                                    <p class="bg-white">0%</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="10000">
                                                <?php if ($key->dokumentasi_50) { ?>
                                                    <img src="<?= base_url() . "images/$key->dokumentasi_50"; ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <!-- <h5>First Slide Label</h5> -->
                                                        <p class="bg-white">50%</p>
                                                    </div>
                                                <?php } else { ?>
                                                    <img src="<?= base_url('/images/no_image.png'); ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <!-- <h5>First Slide Label</h5> -->
                                                        <p class="bg-white">50%</p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="10000">
                                                <?php if ($key->dokumentasi_100) { ?>
                                                    <img src="<?= base_url() . "images/$key->dokumentasi_100"; ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <!-- <h5>First Slide Label</h5> -->
                                                        <p class="bg-white">100%</p>
                                                    </div>
                                                <?php } else { ?>
                                                    <img src="<?= base_url('/images/no_image.png'); ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <!-- <h5>First Slide Label</h5> -->
                                                        <p class="bg-white">100%</p>
                                                    </div>
                                                <?php } ?>
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
                                    <div class="col align-self-end" style="height: 100px; padding: 10px;">
                                        <?php if (($key->status) == 'open') { ?>
                                            <span class="badge bg-success"><?= $key->status; ?></span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger"><?= $key->status; ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="card-body" style="margin-top: -15px;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>Kategori</td>
                                                <td>:</td>
                                                <td><?= $key->nama_kategori; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Indikator</td>
                                                <td>:</td>
                                                <td><?= $key->nama_indikator; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sub-Indikator</td>
                                                <td>:</td>
                                                <td><?= $key->nama_subindikator; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Target Pemenuhan</td>
                                                <td>:</td>
                                                <td><?= $key->target_pemenuhan; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                            </a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-<?= $key->id_temuan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class=" modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Temuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tabs">
                                            <ul>
                                                <li><a href="#tabs-1">Temuan</a></li>
                                                <li><a href="#tabs-2">Perbaikan</a></li>
                                                <li><a href="#tabs-3">Lokasi</a></li>
                                            </ul>
                                            <div id="tabs-1">
                                                <img src="<?= base_url('images/') . $key->dokumentasi_0; ?>" alt="" width="100%" class="d-block p-2 img-fluid" draggable="false" style="max-width: 100%; height: auto;">
                                                <div class="col mt-2">
                                                    <p style="font-family: poppins;" class="fw-bold">Deskripsi</p>
                                                    <h4 class="text-secondary" style="margin-top: -15px; text-transform: capitalize;"><?= $key->deskripsi; ?></h4>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col">
                                                            <p class="fw-bold">Tanggal Temuan</p>
                                                            <p style="margin-top: -15px;"><?= $key->created_at; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Target Pemenuhan</p>
                                                            <p style="margin-top: -15px;"><?= $key->target_pemenuhan; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Selesai</p>
                                                            <?php if ($key->tanggal_selesai) { ?>
                                                                <p style="margin-top: -15px;"><?= $key->tanggal_selesai; ?></p>
                                                            <?php } else { ?>
                                                                <p style="margin-top: -15px;">-</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">Kordinat</p>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->latitude; ?></p>
                                                        </div>
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->longitude; ?></p>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">PIC</p>
                                                    <p style="margin-top: -15px;"><?= $key->pic; ?></p>
                                                </div>
                                            </div>
                                            <div id="tabs-2">
                                                <div id="carousel<?php echo $i ?>" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active" data-bs-interval="10000">
                                                            <!-- <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 p-2" alt="..."> -->
                                                            <img src="<?= base_url() . "images/$key->dokumentasi_0";  ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                            <div class="carousel-caption d-none d-md-block">
                                                                <!-- <h5>First Slide Label</h5> -->
                                                                <p class="bg-white">0%</p>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item" data-bs-interval="10000">
                                                            <?php if ($key->dokumentasi_50) { ?>
                                                                <img src="<?= base_url() . "images/$key->dokumentasi_50"; ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <!-- <h5>First Slide Label</h5> -->
                                                                    <p class="bg-white">50%</p>
                                                                </div>
                                                            <?php } else { ?>
                                                                <img src="<?= base_url('/images/no_image.png'); ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <!-- <h5>First Slide Label</h5> -->
                                                                    <p class="bg-white">50%</p>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="carousel-item" data-bs-interval="10000">
                                                            <?php if ($key->dokumentasi_100) { ?>
                                                                <img src="<?= base_url() . "images/$key->dokumentasi_100"; ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <!-- <h5>First Slide Label</h5> -->
                                                                    <p class="bg-white">100%</p>
                                                                </div>
                                                            <?php } else { ?>
                                                                <img src="<?= base_url('/images/no_image.png'); ?>" class="d-block img-fluid p-2" alt="..." style="max-width: 100%; height: auto;" draggable="false">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <!-- <h5>First Slide Label</h5> -->
                                                                    <p class="bg-white">100%</p>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $i ?>" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $i ?>" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                <div class="col mt-2">
                                                    <p style="font-family: poppins;" class="fw-bold">Deskripsi</p>
                                                    <h4 class="text-secondary" style="margin-top: -15px; text-transform: capitalize;"><?= $key->deskripsi; ?></h4>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col">
                                                            <p class="fw-bold">Tanggal Temuan</p>
                                                            <p style="margin-top: -15px;"><?= $key->created_at; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Target Pemenuhan</p>
                                                            <p style="margin-top: -15px;"><?= $key->target_pemenuhan; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Selesai</p>
                                                            <?php if ($key->tanggal_selesai) { ?>
                                                                <p style="margin-top: -15px;"><?= $key->tanggal_selesai; ?></p>
                                                            <?php } else { ?>
                                                                <p style="margin-top: -15px;">-</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">Kordinat</p>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->latitude; ?></p>
                                                        </div>
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->longitude; ?></p>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">PIC</p>
                                                    <p style="margin-top: -15px;"><?= $key->pic; ?></p>
                                                    <?php if ($key->dokumentasi_50 && !$key->dokumentasi_100 && session()->get('role') != 2) { ?>
                                                        <p style="font-family: poppins;" class="fw-bold">Update Progress 100%</p>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <?= form_open_multipart('user/update_100/' . $key->id_temuan) ?>
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" value="<?= $key->id_temuan; ?>" name="id_temuan">
                                                                <input type="file" name="dokumentasi_100" class="form-control" style="font-size: 14px;margin-top: -15px;" capture accept="image/*" value="<?= old('dokumentasi_100'); ?>" required>
                                                            </div>
                                                            <div class="col-2"><input type="submit" value="Update" class="btn btn-success" style="font-size: 14px;margin-top: -15px;"></div>
                                                            <?= form_close(); ?>
                                                        </div>
                                                    <?php } elseif (!$key->dokumentasi_50) { ?>
                                                        <p style="font-family: poppins;" class="fw-bold">Update Progress 50%</p>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <?= form_open_multipart('user/update_50/' . $key->id_temuan) ?>
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" value="<?= $key->id_temuan; ?>" name="id_temuan">
                                                                <input type="file" name="dokumentasi_50" class="form-control" style="font-size: 14px;margin-top: -15px;" capture accept="image/*" value="<?= old('dokumentasi_50'); ?>" required>
                                                            </div>
                                                            <div class="col-2"><input type="submit" value="Update" class="btn btn-success" style="font-size: 14px;margin-top: -15px;"></div>
                                                            <?= form_close(); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div id="tabs-3">
                                                <div id="peta<?= $i ?>" style="height: 250px;"></div>
                                                <div class="col mt-2">
                                                    <p style="font-family: poppins;" class="fw-bold">Deskripsi</p>
                                                    <h4 class="text-secondary" style="margin-top: -15px; text-transform: capitalize;"><?= $key->deskripsi; ?></h4>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col">
                                                            <p class="fw-bold">Tanggal Temuan</p>
                                                            <p style="margin-top: -15px;"><?= $key->created_at; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Target Pemenuhan</p>
                                                            <p style="margin-top: -15px;"><?= $key->target_pemenuhan; ?></p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold">Selesai</p>
                                                            <?php if ($key->tanggal_selesai) { ?>
                                                                <p style="margin-top: -15px;"><?= $key->tanggal_selesai; ?></p>
                                                            <?php } else { ?>
                                                                <p style="margin-top: -15px;">-</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">Kordinat</p>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->latitude; ?></p>
                                                        </div>
                                                        <div class="col" style="margin-top: -15px;">
                                                            <p><i class="bi bi-geo-alt-fill"></i> <?= $key->longitude; ?></p>
                                                        </div>
                                                    </div>
                                                    <p style="font-family: poppins;" class="fw-bold">PIC</p>
                                                    <p style="margin-top: -15px;"><?= $key->pic; ?></p>
                                                </div>
                                                <script>
                                                    var map = L.map("peta<?= $i ?>").setView([<?= $key->latitude; ?>, <?= $key->longitude; ?>], 13);
                                                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                        maxZoom: 19,
                                                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                                    }).addTo(map);
                                                    var marker = L.marker([<?= $key->latitude; ?>, <?= $key->longitude; ?>]).addTo(map);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    } ?>
                </div>
            </div>
            <div id="tabs-db">tab db</div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12" style="min-height: 65vh;">
        <div class="row g-1 mt-2 ">
            <?php $i = 0; ?>
            <div class="h3" style="text-transform: uppercase;">SPM <?= session()->get('alias') ?></div>
            <hr style="width: 100%; border-width: 2px;" class="mt-0 mb-0">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#open" class="nav-link active" aria-current="page">Open <?= $open_count > 0 ? "<span class='badge bg-danger'>$open_count</span>" : '' ?></a></li>
                <li class="nav-item"><a href="#review" class="nav-link">On Review <?= $review_count > 0 ? "<span class='badge bg-danger'>$review_count</span>" : ""; ?></a></li>
                <li class="nav-item"><a href="#revision" class="nav-link">Revision <?= $revision_count > 0 ? "<span class='badge bg-danger'>$revision_count</span>" : ""; ?></a></li>
            </ul>
            <div class="tab-content">
                <div id="open" class="tab-pane fade show active">
                    <?= $this->include('user/sipintas-content-page/open'); ?>
                </div>
                <div id="review" class="tab-pane fade">
                    <?php
                    // echo $this->include('user/sipintas-content-page/review');
                    ?>
                </div>
                <div id="revision" class="tab-pane fade">
                    <?= $this->include('user/sipintas-content-page/revision'); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?= $this->endSection(); ?>