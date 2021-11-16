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

printf($string1.'---'.$string2.'---'."%'*42s",$string3.$string3.'---'.$string4);

$string=$string1.$string2.$string3.$string4;
echo var_dump($string).'<br>';
$stringex = explode(" ",$string);
echo var_dump($stringex).'<br>';
$stringim = implode('#', $stringex);
echo var_dump($stringim).'<br>';

$string5 = str_replace ('das Angebot','<br>unser Sonderangebot</b>',$string1);
$string6 = str_replace ('Bananen','<i>Alle Obstsorten</i>',$string4);

printf($string5.'---'.$string2.'---'."%'*57s",$string3.$string3.'---'.$string6);

?>
    
<?php get_footer(); ?>