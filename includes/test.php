<?php 
require_once 'functions.inc.php';
// get_header (
//     'Testing212',
//     null,
//     true, 
//     'SUPERSEITE',
//     array('Branding', 
//         array('Startseite' =>'index.php',
//             'Über Uns' =>'ueber-uns.php',
//             'Test'=>'test.php',
//             'Kontakt'=>'kontakt.php'
//             )
//         )
// ); ODER:

$args =array(    
        'Testing212',
         null,
         true, 
         'SUPERSEITE',
         array(
             'Branding', 
              array(
                 'Startseite' =>'index.php',
                 'Über Uns' =>'ueber-uns.php',
                 'Test'=>'test.php',
                 'Kontakt'=>'kontakt.php'
                 )
        ));

get_header(...$args);

get_footer(true);
?>