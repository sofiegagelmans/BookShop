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
<<<<<<< HEAD
    
=======
<main class="main main-index">
    <aside>
        <span>Categories</span>
        <ul>
            <?php
            $g = $_GET['cat_name'];

            if (isset($g)) {
                $sql = "SELECT * FROM Product
                      JOIN Product_Category ON Product.pro_id = Product_Category.pro_cat_pro_id
                      JOIN Category ON Category.cat_id = Product_Category.pro_cat_cat_id
                      WHERE cat_name LIKE '%$g%'
                      ";
                print $sql;
                $querySide = GetData($sql);

                print "count:" . count($querySide);




//        $sideData = GetData($querySide);

//echo "$querySide";

//    echo "$sideData";
                foreach ($querySide as $row) {
                    print 'hello';




//        print '<li><a href="index.php?category=' . $row['cat_name'] .'"  name="' . $row['cat_name'] .'"  >Art</a></li>';
//        print '<li><a href="index.php?category=' . $row['pro_id'] . '">Design</a></li>';
//        print '<li><a href="index.php?category=' . $row['pro_id'] . '">Photography</a></li>';
//        print '<li><a href="index.php?category=' . $row['pro_id'] . '">Architecture</a></li>';
//        print '<li><a href="index.php?category=' . $row['pro_id'] . '">Fashion</a></li>';
//        print '<li><a href="index.php?category=' . $row['pro_id'] . '">Lifestyle</a></li>';
//        print '<li><a href="index.php" class="all-items">Show All</a></li>';





                }








            }

            ?>
        </ul>
    </aside>




>>>>>>> b6347d5ca7a1772b245854ba036a7972166a07c4
    <?php

    PrintMain();

<<<<<<< HEAD
=======
    //    $htmlSide = mergeDataTemplate($sideData,$sideTemp);
    //    var_dump($htmlSide);



>>>>>>> b6347d5ca7a1772b245854ba036a7972166a07c4
    $rows = GetData("select * from Product");

    $template = file_get_contents("templates/bookBlock.html");


    $html = MergeViewWithData($template, $rows);


<<<<<<< HEAD
    if (isset($_POST["search"])) {
            Search();
        }else{
    print $html;}
=======

//            $count = $count + 1;




        }
    }

    //loop over de afbeeldingen

/*
    // Fetch images
    $image = $_GET['pro_image'];

    $fetch_images = GetData("SELECT * FROM Publisher WHERE pro_image LIKE '%$image%' ORDER BY sort ASC");

    while ($row = fetch_assoc($fetch_images)) {
        $id = $row['id'];
        $name = $row['name'];
        $location = $row['location'];

        echo '<li class="sort-by">' . $id . '" >
          <img src="' . $location . '" title="' . $name . '" >
        </li>';
    }
*/

    print '</div>';
>>>>>>> b6347d5ca7a1772b245854ba036a7972166a07c4

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