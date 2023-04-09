<?php
class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByNpm($npm) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE npm=:npm');
        $this->db->bind('npm', $npm);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO " . $this->table . " VALUES (:nama, :npm, :jurusan)";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($npm) {
        $query = "DELETE FROM " . $this->table . " WHERE npm=:npm";
        $this->db->query($query);

        $this->db->bind('npm', $npm);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // public function ubahDataMahasiswa($data) {
    //     $query = "UPDATE " . $this->table . " SET nama = :nama, npm = :npm, jurusan = :jurusan WHERE npm=:npm";
    //     $this->db->query($query);

    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('npm', $data['npm']);
    //     $this->db->bind('jurusan', $data['jurusan']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
}
