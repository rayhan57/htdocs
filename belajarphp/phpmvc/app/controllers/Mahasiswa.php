<?php

class Mahasiswa extends Controller {
    public function index() {
        $data['title'] = "Scholar Register";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($npm) {
        $data['title'] = "Scholar Detail";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByNpm($npm);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($npm) {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($npm) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getUbah() {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiwaByNpm($_POST['npm']));
    }

    // public function ubah() {
    //     if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
    //         Flasher::setFlash('Berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . '/mahasiswa');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Gagal', 'diubah', 'danger');
    //         header('Location: ' . BASEURL . '/mahasiswa');
    //         exit;
    //     }
    // }
}
