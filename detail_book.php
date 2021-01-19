<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintCart();
PrintSideMenu();
PrintLittleSearchButton();
?>
<div class="wrapper">
<?php
PrintHeader();
PrintDetailMain();
?>


</div>

<a class="detail-return" href="index.php"><--- Go Back</a>
<?php
PrintJavaScript();
?>


  </body>
</html>
