<?php
require_once "autoload.php";

function Search() {

    $resultList = [];
    $searchText = $_POST['search'];
    $trimText = trim($searchText);
    $list = explode(" ", $trimText);

    foreach ($list as $text){

        $data = GetData("SELECT * FROM Product JOIN Author ON Product.pro_aut_id = Author.aut_id 
                      WHERE aut_firstname LIKE '%$text%' 
                      OR aut_lastname LIKE '%$text%'  
                      OR pro_name LIKE '%$text%'");

        if ($data ==  null){
            echo "<div class='noresult'>The result cant be found your book '<span class='searchtext'>$searchText</span>'</div>";
        }
        foreach ($data as $row) {
                $resultList[$row['pro_id']] = $row;
        }
    }
    $arrayUniek = array_unique($resultList);//??????? klopt toch niet
    $template = file_get_contents("templates/bookBlock.html");
    $html = MergeViewWithData($template, $arrayUniek);
    print $html;
}