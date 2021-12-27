<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <?php if(session()->get('message')) : ?>
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Mahasiswa berhasil<strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger' role='alert>" . session()->get('err') . "</div>";
            }
            ?>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Input Data Mahasiswa</i>
            </button>
        </div>
        <div class="card-body">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($Mahasiswa as $row) : ?>
            <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                <tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!--- Modal --->
<div class="modal fade" id="modalTambah"
    <div class="model-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Mahasiswa/tambah'); ?>" method="post">
                <div class="form-group mb-0">
                    <label for="nim"></label>
                    <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM">
                </div>
                <div class="form-group mb-0">
                    <label for="nama"></label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="Submit" name="tambah" class="btn btn-primary">Input</button>
            </div>
            </form>
        </div>
    </div>
</div>
