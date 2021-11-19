<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'DB Infos',
    null,
    true
);
get_header( ...$args );
?>
    <h2>DB Infos</h2>
<?php get_footer(); ?>