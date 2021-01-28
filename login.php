<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );


$public_access =  true;
require_once "lib/autoload.php";
PrintHead();
PrintSideMenu();
PrintLittleSearchButton();
PrintHeader();

?>

    <!-- HEADER -->
    <div class="wrapper">


  <?php
    PrintHeader();

            if ( isset($_GET['logout']) AND $_GET['logout'] == "true" )
            {
                print '<div class="msgs">U bent uitgelogd.</div>';
            }

            //get data
            $data = [ 0 => [ "cus_email" => "", "cus_password" => "" ]];


            //get template
            $output = file_get_contents("templates/login.html");

            //add extra elements
//            $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
//            $output = MergeViewWithExtraElements( $output, $extra_elements );

            print $output;


  ?>


        ?>


    </div>
    <a class="detail-return" href="index.php"><--- Go Back</a>
<?php

PrintJavaScript();
?>

</body>
</html>
