<?php
session_start();//!!!!!!!!!!!
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Master of Desaster',
    null,
    true,
    'MoD - Ihr Süßer Laden',
    array(
        '<img src="img/master-of-disaster-sticker.jpg" alt="Master of Desaster" width=90 height=80 >',
        array(
            'Start'=>'index.php',
            'Pralinen'=>'pralinen.php',
            'Schokolade'=>'schokolade.php',
            'Warenkorb'=>'warenkorb.php',
        )
    )
);

get_header( ...$args );
?>
    <p class="lead">Herzlich Willkommen im süßen Fabrik-Shop</p>
    <p>Wählen Sie aus unserem Angebot:</p>

    <ul>
        <a href="schokolade.php"><button class="btn btn-primary">Schokolade</button></a>
        <a href="pralinen.php"><button class="btn btn-primary">Pralinen</button></a>
    </ul>
<?php get_footer(); ?>