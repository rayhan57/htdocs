<div class="container mt-5">
    <h2 class="pb-4">Daftar Mahasiswa</h2>
    <div class="col-5">
        <?php foreach ($data['mhs'] as $mhs) : ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start"><?= $mhs['nama'] ?>
                    <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['npm'] ?>" class="badge text-bg-primary">detail</a>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</div>