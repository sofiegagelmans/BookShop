<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
//addproductifneded();
PrintHead();
PrintCart();
PrintSideMenu();
PrintLittleSearchButton();
PrintHeader();

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

     print '<span href="#" class="amount-items">(40 items)'.'</span>';
    ?>

           </div>
   <div class="section-body">

       <?php


    $catBookQuery = "SELECT * FROM Product
                          JOIN Product_Category ON Product.pro_id = Product_Category.pro_cat_pro_id
                          JOIN Category ON Category.cat_id = Product_Category.pro_cat_cat_id
                          WHERE cat_name LIKE '%$varGet%'
                         ";


       $rows = GetData("select * from Product");
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
        $sortHighestQuery = "SELECT * FROM Product order by pro_price desc";
        $sortHighestFiltred = GetData($sortHighestQuery);
        $sortTemplate = file_get_contents('templates/bookBlock.html');
        $sortHtml = MergeViewWithData($sortTemplate, $sortHighestFiltred);
        print $sortHtml;
    }
    elseif (isset($lowest)){
        $sql = "SELECT * FROM Product order by pro_price asc";
        $data = GetData($sql);
        $html = MergeViewWithData($template, $data);
        print $html;
    }
    elseif (isset($alphabet)){
        $sql = "SELECT * FROM Product order by pro_name asc";

        $data = GetData($sql);
        $html = MergeViewWithData($template, $data);

        print $html;
    }
    else{

    print $html;}
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