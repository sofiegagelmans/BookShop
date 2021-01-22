<?php


function ReplaceSpecialChar( $txt )
{
$txt = str_replace("&rsquo;", "`", $txt);
//$txt = str_replace("&eacute;", "E", $txt);
//$txt = str_replace("&egrave;", "E", $txt);

return $txt;
}