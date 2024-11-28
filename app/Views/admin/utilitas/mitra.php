<?= $this->extend('admin/layout/page_layout.php'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php
    if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('errors'); ?>
        </div>
    <?php endif; ?>
    <h1 class="h3 mb-4 text-gray-800">Mitra</h1>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List Mitra Operasi</h5>
                        <div class="col-8"></div>
                        <div class="col-4 text-end p-0">
                            <button id="tambah_mitra" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary" style="font-size: 12px;">+ Tambah Mitra</button>
                            <!-- <a href="#" class="btn btn-primary" style="font-size: 12px;" id="tambah_mitra" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Tambah Mitra</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Mitra</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <!-- <form action="admin/tambah_mitra" class="form" method="post"> -->
                                <form action="<?= base_url('admin/tambah_mitra'); ?>" class="form" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" placeholder="Masukan Nama Mitra" required autocomplete="off">
                                        <label for="nama_mitra">Nama Mitra</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="alias" id="alias" class="form-control" placeholder="ex : wsp" required autocomplete="off">
                                        <label for="alias">Nama Alias Mitra</label>
                                    </div>
                                    <input type="submit" value="Input" class="form-control bg-success text-white">
                                </form>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if ($mitra) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No</th>
                                <th scope="col">Nama Mitra</th>
                                <th scope="col">Nama Alias</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <?php $no = 1;  ?>
                            <?php foreach ($mitra as $mit) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $mit->nama_mitra ?></td>
                                    <td><?= $mit->alias ?></td>
                                    <td>
                                        <form action="/admin/hapus_mitra/<?= $mit->id_mitra; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus Mitra?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>
                    <div class="container-fluid" style="height: 500px; border-radius: 25px; border-style: dashed; border-width: 5px;border-color: gray;">
                        <div class="d-flex" style="height: 100%;">
                            <!-- <div class="p-2 border">Flex item 1</div> -->
                            <div class="p-2 align-content-center w-100 text-center">
                                <h5 class="text-secondary font-weight-bold">Belum ada data yang ditampilkan.</h5>
                            </div>
                            <!-- <div class="p-2 border">Flex item 3</div> -->
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>