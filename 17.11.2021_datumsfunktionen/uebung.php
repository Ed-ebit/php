<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Zeitüben',
    null,
    true
);
get_header( ...$args );
?>

<?php 
echo '<p>';
echo date('d.m.y');
echo '</p>';

echo '<p>';
echo date('d-m-Y');
echo '</p>';

echo '<p>';
echo date('d.m.Y - H:i:s');
echo '</p>';

echo '<p>';
echo date('d/m/y - H:i A');
echo '</p>';

echo '<p>';
echo date('Y-m-d');
echo '</p>';

echo '<p>';
echo date('H:i \U\h\r');
echo '</p>';

echo '<p>';
echo 'aktueller Wochentag: ';
setlocale(LC_ALL, 'DE');
echo strftime(' %A ', time());
echo '</p>';


?>
    
<?php get_footer(); ?>