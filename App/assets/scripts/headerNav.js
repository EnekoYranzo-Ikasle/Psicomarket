let menu = document.querySelector("nav");
let menuIcon = document.querySelector(".menuIcon");

menuIcon.addEventListener("click", showNav);

function showNav() {
  menuIcon.classList.toggle("active")
  switch (menu.className) {
    case "closed":
      menu.classList.remove("closed");
      menu.classList.add("opened");
      break;
    case "opened":
      menu.classList.remove("opened");
      menu.classList.add("closed");

      break;
  }
}
