<div class="container mt-5">
    <div class="col-md-5">
        <?php Flasher::flash() ?>
    </div>
    <h2 class="pb-4">Daftar Mahasiswa</h2>
    <!-- Button modal -->
    <button type="button" class="btn btn-primary mb-2 btnTambah" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah mahasiswa
    </button>
    <!-- Card -->
    <div class="col-md-5">
        <?php foreach ($data['mhs'] as $mhs) : ?>
            <ul class="list-group">
                <li class="list-group-item"><?= $mhs['nama'] ?>
                    <a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['npm'] ?>" class="text-decoration-none badge text-bg-warning float-end ms-1" onclick="return confirm('Yakin ingin menghapus <?= $mhs['nama'] ?>?')">hapus</a>
                    <a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs['npm'] ?>" class="text-decoration-none badge text-bg-info float-end ms-1 btnUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-npm="<?= $mhs['npm'] ?>">ubah</a>
                    <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['npm'] ?>" class="text-decoration-none badge text-bg-primary float-end ms-1">detail</a>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                    </div>
                    <!-- NPM -->
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="number" class="form-control" id="npm" name="npm">
                    </div>
                    <!-- Jurusan -->
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                            <option selected>Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>