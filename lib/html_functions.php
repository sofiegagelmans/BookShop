<?php
global $stock;
function PrintHead()
{
    $head = file_get_contents("./templates/doctype.html");
    print $head;
}

function PrintCart()
{
    $cart = file_get_contents("./templates/cart.html");
    print $cart;
}
function PrintSideMenu()
{
    $sideMenu = file_get_contents("./templates/aside_mobile.html");
    print $sideMenu;
}
function PrintLittleSearchButton()
{
    $searchButton = file_get_contents("./templates/little_search_button.html");
    print $searchButton;
}

function PrintHeader()
{
    $header = file_get_contents("./templates/header.html");
    print $header;
}

function PrintFooter()
{
    $footer = file_get_contents("./templates/footer.html");
    print $footer;
}

function PrintMain(){
    $main = file_get_contents("./templates/index.html");
    print  $main;
}

function PrintJavaScript()
{
    $js = file_get_contents("./templates/js.html");
    print $js;
}

function PrintDetailMain(){
    $dMain = file_get_contents("./templates/detail_book.html");
    print $dMain;
}

function PrintCrAMain(){
    $main = file_get_contents("./templates/create_account.html");
    print $main;
}

function PrintOHMain(){
    $main = file_get_contents("./templates/order_history.html");
    print $main;
}

function PrintUserInfoMain(){
    $main = file_get_contents("./templates/user_information.html");
    print $main;
}

function PrintSideMainUI(){
    $main = file_get_contents("./templates/aside_mobile_user.html");
    print $main;
}


function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    return $returnvalue;
}

function CountStock($sql){

    $count = $sql;
    $cdata = GetData($count);
    $row = $cdata[0];
    $stock = (int)$row["COUNT(pro_id)"];
    return $stock;
}

