"use strict";

const like = document.querySelector(".like");

async function toggleLike(e) {
  e.preventDefault();
  let stateLike = e.target.getAttribute("data-like");
  let id = e.target.getAttribute("data-id");
  const response = await fetch("api/like", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      id: id,
    }),
  });
}

like.addEventListener("click", toggleLike);
