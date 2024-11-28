<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Akun</h1>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List Akun</h5>
                    </div>
                </div>
                <div class="dropdown no-arrow"></div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Akun</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <?php $no = 1 ?>
                        <?php foreach ($akun as $ak) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $ak['nama_akun'] ?></td>
                                <td><a href="" data-bs-toggle="tooltip" title="test" class="btn btn-success" style="font-size: 10px;"><i class="fa-solid fa-pen"></i></a> | <a href="" class="btn btn-danger" style="font-size: 10px ;"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>