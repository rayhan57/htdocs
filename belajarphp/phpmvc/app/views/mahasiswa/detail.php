<?php $mhs = $data['mhs'] ?>

<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $mhs['nama'] ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $mhs['npm'] ?></h6>
            <p class="card-text"><?= $mhs['jurusan'] ?></p>
            <a href="<?= BASEURL ?>/mahasiswa" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>