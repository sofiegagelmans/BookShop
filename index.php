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
<main class="main main-index">
    <?php
    PrintMain();
    ?>
</main>




<?php
PrintFooter();
PrintJavaScript();
?>
  </body>
</html>
