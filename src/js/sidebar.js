function openNav() {
  if (openMenu) {
    closeMenu();
    document.getElementById("side-nav").style.width = "310px";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("side-nav").style.width = "0";
}
function openMenu() {
  if (openNav) {
    closeNav();
    document.getElementById("side-menu").style.width = "310px";
  }
}

function closeMenu() {
  document.getElementById("side-menu").style.width = "0px";
}

let search = document.getElementById("little-search-collection");
function openSearch() {
  search.style.width = "300px";
  search.style.display = "block";
}

function closeSearch() {
  search.style.display = "none";
}

function checkSearchOpen() {
  if (search.style.display === "block") {
    closeSearch();
  } else {
    openSearch();
  }
}
