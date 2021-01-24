<?php
require_once "autoload.php";

function Search() {

    $resultList = [];
    $searchText = $_POST['search'];
    $list = explode(" ", $searchText);

    foreach ($list as $text){

        $data = GetData("SELECT * FROM Product JOIN Author ON Product.pro_aut_id = Author.aut_id 
                      WHERE aut_firstname LIKE '%$text%' 
                      OR aut_lastname LIKE '%$text%'  
                      OR pro_name LIKE '%$text%'");
        foreach ($data as $row) {
            $resultList[$row['pro_id']] = $row;
        }
    }
    $arrayUniek = array_unique($resultList);
    $template = file_get_contents("templates/bookBlock.html");
    $html = MergeViewWithData($template, $arrayUniek);
    print $html;
}

