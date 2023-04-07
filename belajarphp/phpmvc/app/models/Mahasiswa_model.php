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
}
