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
    
    <?php
    
    PrintMain();

    $rows = GetData("select * from Product");

    $template = file_get_contents("templates/bookBlock.html");


    $html = MergeViewWithData($template, $rows);


    if (isset($_POST["search"])) {
            Search();
        }else{
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