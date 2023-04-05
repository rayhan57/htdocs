<?php
//  File yg mau di baca
$file = "data.json";
//  Mendapatkan file json
$ambil = file_get_contents($file);
//  Decode data.json
$data = json_decode($ambil, true);

if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $merk = $_POST["merk"];
    $alamat = $_POST["alamat"];
    $tglpinjam = strtotime($_POST["tglpinjam"]);
    $tglkembali = strtotime($_POST["tglkembali"]);

    if ($merk == "Toyota Avanza") {
        $harga = 250000;
    } else if ($merk == "Mitsubishi Xpander") {
        $harga = 300000;
    } else {
        $harga = 270000;
    }

    $selisih = $tglkembali - $tglpinjam;
    $perhari = $selisih / 60 / 60 / 24;

    $totalharga = $harga * $perhari;

    //  Data
    $data [] = array(
        "nama" => $nama,
        "merk" => $merk,
        "alamat" => $alamat,
        "tglpinjam" => date('d-m-Y', $tglpinjam),
        "tglkembali" => date('d-m-Y', $tglkembali),
        "lamapinjam" => $perhari,
        "harga" => $totalharga
    );
    // Encode data jadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    // Simpan data ke data.json
    file_put_contents($file, $jsonfile);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD JSON</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/de0d5c5a2a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-3">Rental Mobil</h2>
        <div class="row justify-content-center">
        <div class="col-md-5">
          <form method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" />
            </div>

            <div class="mb-3">
              <label for="merk" class="form-label">Merk</label>
              <select
                class="form-select"
                aria-label="Default select example"
                name="merk"
              >
                <option value="Toyota Avanza">Toyota Avanza</option>
                <option value="Mitsubishi Xpander">Mitsubishi Xpander</option>
                <option value="Suzuki Ertiga">Suzuki Ertiga</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input
                type="text"
                class="form-control"
                id="alamat"
                name="alamat"
              />
            </div>

            <div class="mb-3">
              <label for="tglpinjam" class="form-label">Tanggal Pinjam</label>
              <input
                type="date"
                class="form-control"
                id="tglpinjam"
                name="tglpinjam"
              />
            </div>

            <div class="mb-3">
              <label for="tglkembali" class="form-label">Tanggal Kembali</label>
              <input
                type="date"
                class="form-control"
                id="tglkembali"
                name="tglkembali"
              />
            </div>

            <button type="submit" class="btn btn-primary" name="tambah">
              Tambah
            </button>
            <a class="btn btn-secondary" href="index.php"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
          </form>
        </div>
      </div>
    </div>
</body>
</html>