function cekBrowser() {
  const meessage = document.querySelector(".meessage");
  if (typeof Storage !== "undefined") {
    meessage.innerHTML =
      '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Hooray!</strong> The browser you are using supports local storage.<button type="button"class="btn-close"data-bs-dismiss="alert"aria-label="Close"></button></div>';
  } else {
    meessage.innerHTML =
      '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong> The browser you are using does not supports local storage.<button type="button"class="btn-close"data-bs-dismiss="alert"aria-label="Close"></button></div>';
  }
}
cekBrowser();
