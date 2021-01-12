function openNav() {
  if (openMenu) {
    closeMenu();
    document.getElementById("mySidenav").style.width = "310px";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function openMenu() {
  if (openNav) {
    closeNav();
    document.getElementById("myHamburgerMenu").style.width = "310px";
  }
}

function closeMenu() {
  document.getElementById("myHamburgerMenu").style.width = "0px";
}

function openSearch() {
  let search = document.getElementById("search-collection");
  let body = document.getElementById("body");

  if (body.width > "704px") {
    search.style.width = "350px";
  } else {
    search.style.width = "35px";
  }

  // closeSearch();
}

function closeSearch() {
  let search = document.getElementById("search-collection");
}

// function myFunction() {
//   setTimeout(function () {
//     alert("Hello");
//   }, 3000);
// }
