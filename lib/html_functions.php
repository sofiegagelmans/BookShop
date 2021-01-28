<?php

global $stock;

function PrintHead() {
    $head = file_get_contents("./templates/doctype.html");
    print $head;
}

function PrintCartTop() {
    $cartTop = file_get_contents("./templates/cartTop.html");

    if(isset($_SESSION['cart']) && count($_SESSION['cart'])!=0) {
        $cartTop = str_replace('@shopcartnum@',count($_SESSION['cart']),$cartTop);
    }else {
        $cartTop = str_replace('@shopcartnum@','0',$cartTop);
    }
    print $cartTop;
}

function PrintCartRow($price,$image,$name,$quantity,$id) {
    $cart = file_get_contents("./templates/cartRow.html");
    $cart = str_replace("@price@",$price,$cart);
    $cart = str_replace("@pro_image@",$image,$cart);
    $cart = str_replace("@pro_name@",$name,$cart);
    $cart = str_replace("@quantity@",$quantity,$cart);
    $cart = str_replace("@pro_id@",$id,$cart);
    print $cart;
}

function PrintCartBottom() {
    $cart = file_get_contents("./templates/cartBottom.html");
    print $cart;
}

function PrintSideMenu() {
    $sideMenu = file_get_contents("./templates/aside_mobile.html");
    print $sideMenu;
}

function PrintLittleSearchButton() {
    $searchButton = file_get_contents("./templates/little_search_button.html");
    print $searchButton;
}

function PrintHeader() {
    $header = file_get_contents("./templates/header.html");
    if(isset($_SESSION['cart']) && count($_SESSION['cart'])!=0) {
        $header = str_replace('@shopcartnum@',count($_SESSION['cart']),$header);
    }else {
        $header = str_replace('@shopcartnum@','0',$header);
    }
    print $header;
}

function PrintFooter() {
    $footer = file_get_contents("./templates/footer.html");
    print $footer;
}

function PrintMain() {
    $main = file_get_contents("./templates/index.html");
    print  $main;
}

function PrintJavaScript() {
    $js = file_get_contents("./templates/js.html");
    print $js;
}

function PrintDetailMain() {
    $dMain = file_get_contents("./templates/detail_book.html");
    print $dMain;
}

function PrintCrAMain() {
    $main = file_get_contents("./templates/create_account.html");
    print $main;
}

function PrintOHMain() {
    $main = file_get_contents("./templates/order_history.html");
    print $main;
}

function PrintUserInfoMain() {
    $main = file_get_contents("./templates/user_information.html");
    print $main;
}

function PrintSideMainUI() {
    $main = file_get_contents("./templates/aside_mobile_user.html");
    print $main;
}


function MergeViewWithData($template, $data) {
    $returnvalue = "";

    foreach ($data as $row) {
        $output = $template;

        foreach(array_keys($row) as $field) {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }
        $returnvalue .= $output;
    }
    return $returnvalue;
}

function MergeViewWithExtraElements($template, $elements) {

    foreach ($elements as $key => $element) {
        $template = str_replace( "@$key@", $element, $template );
    }
    return $template;
}

function MergeViewWithErrors($template, $errors) {

    foreach ($errors as $key => $error) {
        $template = str_replace("@$key@", "<p style='color:red'>$error</p>", $template);
    }
    return $template;
}

function RemoveEmptyErrorTags($template, $data) {

    foreach ($data as $row) {
        foreach(array_keys($row) as $field ) {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }
    return $template;
}
