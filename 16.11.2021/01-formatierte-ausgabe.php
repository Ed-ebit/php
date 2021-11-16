<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Formatierte Ausgaben mit printf()'
);
get_header( ...$args );


printf( '<p>Eine normale Ausgabe</p>');
printf('<p>Ausgabe Typ b: <b>%b</b></p>',125);//%b= binärerPlatzhalter für folgendes Argument(Parameter) - wird in binärer Schreibweise ausgegeben
printf('<p>Ausgabe Typ c: <b>%c</b></p>',65);//gibt folg. Argument als ASCII Code aus
printf('<p>Ausgabe Typ d: <b>%05d</b></p>',3);//stellt Ganzzahl Nullen voran(0-vorangest. Zeichen,3- Gesamtstellen der Endzahl)
printf('<p>Ausgabe Typ e: <b>%f</b></p>',125.35);//Parameter als Fließkommazahl
printf('<p>Ausgabe Typ f: <b>%s</b></p>',125);//Argument wird als String angesehen
printf('<p>Ausgabe Typ g: <b>%x</b></p>',125);//ganzzahl als HEXadez.
?>

<h2>Führende Nullen ausgeben</h2>

<?php 
$hrs = 4;
$min = 3;
printf( "<p>Ausgabe der Uhrzeit:<b>%02d:%02d Uhr</b></p>",$hrs,$min);
?>

<h2>Zeichenketten auffüllen</h2>

<?php printf("<p>ein aufgefüllter String: <b>%'#7s</b></p>", 'T')
// um # reinzukriegen (nicht numerisches Zeichen) muss ' davor, um klar zumachen dass dies Teil einer Zeichenkette ist die eingefügt werden soll.  
?>

<h2>Formatierte Zahlenwerte</h2>

<p>
<?php  
    $preise = array(22124.667, 12.8, 234, 53.3333337, .5);
    
    foreach($preise as $preis) {
        printf('Unser Preis: %3.2f €<br>', $preis);//0: womit fehlende stellen aufgefüllt werden.3: minimum stellen deer gazen sache.2:nachkommastellen (gerundet, nicht abgeschnitten)
    }
?>
</p>

<h2>Formatierte Zahlenwerte mit number_format</h2>

<?php 
echo '<p>';
foreach($preise as $preis) {
    echo number_format($preis, 2, ',','.'). ' €<br>';
}
echo '</p>';
?>

<?php get_footer(); ?>