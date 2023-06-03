const content = document.querySelector(".content");

fetch("data/tutorial.json")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((data) => {
      let langkahHTML = "";
      let langkah = data.langkah;

      langkah.forEach((step) => {
        langkahHTML += `<li class="list-group-item list-group-item-light">${step}</li>`;
      });

      content.innerHTML += `<div class="col-md-4">
                            <div class="card mb-3 border border-0 shadow">
                              <img src="${data.gambar}" class="card-img-top" alt="${data.gambar}">
                              <div class="card-body border-bottom">
                                <h5 class="card-title">${data.judul}</h5>
                                <p class="card-text">${data.deskripsi}</p>
                              </div>
                              <ul class="list-group list-group-flush">
                              <p class="fs-5 mx-3 pt-2 fw-semibold">Langkah-langkah:</p>
                                ${langkahHTML}
                              </ul>
                            </div>
                            </div>`;
    });
  })
  .catch((error) => console.error(error));

const btnMode = document.querySelector(".mode i");
const btnLight = document.querySelector(".light");
const btnDark = document.querySelector(".dark");
const html = document.querySelector("html");

function setTheme(theme) {
  html.setAttribute("data-bs-theme", theme);
  btnMode.classList.toggle("fa-sun", theme == "light");
  btnMode.classList.toggle("fa-moon", theme == "dark");
}

btnLight.addEventListener("click", () => setTheme("light"));
btnDark.addEventListener("click", () => setTheme("dark"));
