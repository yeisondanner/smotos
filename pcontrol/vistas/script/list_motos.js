document.addEventListener("DOMContentLoaded", () => {
  deleteMoto();
  openModalEdit();
  closeModal();
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

function openModalEdit() {
  const btnOpenModalEdit = document.querySelectorAll(".btn-open-edit-modal");
  btnOpenModalEdit.forEach((element) => {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      document.getElementById("txtIdMoto").value =
        element.getAttribute("data-id");
      document.getElementById("txtModelo").value =
        element.getAttribute("data-modelo");
      document.getElementById("txtMarca").value =
        element.getAttribute("data-marca");
      document.getElementById("txtYear").value =
        element.getAttribute("data-year");
      document.getElementById("txtPrecio").value =
        element.getAttribute("data-precio");
      document.getElementById("txtDescripcion").value =
        element.getAttribute("data-descripcion");
      /*
       * Abrir el modal
       */
      const modal = document.getElementById("myModal");
      const modalContent = document.querySelector(".modal-content");
      modal.style.display = "block";
      setTimeout(() => {
        modal.classList.add("show");
        modalContent.classList.add("show");
      }, 10);
    });
  });
}
function closeModal() {
  const closeModalBtn = document.querySelectorAll(".close-btn");
  closeModalBtn.forEach((element) => {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      /*
       * Cerrar el modal
       */
      const modal = document.getElementById("myModal");
      const modalContent = document.querySelector(".modal-content");
      modal.classList.remove("show");
      modalContent.classList.remove("show");
      setTimeout(() => {
        modal.style.display = "none";
      }, 500);
    });
  });
}
