<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

//$_SESSION['cart'] =[];

//addproductifneded();
PrintHead();
PrintSideMenu();
PrintLittleSearchButton();
PrintHeader();
PrintCartTop();

if ((isset($_SESSION['cart']))) { //als de session cart bestaat
    foreach ($_SESSION['cart'] as $key => $value) { //voeren we voor elk element het volgende uit
        $sql="SELECT pro_price,pro_name,pro_image,pro_id FROM Product WHERE pro_id = '$key'"; //sql statement
        $data = GetData($sql); //data uit de databank halen en stoppen in variable $data

        printCartRow($data[0]['pro_price'],$data[0]['pro_image'],$data[0]['pro_name'],$value,$data[0]['pro_id']);
    }
}

PrintCartBottom();

?>
<main class="main main-index">

    <aside>

        <span>Categories</span>
        <ul>
            <?php

            global $varGet;
            global $highest;
            global $lowest;
            global $alphabet;


            if (key_exists("category",$_GET) && $_GET['category'] != NULL) {
                $varGet = $_GET['category'];

            }
            if (key_exists("highest",$_GET) && $_GET['highest'] != NULL) {
                $highest = $_GET['highest'];

            }
            if (key_exists("lowest",$_GET) && $_GET['lowest'] != NULL) {
                $lowest = $_GET['lowest'];

            }
            if (key_exists("alphabet",$_GET) && $_GET['alphabet'] != NULL) {
                $alphabet = $_GET['alphabet'];

            }

            $catSql = "SELECT * FROM Category";
            $asideTemp = '<li><a href="index.php?category=@cat_name@">@cat_name@</a>';
            $asideData = GetData($catSql);

            $mergeCatData = MergeViewWithData($asideTemp,$asideData);
            print $mergeCatData;

            ?>
            <li><a href="index.php" class="all-items">Show All</a></li>
        </ul>
    </aside>

    <?php
    PrintMain();
$catBookQuery = "SELECT * FROM Product
                          JOIN Product_Category ON Product.pro_id = Product_Category.pro_cat_pro_id
                          JOIN Category ON Category.cat_id = Product_Category.pro_cat_cat_id
                          where pro_publish = 1 and cat_name LIKE '%$varGet%'";


    if (isset($varGet)){

//        if (isset($highest)){
//        $catBookQuery .= "order by pro_price desc";
//    }

        $catFiltred = GetData($catBookQuery);
        $arrrr = [];

        foreach ($catFiltred as $row) {
            $arrrr[$row['pro_id']] = $row;
        }
        $items = count($arrrr);

        print $span = "<span href='#' class='amount-items'> ($items Items) </span>";

    }
    else{
        $rows = GetData("select * from Product");
        $arrrr = [];
        foreach ($rows as $row) {
            $arrrr[$row['pro_id']] = $row;
        }
        $items = count($arrrr);
        print $span = "<span href='#' class='amount-items'> ($items Items) </span>";
    }
    ?>

    </div>
    <div class="section-body">

        <?php

        /*
                $stock = "SELECT * FROM Product
                          JOIN Stock ON Stock.sto_id = Product.pro_stock_id";
                $data = GetData($sql);
                $html = MergeViewWithData($template, $data);
                print $stockhtml;

                // get the product and stock level
                if($stock > 5) {
                    echo $html; //in stock
                } elseif ($stock <= 5) {
                    echo $html; //low in stock
                } elseif ($stock == 0) {
                    echo  $html; //out of stock
                }


            global $product;
            global $stockName;
            if ( $product->is_in_stock() > 5 ) { // If product is in stock
                // Displays the stock quantity
                echo '<div class="book-stock" >' . $stockName . '</div>';
                } elseif ( $product->is_in_stock() <= 5 ) { // If is shop page (and product is in stock
                echo '<div class="book-stock" >' . __( 'low in stock', 'envy' ) . '</div>'; // Don't display stock quantity (and removes nothing)
                } else ( $product->is_in_stock() == 0 ) { // Display 'out of stock' string
                echo '<div class="book-stock" >' . __( 'out of stock', 'envy' ) . '</div>';
                // Removes "add to cart" button
                add_action('init','remove_loop_button');
            }
         */

//        $stock = "SELECT * FROM Product
//                  JOIN Stock ON Stock.sto_id = Product.pro_stock_id";
//        $data = GetData($stock);
////        $html = MergeViewWithData($template, $data);
////        print $html;

    $rows = GetData("select * from Product where pro_publish = 1 ");
    $template = file_get_contents("templates/bookBlock.html");
    $html = MergeViewWithData($template, $rows);



    if (isset($_POST["search"])) {
            Search();
        }elseif (isset($varGet)){

            $catFiltred = GetData($catBookQuery);
            $catTemplate = file_get_contents('templates/bookBlock.html');
            $catHtml = MergeViewWithData($catTemplate, $catFiltred);
            print $catHtml;
    }
    elseif (isset($highest)){
        $sortHighestQuery = "SELECT * FROM Product where pro_publish = 1 order by pro_price desc";
        $sortHighestFiltred = GetData($sortHighestQuery);
        $sortTemplate = file_get_contents('templates/bookBlock.html');
        $sortHtml = MergeViewWithData($sortTemplate, $sortHighestFiltred);
        print $sortHtml;
    }
    elseif (isset($lowest)){
        $sql = "SELECT * FROM Product where pro_publish = 1 order by pro_price asc";
        $data = GetData($sql);
        $html = MergeViewWithData($template, $data);
        print $html;
    }
    elseif (isset($alphabet)){
        $sql = "SELECT * FROM Product where pro_publish = 1 order by pro_name asc";
        $data = GetData($sql);
        $html = MergeViewWithData($template, $data);
        print $html;
    }
    else{

    print $html;
    }
    ?>

      </div>
    </section>
</main>

<?php
PrintFooter();
PrintJavaScript();
?>
</body>
</html>