<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";



PrintHead();
PrintCart();
PrintSideMenu();
PrintLittleSearchButton();
PrintHeader();

?>


    <!-- HEADER -->
    <div class="wrapper">


  <?php
    PrintHeader();

    $data = [0 => ["cus_email" => "", "cus_password" => ""]];
  //, "cus_confirm_password" => ""]
  //get template
  $output = file_get_contents("templates/login.html");

  //add extra elements
  $extra_elements['csrf_token'] = GenerateCSRF("login.php");

  //merge
  $output = MergeViewWithData($output, $data);
  $output = MergeViewWithExtraElements($output, $extra_elements);


  print $output;
   ?>


    </div>
    <a class="detail-return" href="index.php"><--- Go Back</a>
<?php

PrintJavaScript();
?>

</body>
</html>
