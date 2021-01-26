<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";



PrintHead();
PrintCart();
PrintSideMainUI();
PrintLittleSearchButton();
PrintHeader();



?>
<div class="wrapper">

    <?php
    PrintHeader();
//    PrintUserInfoMain();


    //toon messages als er zijn



    if (count($old_post) > 0) {
        $data = [0 => [

            "cus_firstname" => $old_post['cus_firstname'],
            "cus_lastname" => $old_post['cus_lastname'],
            "cus_email" => $old_post['cus_email'],
            "cus_password" => $old_post['cus_password']
        ]
        ];
    }
    else $data = [0 => ["cus_firstname" => "", "cus_lastname" => "", "cus_email" => "", "cus_password" => ""]];
    //, "cus_confirm_password" => ""]
    //get template
    $output = file_get_contents("templates/user_information.html");



    //add extra elements
    $extra_elements['csrf_token'] = GenerateCSRF("user_account.php");

    //merge
    $output = MergeViewWithData($output, $data);
    $output = MergeViewWithExtraElements($output, $extra_elements);
    $output = MergeViewWithErrors($output, $errors);
    $output = RemoveEmptyErrorTags($output, $data);

    print $output;

    foreach ( $msgs as $msg )
    {
        print '<div class="msgs">' . $msg . '</div>';
    }
    ?>


</div>
<a class="detail-return" href="index.php"><--- Go Back</a>
<?php

PrintJavaScript();

?>
  </body>
</html>
