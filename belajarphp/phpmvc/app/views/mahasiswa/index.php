<div class="container mt-5">
    <h2>Daftar Mahasiswa</h2>
    <?php foreach ($data['mhs'] as $mhs) : ?>
        <ul>
            <li><?= $mhs['nama']; ?></li>
            <li><?= $mhs['npm']; ?></li>
            <li><?= $mhs['jurusan']; ?></li>
        </ul>
    <?php endforeach; ?>
</div>