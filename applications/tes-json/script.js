function cekBrowser() {
  if (typeof Storage === "undefined") {
    alert("Browser Anda tidak mendukung local storage.");
  }
}
cekBrowser();

function formatTanggal(tanggal) {
  const arrayTanggal = tanggal.split("-"); // 2023-04-31 jadi [2023,04,31]
  const hari = arrayTanggal[2];
  const bulan = arrayTanggal[1];
  const tahun = arrayTanggal[0];
  return `${hari}-${bulan}-${tahun}`;
}

let keyword;
function tambahData() {
  const tanggal = document.getElementById("tanggal").value;
  const keterangan = document.getElementById("keterangan").value;
  const pendapatan = document.getElementById("pendapatan").value;
  const pengeluaran = document.getElementById("pengeluaran").value;
  const tombolTambah = document.querySelector(".modal-footer button");

  if (!tanggal || !keterangan || !pendapatan || !pengeluaran) {
    alert("Data belum diisi.");
    return;
  }

  if (tombolTambah.innerText === "Tambah") {
    tambahBiodata(tanggal, keterangan, pendapatan, pengeluaran);
    alert("Data berhasil ditambahkan.");
  } else {
    ubahBiodata(tanggal, keterangan, pendapatan, pengeluaran);
    alert("Data berhasil diubah.");
  }
}

function tambahBiodata(tanggal, keterangan, pendapatan, pengeluaran) {
  const biodata = JSON.parse(localStorage.getItem("BIODATA")) || [];
  biodata.push({
    tanggal: formatTanggal(tanggal),
    keterangan: keterangan,
    pendapatan: formatRupiah(pendapatan),
    pengeluaran: formatRupiah(pengeluaran),
  });
  localStorage.setItem("BIODATA", JSON.stringify(biodata));
  location.reload();
}

function ubahBiodata(tanggal, keterangan, pendapatan, pengeluaran) {
  const biodata = JSON.parse(localStorage.getItem("BIODATA")) || [];
  biodata.findIndex((data) => {
    if (data.keterangan === keyword) {
      data.tanggal = formatTanggal(tanggal);
      data.keterangan = keterangan;
      data.pendapatan = formatRupiah(pendapatan);
      data.pengeluaran = formatRupiah(pengeluaran);
    }
  });
  localStorage.setItem("BIODATA", JSON.stringify(biodata));
  location.reload();
}

function tampilkanData() {
  let no = 1;
  const biodata = JSON.parse(localStorage.getItem("BIODATA"));
  const tabelBody = document.querySelector("tbody");

  for (const data of biodata) {
    tabelBody.innerHTML += `<tr><th scope="row">${no++}</th><td>${
      data.tanggal
    }</td><td>${data.keterangan}</td><td>${data.pendapatan}</td><td>${
      data.pengeluaran
    }</td><td><button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalTambahData" onclick="editData('${
      data.keterangan
    }')"><i class="bi bi-pencil-square"></i></button> <button class="btn btn-sm btn-danger" onclick="hapusData('${
      data.keterangan
    }')"><i class="bi bi-trash"></i></button></td></tr>`;
  }
}
tampilkanData();

function hapusData(keterangan) {
  const konfirmasi = confirm(`Yakin ingin menghapus ${keterangan}?`);
  if (!konfirmasi) return;

  const biodata = JSON.parse(localStorage.getItem("BIODATA"));
  const index = biodata.findIndex((data) => data.keterangan === keterangan);
  biodata.splice(index, 1);
  localStorage.setItem("BIODATA", JSON.stringify(biodata));
  location.reload();
  alert(`Berhasil menghapus ${keterangan}`);
}

const judulModal = document.querySelector(".modal-title");
const modalFooter = document.querySelector(".modal-footer button");

function editData(key) {
  keyword = key;
  const tanggal = document.getElementById("tanggal");
  const keterangan = document.getElementById("keterangan");
  const pendapatan = document.getElementById("pendapatan");
  const pengeluaran = document.getElementById("pengeluaran");

  const biodata = JSON.parse(localStorage.getItem("BIODATA"));
  biodata.findIndex((data) => {
    if (data.keterangan === keyword) {
      tanggal.value = dateChooser(data.tanggal);
      keterangan.value = data.keterangan;
      pendapatan.value = formatAngka(data.pendapatan);
      pengeluaran.value = formatAngka(data.pengeluaran);
    }
  });

  // Ubah tulisan tambah jadi ubah
  judulModal.innerHTML = "Ubah Data";
  modalFooter.innerHTML = "Ubah";
}

function klikTambahData() {
  const tombolTambahData = document.querySelector(".tambah-data");
  const form = document.querySelector("form");

  tombolTambahData.addEventListener("click", function () {
    form.reset();
    judulModal.innerHTML = "Tambah Data";
    modalFooter.innerHTML = "Tambah";
  });
}
klikTambahData();

function formatRupiah(angka) {
  const uang = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  })
    .format(angka)
    .replace(",00", "");
  return uang;
}

function formatAngka(rupiah) {
  let angka = parseInt(rupiah.replace(/[^0-9]/g, ""));
  return angka;
}

function dateChooser(tanggal) {
  const arrayTanggal = tanggal.split("-"); // 31-04-2023 jadi [31,04,2023]
  const hari = arrayTanggal[0];
  const bulan = arrayTanggal[1];
  const tahun = arrayTanggal[2];
  return `${tahun}-${bulan}-${hari}`;
}
