<?php
    error_reporting( E_ALL );
    ini_set( 'display_errors', 1 );

    require_once "lib/autoload.php";

    PrintHead();
    PrintCart();
    PrintSideMenu();
    PrintLittleSearchButton();
?>


<?php
    PrintHeader();
?>

<main class="main">
    <div class="detail-page">

    <?php
        $sql = "select * from Product where pro_id=" . $_GET['pro_id'];
        $rows = GetData( $sql );

        //loopt iedere afbeelding af
        foreach ($rows as $row) {
        $link_image = "images/" . $row['pro_image'];

            //de gehele kolom met de titel en de afbeeldingen
            print '<div class="detail-book">';
            print '<div class="detail-book-cover">';
            print '<div class="detail-book-header">';
            print '<a class="#" href="">';
            print '<img src="' . $link_image . '"alt="bookcover" />';
            print '</a>';
            print '</div>';
        }

PrintDetailMain();

        foreach ($rows as $row) {
        $link_image = "images/" . $row['pro_image'];

            //de gehele kolom met de titel en de afbeeldingen
            print '<p>' . $row['pro_description'] . '</p>';
            print '<br>';
            print '<p>' . $row['pro_description'] . '</p>';
            print '<br>';
            print '<p> Title: ' . $row['pro_name'] . '</p>';
            print '<p> Author: ' . $row['pro_aut_id'] . '</p>';
            print '<p> Publisher: ' . $row['pro_pub_id'] . '</p>';
            print '<p> Year of publication: ' . $row['pro_year'] . '</p>';
            print '<p> Number of pages: ' . $row['pro_pages'] . '</p>';
            print '<p> Price: €' . $row['pro_price'] . ' </p>';
        }
?>
            <br>
            <div class="detail-button">
                <div class="detail-cart">
                    <a href="#">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</main>
    <a class="detail-return" href="index.php"><--- Go Back</a>

<?php
    PrintJavaScript();
?>

  </body>
</html>