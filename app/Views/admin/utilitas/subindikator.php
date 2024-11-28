<?= $this->extend('admin/layout/page_layout.php'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Sub-Indikator </h1>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <!-- <div class="row justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List Kategori SPM</h6>
                        <h6 class="m-0 font-weight-bold text-primary">List Kategori SPM</h6>
                    </div> -->
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List Sub-Indikator SPM</h5>
                        <div class="col-8"></div>
                        <div class="col-4 text-end p-0">
                            <a href="#" class="btn btn-primary" style="font-size: 12px;" id="tambah_kategori" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Tambah Sub-Indikator</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Sub-Indikator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="<?= base_url('../../admin/tambah_subindikator'); ?>" class="form" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama_subindikator" id="nama_subindikator" class="form-control" placeholder="Masukan Sub-Indikator" required autocomplete="off">
                                            <label for="nama_mitra">Sub-indikator</label>
                                        </div>
                                        <select name="nama_indikator" class="form-select" style="padding-top: 15px;padding-bottom: 15px;margin-bottom: 15px;">
                                            <option value="" disabled selected>Pilih Indikator</option>
                                            <?php foreach ($indikator as $key) { ?>
                                                <option value="<?= $key->id_indikator; ?>"><?= $key->nama_indikator; ?></option>
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
                            <th scope="col">Sub-Indikator</th>
                            <th scope="col">Indikator</th>
                            <th scope="col">Target Pemenuhan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($subindikator as $sub) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $sub->nama_subindikator ?></td>
                                <td><?= $sub->nama_indikator; ?></td>
                                <td><?= $sub->target_pemenuhan; ?> Hari</td>
                                <td>
                                    <form action="<?= base_url("admin/hapus_subindikator/" . $sub->id_subindikator); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus sub-indikator?')" class="btn btn-danger" style="font-size: 10px;"><i class="fa-solid fa-trash"></i></button>
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