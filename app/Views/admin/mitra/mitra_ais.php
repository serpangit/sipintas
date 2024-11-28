<?= $this->extend('admin/layout/page_layout')  ?>
<?= $this->section('content') ?>
<div id="content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">SPM AIS</h1>
        <hr style="width:50%;text-align:left;margin-left:0">
        <div class="row g-1 mt-2">

            <?php foreach ($data_ais as $data) { ?>
                <div class="card m-1" style="width: 20rem;">
                    <img src="<?= base_url() . "images/$data->dokumentasi_0"; ?>" alt="">
                </div>
            <?php } ?>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>