document.addEventListener("DOMContentLoaded", () => {
  deleteMoto();
});
function deleteMoto() {
  const arrData = document.querySelectorAll(".btn-delete");
  arrData.forEach((element) => {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      const idMotos = element.getAttribute("data-id");
      const status = element.getAttribute("data-status");
      const url = base_url + "ajax/delete_moto.php";
      const data = new FormData();
      data.append("idMoto", idMotos);
      data.append("status", status);
      const headers = new Headers();
      const options = {
        method: "POST",
        headers: headers,
        mode: "cors",
        cache: "no-cache",
        body: data,
      };
      fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
          if (data.status) {
            window.location.reload();
          }
        })
        .catch((error) => {
          console.error(error);
        });
    });
  });
}
