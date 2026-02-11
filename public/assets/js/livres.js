"use strict";

const supprBtn = document.getElementById("supprBtn");

function deletePopUp(e) {
  e.preventDefault();
  Swal.fire({
    title: "Etes-vous sûr de vouloir supprimer ?",
    text: "Vous ne pourrez plus revenir en arrière",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#B0B0B0",
    confirmButtonText: "Oui, supprimer",
    cancelButtonText: "Annuler",
  }).then((result) => {
    if (result.isConfirmed) {
      let id = e.target.getAttribute("data-id");
      window.location.href = `/livres/delete?id=${id}`;
    }
  });
}

supprBtn.addEventListener("click", deletePopUp);
