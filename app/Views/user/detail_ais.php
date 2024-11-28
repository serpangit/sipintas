<?= $this->extend('user/layout/page_layout.php'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <?php foreach ($data_ais as $key) { ?>
        <div class="row justify-content-center align-items-center" style="margin-top: 50px;">
            <div class="w-75">
                <div class="d-flex bg-light" style="height: 250px;">
                    <div class="col p-2 my-auto">
                        <img src="<?= base_url('images/') . $key->dokumentasi_0; ?>" alt="" width="100%">
                    </div>
                    <div class="col p-2 my-auto">
                        <?php if ($key->dokumentasi_50) { ?>
                            <img src="<?= base_url('images/') . $key->dokumentasi_50; ?>" alt="" width="100%">
                        <?php } else { ?>
                            <input type="file" name="dokumentasi_50" id="" class="form-control" style="font-size: 14px;" capture accept="image/*" value="<?= old('dokumentasi_50'); ?>">
                        <?php   } ?>
                    </div>
                    <div class="col p-2 my-auto">
                        <?php if ($key->dokumentasi_50) { ?>
                            <input type="file" name="dokumentasi_50" id="" class="form-control" style="font-size: 14px;" capture accept="image/*" value="<?= old('dokumentasi_50'); ?>">
                        <?php } else { ?>
                            <p class="text-center">Update Progress 50% terlebih dahulu</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="d-flex bg-light text-center" style="height: 100%;">
                    <div class="col p-2">0% </div>
                    <div class="col p-2">50%</div>
                    <div class="col p-2">100%</div>
                </div>
            </div>
            <table class="table w-50 mt-3">
                <tbody>
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
                        <td>Sub-indikator</td>
                        <td>:</td>
                        <td><?= $key->nama_subindikator; ?></td>
                    </tr>
                    <tr>
                        <td class="fst-italic">Created at</td>
                        <td>:</td>
                        <td><?php
                            echo date($key->created_at)
                            ?></td>
                    </tr>
                    <tr>
                        <td>Target Pemenuhan</td>
                        <td>:</td>
                        <td><?= $key->target_pemenuhan; ?></td>
                    </tr>
                    <tr>
                        <td>Lokasi Objek</td>
                        <td>:</td>
                        <td><?= $key->lokasi_objek; ?></td>
                    </tr>
                    <tr>
                        <td>Jalur</td>
                        <td>:</td>
                        <td><?= $key->jalur; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?= $key->deskripsi; ?></td>
                    </tr>
                    <tr>
                        <td>PIC</td>
                        <td>:</td>
                        <td><?= $key->pic; ?></td>
                    </tr>
                </tbody>
            </table>

        <?php }; ?>
        </div>
</div>
<!-- <div class="container bg-primary"></div> -->
<?= $this->endSection(); ?>