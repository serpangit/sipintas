<?= $this->extend('admin/layout/page_layout.php'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Indikator </h1>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <!-- <div class="row justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List Kategori SPM</h6>
                        <h6 class="m-0 font-weight-bold text-primary">List Kategori SPM</h6>
                    </div> -->
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List Indikator SPM</h5>
                        <div class="col-8"></div>
                        <div class="col-4 text-end p-0">
                            <a href="#" class="btn btn-primary" style="font-size: 12px;" id="tambah_kategori" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Tambah Indikator</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Indikator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="<?= base_url('../../admin/tambah_indikator'); ?>" class="form" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama_indikator" id="nama_indikator" class="form-control" placeholder="Masukan Indikator" required autocomplete="off">
                                            <label for="nama_mitra">Indikator</label>
                                        </div>
                                        <select name="nama_kategori" class="form-select" style="padding-top: 15px;padding-bottom: 15px;margin-bottom: 15px;">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <?php foreach ($kategori as $key) { ?>
                                                <option value="<?= $key['id_kategori']; ?>"><?= $key['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
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
                <!-- <h6 class="m-0 font-weight-bold text-primary">List Kategori SPM</h6> -->
                <div class="dropdown no-arrow">
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="col-12">
                        <div class="row justify-content-between">
                            <a href="" class="btn btn-primary mb-3">+ Tambah Kategori</a>
                            <a href="" class="btn btn-primary mb-3">+ Tambah Kategori</a>
                        </div>
                    </div> -->
                <table class="table table-bordered table-striped" id="dataTable" style="width:100%">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Indikator</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($indikator as $ind) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $ind->nama_indikator ?></td>
                                <td><?= $ind->nama_kategori; ?></td>
                                <td>
                                    <form action="<?= base_url("admin/hapus_indikator/" . $ind->id_indikator); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus indikator?')" class="btn btn-danger" style="font-size: 10px;"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>