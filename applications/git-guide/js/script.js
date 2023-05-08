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
                            <div class="card mb-3 border border-0 shadow bg-light">
                              <img src="https://source.unsplash.com/1000x500?${data.slug}" class="card-img-top" alt="${data.slug}">
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
