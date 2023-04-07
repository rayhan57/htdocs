<?php
class Mahasiswa_model {
    private $dbh;
    private $st;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa() {
        $this->st = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->st->execute();
        return $this->st->fetchAll(PDO::FETCH_ASSOC);
    }
}
