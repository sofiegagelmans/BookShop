<?php
require_once "autoload.php";

function Search(){


//    $searchq = $_POST["search"];
//    $searchq = preg_replace("#[ˆ0-9a-z]#i","",$searchq);
    $s = GetData("SELECT * FROM Product WHERE pro_name LIKE '%".$_POST['search']."%' ");
//    $sth = $conn->prepare("SELECT * FROM `search` WHERE Name = '$str'");
//
//    $sth->setFetchMode(PDO:: FETCH_OBJ);
//    $sth -> execute();
//    $search_data();

    foreach ($s as $row) {
        $link_image = "images/" . $row['pro_image'];
//
//print '<img src="' . $link_image . '" alt="bookcover"/>';


        print '<div class="book-info">';
        print '<div class="book-info-body">';
        print '<div class="book-info-body-text">';
        print '<a class="#" href="#">';
        print '<img src="'.$link_image.'" alt="bookcover"/>';
        print '</a>';
        print '<div class="cart">';
        print '<a href="#">Add to Cart</a>';
        print '</div>';
        print '<div class="more-info">';

        //hyperlink
//        print '<a href=stad.php?img_id=' . $row['img_id'] . '>Meer info</a>';

        print '<a href="detail_book.php?pro_id='. $row['pro_id'] .'">More Info</a>';
        print '</div>';
        print '</div>';
        print '</div>';
        print '<div class="book-info-footer">';
        print '<div class="book-title">' . $row['pro_name'] . '</div>';
        print '<div class="book-price">'."€" . $row['pro_price'] . '</div>';
        print '<div class="book-stock">In Stock</div>';
        print '</div>';
        print '</div>';


//    $count = $count + 1;





    }
}

