<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

//$_SESSION['cart'] = [];

PrintHead();
PrintCartTop();

//als de session cart bestaat
if ((isset($_SESSION['cart']))) {
    //voeren we voor elk element het volgende uit
    foreach ($_SESSION['cart'] as $key => $value) {
        $sql="SELECT pro_price,pro_name,pro_image,pro_id FROM Product WHERE pro_id = '$key'";
        $data = GetData($sql);

        printCartRow($data[0]['pro_price'],$data[0]['pro_image'],$data[0]['pro_name'],$value,$data[0]['pro_id']);
    }
}

PrintCartBottom();
PrintSideMenu();
PrintLittleSearchButton();

?>

<?php

PrintHeader();

$detailSQL = "SELECT * from Product WHERE pro_id=" . $_GET['pro_id'];

$rows = GetData($detailSQL);

$template = file_get_contents("templates/detail_book.html");

$html = MergeViewWithData($template, $rows);

print $html;

PrintJavaScript();

?>

</body>
</html>