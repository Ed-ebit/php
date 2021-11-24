<?php
require_once( '../../includes/functions.inc.php' );
$database = 'hardware';
require_once( '../../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Anzeige Tabelle',
    null,
    true    
);
get_header( ...$args );

echo '<h2>Aufgabe 1</h2>';
$sql = "SELECT *
    FROM
        `fp`";

$result=mysqli_query($db,$sql);
$anzahl=mysqli_num_rows($result);
echo '<p>';
echo 'Es wurden '.$anzahl.' Datensätze gfunden.';
echo '</p>';

while ($erg =mysqli_fetch_assoc($result)){
    echo '<p>';
    foreach($erg as $inhalt){
    echo $inhalt.', ';
    }
    echo '</p>';
}

echo '<h2>Aufgabe 2</h2>';

$sql = "SELECT *
    FROM
        `fp`
    WHERE
        `gb`>60
    AND
        `preis`<150
    ORDER BY `gb` DESC";

$result=mysqli_query($db,$sql);
$anzahl=mysqli_num_rows($result);
echo '<p>';
echo 'Es wurden '.$anzahl.' Datensätze gfunden.';
echo '</p>';

while ($erg =mysqli_fetch_assoc($result)){
    echo '<p>';
    foreach($erg as $inhalt){
    echo $inhalt.', ';
    }
    echo '</p>';
}

echo '<h2>Aufgabe 3</h2>';

$sql = "SELECT 
        `hersteller`,
        `typ`,
        `artnummer`,
        `prod`
    FROM
        `fp`
    WHERE
        `prod` between '2008-01-01' and '2008-06-31'
    ORDER BY `prod` ASC";

$result=mysqli_query($db,$sql);
$anzahl=mysqli_num_rows($result);
echo '<p>';
echo 'Es wurden '.$anzahl.' Datensätze gfunden.';
echo '</p>';

while ($erg =mysqli_fetch_assoc($result)){
    echo '<p>';
    foreach($erg as $inhalt){
    echo $inhalt.', ';
    }
    echo '</p>';
}

?>

<?php get_footer(); ?>