<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintCart();
PrintSideMenu();
PrintLittleSearchButton();
PrintHeader();



?>
<main class="main main-index">

    <?php

    PrintMain();
    print '<div class="section-body">';

//

    $rows = GetData("select * from Product");

//    //loop over de afbeeldingen
    foreach ($rows as $row) {
        $link_image = "images/" . $row['pro_image'];

        //de kolom met de titel en de afbeelding erin


        print '<div class="book-info">';
        print '<div class="book-info-body">';
        print '<div class="book-info-body-text">';
        print '<a class="#" href="#">';
        print '<img src="'.$link_image.'" alt="bookcover"/>';
        print '</a>';
        print '<div class="cart">';
        print '<a href="#">Add To Cart</a>';
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




    }

    print '</div>';


    ?>


    </section>
</main>




<?php
PrintFooter();
PrintJavaScript();
?>
  </body>
</html>
