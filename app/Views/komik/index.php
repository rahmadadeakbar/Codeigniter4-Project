<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Komik</h1>
            <a href="/komik/create" class="btn btn-primary md-3">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($komik as $key => $k) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                            <td><?= $k['judul']; ?></td>
                            <td> <a href="/komik/detail/<?= $k['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>