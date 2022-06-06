<?php $this->extend('layout/template'); ?>


<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Me</h2>

            <?php foreach ($alamat as $key => $a) : ?>
                <ul>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['alamat']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>