<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
//PrintCart();
PrintSideMainUI();
PrintLittleSearchButton();
//PrintHeader();

?>

<div class="wrapper">

<?php

PrintHeader();

$data = GetData( "select * from Customer order by cus_id desc limit 1");

//get template
$output = file_get_contents("templates/user_information.html");
//add extra elements
//$extra_elements['csrf_token'] = GenerateCSRF( "user_information.php"  );

//merge
$output = MergeViewWithData( $output, $data );
//$output = MergeViewWithExtraElements( $output, $extra_elements );
//$output = MergeViewWithErrors( $output, $errors );
$output = RemoveEmptyErrorTags( $output, $data);

print $output;

foreach ($msgs as $msg) {
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
