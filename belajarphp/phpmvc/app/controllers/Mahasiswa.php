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
}
