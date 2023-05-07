const content = document.querySelector(".content");

fetch("data/tutorial.json")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((data) => {
      let langkah = data.langkah;
      let langkahHTML = "";

      langkah.forEach((langkah) => {
        langkahHTML += `<li class="list-group-item">${langkah}</li>`;
      });

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
  })
  .catch((error) => console.error(error));

function handleRoute() {
  const route = window.location.hash.substr(2);

  switch (route) {
    case "register":
      content.innerHTML = `<h1>${Data.judul}</h1><ol class="list-group list-group-numbered">${langkahHTML}</ol>`;
      break;
    case "contact":
      content.innerHTML = "<h1>Contact</h1><p>Ini adalah halaman contact</p>";
      break;
    default:
  }
}
window.addEventListener("hashchange", handleRoute);
handleRoute();
