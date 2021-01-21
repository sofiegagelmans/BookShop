<?php
require_once "autoload.php";

function Search() {

    $s = GetData("SELECT * FROM Product JOIN Author ON Product.pro_aut_id = Author.aut_id 
                      WHERE aut_firstname LIKE '%".$_POST['search']."%' 
                      OR aut_lastname LIKE '%".$_POST['search']."%'  
                      OR pro_name LIKE '%".$_POST['search']."%'");

    foreach ($s as $row) {
        $link_image = "images/" . $row['pro_image'];

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

