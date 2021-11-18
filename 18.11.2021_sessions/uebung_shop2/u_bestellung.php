<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Honigbestellung',
    null,
    true    
);
get_header( ...$args );
?>
    
<p>Sie sind im Begriff folgendes zu bestellen:</p>

<p>
<?php 

// echo '<pre>', var_dump( $_POST ), '</pre>';
foreach($_POST as $art => $menge){

    if(!empty($menge)){
        if($menge == 'abschicken'){
            continue;
        }
        $word=ucfirst($art);
        $word.='honig';
        echo "<p>$word: $menge mal à 500g</p>";
        
    }
}
?>

</p>

<?php get_footer(); ?>