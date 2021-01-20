


<?php



require_once "autoload.php";
if (isset($_POST["search"])) {
//    $searchq = $_POST["search"];
//    $searchq = preg_replace("#[ˆ0-9a-z]#i","",$searchq);
$s = GetData("SELECT * FROM Product WHERE pro_name LIKE '%".$_POST['search']."%'");
//    $sth = $conn->prepare("SELECT * FROM `search` WHERE Name = '$str'");
//
//    $sth->setFetchMode(PDO:: FETCH_OBJ);
//    $sth -> execute();
//    $search_data();

 foreach ($s as $row) {
    $link_image = "images/" . $row['pro_image'];

    print '<img src="' . $link_image . '" alt="bookcover"/>';

   }
}
else{
        echo "Name Does not exist";
    }


?>

