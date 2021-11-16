<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung',
    null,
    false,
    'Superübung Zeichenfunktionen'
);
get_header( ...$args );
?>
<?php  
$zahl = 78.123456789;
printf("Fliesskomma: %09.5f <br>", $zahl);

$string1="Beachten Sie das Angebot für die ";
$string2="folgende Kalenderwoche: ";
$string3="";
$string4="Bananen, 5 Kilo für nur 5,- Euro!";

printf($string1."%'-3s",$string2."%'-3s",$string3."%'*5s",$string3);

?>
    
<?php get_footer(); ?>