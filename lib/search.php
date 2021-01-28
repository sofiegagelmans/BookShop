<?php

require_once "autoload.php";

function Search() {

    $resultList = [];
    $searchText = $_POST['search'];
    $trimText = trim($searchText);
    $list = explode(" ", $trimText);

    foreach ($list as $text) {

        //sql
        $data = GetData("SELECT * FROM Product WHERE aut_firstname LIKE '%$text%' OR aut_lastname LIKE '%$text%' OR pro_name LIKE '%$text%'");

        if ($data ==  null) {
            echo "<div class='noresult'>Oops! There appear to be no results for '<span class='searchtext'>$searchText</span>'</div>";
        }
        foreach ($data as $row) {
            $resultList[$row['pro_id']] = $row;
        }
    }

    $arrayUniek = array_unique($resultList);
    $template = file_get_contents("templates/bookBlock.html");
    $extra_elements['csrf_token'] = GenerateCSRF("index.php");
    $html = MergeViewWithData($template, $arrayUniek);
    $html = MergeViewWithExtraElements($html, $extra_elements);

    print $html;
}