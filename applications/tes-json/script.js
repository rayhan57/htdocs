fetch("mahasiswa.json")
  .then((response) => response.json())
  .then((data) => {
    const tableBody = document.querySelector("tbody");
    let tableData = "";
    let no = 1;
    data.forEach((mhs) => {
      tableData += `
        <tr>
          <th scope="row">${no++}</th>
          <td>${mhs.nama}</td>
          <td>${mhs.umur}</td>
          <td>${mhs.jurusan}</td>
          <td>
          <a href="" class="btn btn-sm btn-warning">Edit</a>
          <a href="" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
      `;
    });
    tableBody.innerHTML = tableData;
  })
  .catch((error) => console.log(error));
