<?php
    error_reporting( E_ALL );
    ini_set( 'display_errors', 1 );

    require_once "lib/autoload.php";

    PrintHead();
    PrintCartTop();

if ((isset($_SESSION['cart']))) { //als de session cart bestaat
    foreach ($_SESSION['cart'] as $key => $value) { //voeren we voor elk element het volgende uit
        $sql="SELECT pro_price,pro_name,pro_image FROM Product WHERE pro_name = '$key'"; //sql statement
        $data = GetData($sql); //data uit de databank halen en stoppen in variable $data

        printCartRow($data[0]['pro_price'],$data[0]['pro_image'],$data[0]['pro_name'],$value);
    }
}

    PrintCartBottom();
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