<?php
require_once "autoload.php";

function Search() {



    $resultList = [];
    $w = $_POST['search'];
    $list = explode(" ", $w);


    foreach ($list as $a){


        $data = GetData("SELECT * FROM Product JOIN Author ON Product.pro_aut_id = Author.aut_id 
                      WHERE aut_firstname LIKE '%$a%' 
                      OR aut_lastname LIKE '%$a%'  
                      OR pro_name LIKE '%$a%'");





        foreach ($data as $row) {

//            eerst rol controle op basis van id

//            if...{
//
//            }else{
//
//            }
            $resultList[$row['pro_id']] = $row;

        }

 foreach($resultList as $row){
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
 }


    }
}

