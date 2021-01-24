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

        $sql = "SELECT * from Product 
               JOIN Author ON Product.pro_aut_id = Author.aut_id 
               JOIN Publisher ON Product.pro_aut_id = Publisher.pub_id
                where pro_id=" . $_GET['pro_id'];
        $rows = GetData( $sql );

    $template = file_get_contents("templates/detail_book.html");

    $html = MergeViewWithData($template, $rows);

    print $html;


    PrintJavaScript();
?>

  </body>
</html>