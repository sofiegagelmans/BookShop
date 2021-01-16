<?php 
function PrintHead()
{
    $head = file_get_contents("./templates/head.html");
    print $head;
}

function PrintCart()
{
    $cart = file_get_contents("./templates/cart.html");
    print $cart;
}
function PrintSideMenu()
{
    $sideMenu = file_get_contents("./templates/side_menu.html");
    print $sideMenu;
}
function PrintLittleSearchButton()
{
    $searchButton = file_get_contents("./templates/little_search_button.html");
    print $searchButton;
}



