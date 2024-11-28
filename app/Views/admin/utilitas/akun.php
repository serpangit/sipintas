<?= $this->extend('admin/layout/page_layout.php'); ?>
<?= $this->section('content'); ?>
<?php
?>
<div class="container-fluid">
    <?php
    if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('errors'); ?>
        </div>
    <?php endif; ?>
    <h1 class="h3 mb-4 text-gray-800">Akun</h1>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List Akun</h5>
                        <div class="col-8"></div>
                        <div class="col-4 text-end p-0">
                            <a href="#" class="btn btn-primary" style="font-size: 12px;" id="tambah_akun" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Tambah Akun</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown no-arrow"></div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Akun</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <!-- <form action="admin/tambah_mitra" class="form" method="post"> -->
                                <form action="<?= base_url('admin/tambah_akun'); ?>" class="form" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_akun" id="nama_akun" class="form-control" placeholder="Masukan Nama Akun" required autocomplete="off">
                                        <label for="nama_akun">Nama Akun</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="username_akun" id="username_akun" class="form-control" placeholder="Masukan Nama Akun" required autocomplete="off">
                                        <label for="username_akun">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_akun" id="password_akun" class="form-control" placeholder="Masukan Password" required autocomplete="off">
                                        <label for="password_akun">Password</label>
                                    </div>
                                    <select name="nama_mitra" class="form-select" style="padding-top: 15px;padding-bottom: 15px;margin-bottom: 15px;">
                                        <option value="" disabled selected>Pilih Mitra</option>
                                        <?php foreach ($mitra2 as $key) { ?>
                                            <option value="<?= $key['id_mitra']; ?>"><?= $key['nama_mitra']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="mb-3">
                                        <!-- <input type="text" name="role" id="role" class="form-control" placeholder="Role Akun" required autocomplete="off"> -->
                                        <select name="role" id="" class="form-select" style="padding-top: 15px;padding-bottom: 15px;">
                                            <option value="" selected disabled>Role Akun</option>
                                            <?php foreach ($role as $r) { ?>
                                                <option value="<?= $r['id_role']; ?>"><?= $r['nama_role']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- <label for="alias">Role Akun</label> -->
                                    </div>
                                    <input type="submit" value="Input" class="form-control bg-success text-white">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Akun</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <?php $no = 1 ?>
                        <?php foreach ($akun as $ak) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $ak->nama_akun ?></td>
                                <td><?= $ak->nama_role; ?></td>
                                <td>
                                    <form action="<?= base_url('admin/hapus_akun/' . $ak->id_akun); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus akun?')" class="btn btn-danger" style="font-size: 10px;" <?= ($ak->nama_akun == 'Admin' ? 'disabled' : ''); ?>><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                <!-- <td><a href="" data-bs-toggle="tooltip" title="test" class="btn btn-success" style="font-size: 10px;"><i class="fa-solid fa-pen"></i></a> | <a href="" class="btn btn-danger" style="font-size: 10px ;"><i class="fa-solid fa-trash"></i></a></td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>