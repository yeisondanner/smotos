document.addEventListener("DOMContentLoaded", () => {
  deleteMoto();
  openModalEdit();
  closeModal();
  updateMoto();
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
      //seleccionamos un option del select de acuerdo al value del option
      const select = document.getElementById("slctCategoria");
      const option = select.querySelector(
        `option[value="${element.getAttribute("data-idCateregoria")}"]`
      );
      select.value = option.value;
      //sleecionamos un option del select color de acuerdo al value del option
      const selectColor = document.getElementById("slctColor");
      const optionColor = selectColor.querySelector(
        `option[value="${element.getAttribute("data-idColor")}"]`
      );
      selectColor.value = optionColor.value;
      document.getElementById("txtCilindrada").value =
        element.getAttribute("data-Cilindrada");
      //sleccionamos el tipo de transmision de acuerdo al value del option
      const selectTransmision = document.getElementById("slctTipoTransmision");
      const optionTransmision = selectTransmision.querySelector(
        `option[value="${element.getAttribute("data-idTipoTransmision")}"]`
      );
      selectTransmision.value = optionTransmision.value;

      //seleccionamos  si el Encendido electrico es electronico o no del option del select
      const selectEnc = document.getElementById("slctEncendidoElectrico");
      const optionEnc = selectEnc.querySelector(
        `option[value="${element.getAttribute("data-encendidoElectrico")}"]`
      );
      selectEnc.value = optionEnc.value;
      //seleccionamos si el encendido es manual o no del option del select
      const selectEncManual = document.getElementById("slctEncendidoManual");
      const optionEncManual = selectEncManual.querySelector(
        `option[value="${element.getAttribute("data-encendidoManual")}"]`
      );
      selectEncManual.value = optionEncManual.value;
      //seleccionamos el tipo de motor de acuerdo al value del option, tambien el tipo de freno delantero y otro option de freno trasero
      const selectTipoMotor = document.getElementById("slctTipoMotor");
      const optionTipoMotor = selectTipoMotor.querySelector(
        `option[value="${element.getAttribute("data-idTipoMotor")}"]`
      );
      selectTipoMotor.value = optionTipoMotor.value;
      const selectFrenoDelantero = document.getElementById("scltFrenoD");
      const optionFrenoDelantero = selectFrenoDelantero.querySelector(
        `option[value="${element.getAttribute("data-idTipoFrenoDelantero")}"]`
      );
      selectFrenoDelantero.value = optionFrenoDelantero.value;

      const selectFrenoTrasero = document.getElementById("scltFrenoT");
      const optionFrenoTrasero = selectFrenoTrasero.querySelector(
        `option[value="${element.getAttribute("data-idTipoFrenoTrasero")}"]`
      );
      selectFrenoTrasero.value = optionFrenoTrasero.value;
      document.getElementById("txtPeso").value =
        element.getAttribute("data-peso");
      document.getElementById("txtAceleracion").value =
        element.getAttribute("data-aceleracion");
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
function updateMoto() {
  const formMoto = document.getElementById("formMoto");
  formMoto.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(formMoto);
    const encabezados = new Headers();
    const config = {
      method: "POST",
      headers: encabezados,
      mode: "cors",
      cache: "no-cache",
      body: data,
    };
    const url = base_url + "ajax/update_moto.php";
    fetch(url, config)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la solicitud");
        }
        return response.json();
      })
      .then((data) => {
        if (data.status) {
          window.location.reload();
        }
      })
      .catch((error) => {
        console.error(error);
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
