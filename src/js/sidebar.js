function openNav() {
  var win = window,
    doc = document,
    docElem = doc.documentElement,
    body = doc.getElementsByTagName("body")[0],
    x = win.innerWidth || docElem.clientWidth || body.clientWidth,
    y = win.innerHeight || docElem.clientHeight || body.clientHeight;

  if (x > "700") {
    document.getElementById("side-nav").style.width = "310px";
  }
  if (x < "700") {
    let side = document.getElementById("side-nav");
    side.style.width = "100%";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("side-nav").style.width = "0";
}
function openMenu() {
  if (openNav) {
    closeNav();
    document.getElementById("side-menu").style.width = "100%";
  }
}

function closeMenu() {
  document.getElementById("side-menu").style.width = "0px";
}

let search = document.getElementById("little-search-collection");
function openSearch() {
  search.style.width = "200px";
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
