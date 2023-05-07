const content = document.querySelector(".content");

fetch("data/tutorial.json")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((data) => {
      content.innerHTML += `<div class="col-md-4">
          <div class="card mb-3">
            <img src="https://source.unsplash.com/200x100?${data.slug}" class="card-img-top" alt="${data.judul}" />
            <div class="card-body">
              <p class="card-text">
                ${data.deskripsi}
              </p>
              <a href="#/${data.slug}" class="card-link btn btn-primary">Baca</a>
            </div>
          </div>
        </div>`;
    });
    window.addEventListener("hashchange", handleRoute);
    handleRoute(data);
  })
  .catch((error) => console.error(error));

function handleRoute(data) {
  const route = window.location.hash.substr(2);
  let langkah = data[0].langkah;
  let langkahHTML = "";

  langkah.forEach((step) => {
    langkahHTML += `<li class="list-group-item">${step}</li>`;
  });

  switch (route) {
    case "register":
      console.log(data);
      content.innerHTML = `<h1>${data[0].judul}</h1><ol class="list-group list-group-numbered">${langkahHTML}</ol>`;
      break;
    case "contact":
      content.innerHTML = "<h1>Contact</h1><p>Ini adalah halaman contact</p>";
      break;
    default:
  }
}
