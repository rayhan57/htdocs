$(function () {
  $(".btnTambah").on("click", function () {
    $("#judulModal").html("Tambah mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah");
  });

  $(".btnUbah").on("click", function () {
    $("#judulModal").html("Ubah mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah");
    $(".modal-body").attr(
      "action",
      "http://localhost/belajarphp/phpmvc/public/mahasiswa/ubah"
    );
    const npm = $(this).data("npm");

    $.ajax({
      url: "http://localhost/belajarphp/phpmvc/public/mahasiswa/getubah",
      data: { npm: npm },
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#npm").val(data.npm);
        $("#nama").val(data.jurusan);
      },
    });
  });
});
