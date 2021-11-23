<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Zeichenkettenfunktionen',
    null,
    true
);
get_header( ...$args );

$e_mail = 'Brigitte.B@abc.com';
echo "<p>Original-Zeichenkette: <b>$e_mail</b></p>";
/* Zeichenkette finden*/

echo '<p>';
echo'Suche nach B@ ergibt: <b>' . strstr($e_mail, 'B@', true).'</b><br>';

echo'Suche nach B@ ergibt: <b>' . strstr($e_mail, 'B@').'</b><br>';

echo'Suche nach b@ ergibt: <b>' . stristr($e_mail, 'b@', true).'</b><br>';//strstr case sensitiv - stristr NICHT case sensitiv
echo '</p>';

/*Einzelne Zeichen finden*/

echo '<p>';
echo 'Suche nach i ergibt: <b>' . strchr($e_mail, 'i').'</b>.</br>';
//inklusive ab gefundenem Zeichen restliche Zeichenkette
echo '</p>';

echo '<p>';
echo 'Suche nach i ergibt: <b>' . strrchr($e_mail, 'i').'</b>.</br>';
//strrchr rückwärts: ab letztem i rest der Zeichenkette
echo '</p>';


/*PHP 8.0: Neue zeichenkettenfunktionen */
echo '<p>';
echo 'Suche nach g ergibt: <b>' . str_contains($e_mail, 'g').'</b>.</br>';//wieviele Gs? Casesensitive, nur true oder false
echo '</p>';

echo '<p>';
echo 'Suche nach Bri ergibt: <b>' . str_starts_with($e_mail, 'Bri').'</b>.</br>';//nur true oder false
echo '</p>';

echo '<p>';
echo 'Suche nach .com ergibt: <b>' . str_ends_with($e_mail, '.com').'</b>.</br>';//nur true oder false
echo '</p>';

/*Einzelne Zeichen finden, Position ausgeben */

echo '<p>';
echo 'Suche nach i ergibt: <b>' . strpos($e_mail, 'i').'</b>.</br>';
echo '</p>';

echo '<p>';
echo 'Suche nach i ergibt: <b>' . strrpos($e_mail, 'i').'</b>.</br>';
echo '</p>';// reversed, also das letzte 'i'

echo '<p>';
echo 'Suche nach i ergibt: <b>' . stripos($e_mail, 'b').'</b>.</br>';
echo '</p>';// caseUNsensitive
echo '<p>';
echo 'Suche nach i ergibt: <b>' . strpos($e_mail, 'b').'</b>.</br>';
echo '</p>';// caseSensitive

/*Beginn der Suche angeben, einzelne Zeichen finden, Position ausgeben */

echo '<p>';
echo 'Suche nach i ergibt: <b>' . strpos($e_mail, 'i',3).'</b>.</br>';
echo '</p>';

/*Teilstrings extrahieren */
$e_mail='meister.nadeloehr@wie-ist-meine-ip.de';
echo "<p>Die Original-Zeichenkette: <b>$e_mail</b>.</p>";

echo '<p>';
echo 'Domainnamen extrahieren: <b>'.substr($e_mail,18).'</b>.</p>';
echo '</p>';
echo '<p>';
echo 'Domainnamen extrahieren: <b>'.substr($e_mail,-19).'</b>.</p>';
echo '</p>';

// elegantere Methode
$adressen= array(
    'Brigitte.B@web.de',
    'meister.nadeloehr@wie-ist-meine-ip.de',
    'ben.a@gmx.de'
);

echo '<p>';
foreach($adressen as $adresse) {
    $pos=strpos($adresse,'@');
    echo 'Domainname: <br>'.substr($adresse, $pos + 1).'</br>.<br>';

}
echo '</p>';

/*Anzahl der Bytes in einer Zeichenkette */
$str1='Hauser';
$str2 = 'Häuser';
echo '<p>Die Zeichenkette '.$str1.' besteht aus <b>'.strlen($str1).'</b> Bytes.<br>';
echo 'Die Zeichenkette '.$str2.' besteht aus <b>'.strlen($str2).'</b> Bytes.<br></p>';
//Umlaut macht 2 Bytes

/*Anzahl der gefundenen Suchbegriffe */
echo '<p>Das / die Zeichen ei kommt in <b>'.$e_mail.'</b> genau <b>'.substr_count($e_mail,'i'). '-mal</b> vor.</p>';

/*Zeichenketten modifizieren */

//Zeichenketten wiederholen
echo '<p>'.str_repeat('-*',8).'</p>';

//Zeichenketten austauschen
$str='Buch buchen';
echo '<p>'.$str.'</p>';
echo '<p>'.strtr($str,'uh','ak').'</p>';
//Achtung, dies bedeutet: tausche alle u gegen a und alle h gegen k im Text.
// -> KEINE Zeichenketten involviert!

//2te Variante:
$tausch = array('u' =>'au', 'ch' => 'sch');
echo '<p>'.strtr($str,$tausch).'</p>';

//Zeichenfolgen ersetzen
$str= 'Meine Tante lebt in Frankreich. Meine Tante ist noch nicht so alt.';
echo '<p>'.$str.'</p>';
$str = str_replace('Tante','<i>Nichte</i>',$str);
$str = str_replace('Frankreich','<b>Italien</b>',$str);
echo '<p>'.$str.'</p>';

?>
    
<?php get_footer(); ?>