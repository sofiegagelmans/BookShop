<?php 
function PrintHead()
{
    $head = file_get_contents("./templates/head.html");
    print $head;
}


