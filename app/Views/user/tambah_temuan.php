<?= $this->extend('user/layout/page_layout') ?>
<?= $this->section('content') ?>
<p><a href="" class="text-primary" style="--bs-text-opacity: .7; font-size: 5;" onclick="history.back()"><i>
            << Back to Dashboard</i></a></p>
<p class="fs-5 fw-bold">Data Hasil Pemeriksaan Lapangan</p>
<?php //echo validation_list_errors();
?>
<?php validation_list_errors()
?>
<!-- <form action="/user/create_spm" class="m-2 needs-validation" method="post" novalidate> -->
<?php
if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $session->getFlashdata('errors'); ?>
    </div>
<?php endif; ?>
<?= form_open_multipart(base_url('user/create_spm')) ?>
<?= csrf_field(); ?>
<div class="container-xs">
    <div class="form-group">
        <div class="row g-3 align-items-center">
            <div class="col-sm-2">

                <label for="" class="col-form-label">Pilih SPM</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <select name="mitra_spm" id="" class="form-select" style="font-size: 14px;">
                    <option value="<?= old('mitra_spm'); ?>" disabled selected>Pilih SPM</option>
                    <?php foreach ($mitra as $m) { ?>
                        <option value="<?= $m->alias; ?>"><?= $m->nama_mitra; ?></option>
                    <?php  } ?>
                </select>
            </div>


            <div class="col-sm-2">
                <label for="" class="col-form-label">Kategori SPM</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <!-- <select name="kategori_spm" id="kategori_spm" class="form-select" style="font-size: 14px;" onchange="autofill()"> -->
                <select name="kategori_spm" id="kategori_spm" class="form-select" style="font-size: 14px;" onchange="fetchIndikatorData(this.value)">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <?php foreach ($kategori as $value) { ?>
                        <option value="<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></option>
                    <?php  } ?>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">Indikator</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <!-- <select name="kategori_spm" id="kategori_spm" class="form-select" style="font-size: 14px;" onchange="autofill()"> -->
                <select name="indikator" id="indikator" class="form-select" style="font-size: 14px;" onchange="fetchsubIndikatorData(this.value)">
                    <option value="" disabled selected>Pilih Indikator</option>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">Sub-Indikator</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <!-- <select name="kategori_spm" id="kategori_spm" class="form-select" style="font-size: 14px;" onchange="autofill()"> -->
                <select name="subindikator" id="subindikator" class="form-select" style="font-size: 14px;">
                    <option value="" disabled selected>Pilih Sub Indikator</option>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="target_pemenuhan" class="col-form-label">Target Pemenuhan</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <!-- <input type="date" name="target_pemenuhan" id="target_pemenuhan" class="form-control" style="font-size: 14px;"> -->
                <input type="text" name="target_pemenuhan" id="target_pemenuhan" class="form-control" style="font-size: 14px;" readonly>
            </div>
            <div class="col-sm-2">
                <label for="lokasi_objek" class="col-form-label">Lokasi Objek</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <input type="text" name="lokasi_objek" id="" class="form-control" style="font-size: 14px;" autocomplete="off" value="<?= set_value('lokasi_objek') ?>">
            </div>
            <div class="col-sm-2">
                <label for="" class="col-form-label">Jalur</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <input type="text" name="jalur" id="" class="form-control" style="font-size: 14px;" autocomplete="off" value="<?= old('jalur'); ?>">
            </div>
            <div class="col-sm-2">
                <label for="" class="col-form-label">Deskripsi</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <textarea type="text" name="deskripsi" id="" class="form-control mt-3" style="font-size: 14px;" autocomplete="off"><?= old('deskripsi'); ?></textarea>
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">Dokumentasi</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <input type="file" name="dokumentasi_0" id="" class="form-control" style="font-size: 14px;" capture accept="image/*" value="<?= old('dokumentasi_0'); ?>">
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">Latitude</label>
            </div>
            <div class="col-sm-4 mt-0 mt-auto">
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-geo-alt-fill"></i></div>
                    <input type="text" name="latitude" id="lat" class="form-control" style="font-size: 14px;" autocomplete="off" value="<?= old('pic'); ?>" readonly>
                </div>
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">Longitude</label>
            </div>
            <div class="col-sm-4 mt-0 mt-auto">
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-geo-alt-fill"></i></div>
                    <input type="text" name="longitude" id="long" class="form-control" style="font-size: 14px;" autocomplete="off" value="<?= old('pic'); ?>" readonly>
                </div>
            </div>

            <div class="col-sm-2">
                <label for="" class="col-form-label">PIC</label>
            </div>
            <div class="col-sm-10 mt-0 mt-auto">
                <input type="text" name="pic" id="" class="form-control" style="font-size: 14px;" autocomplete="off" value="<?= old('pic'); ?>">
            </div>
            <div class="col-sm-2">
                <label for="" class="col-form-label"></label>
            </div>
            <div class="col-sm-10 mt-2">
                <!-- <input type="text" name="pic" id="" class="form-control" style="font-size: 14px;"> -->
                <button type="submit" class="btn btn-success form-control" style="font-size: 14;">Submit</button>
            </div>


        </div>
    </div>

    <div class="form-group">

    </div>
</div>
<?php
echo form_close()
?>


<!-- </form> -->
<?= $this->endSection() ?>