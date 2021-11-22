<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Newsletter eintragen',
    null,
    true,
    'Newsletter eintragen'
);
get_header( ...$args );

if (!empty(trim($_POST['mail']))){



    $sql = 'INSERT INTO `newsletter`
        (
         `username`,
         `usermail`
         )
         VALUES
         (
         "'.$_POST['name'].'",
         "'.$_POST['mail'].'"
         )';
    
    if ($result=mysqli_query($db,$sql))  {
        echo '<p class="text-success">Die Adresse '.$_POST['mail'].' ist nun für den Newsletter eingetragen :)</p>';
    } else {
        echo '<p class="text-danger"> <b>Fehler. Bitte erneut versuchen.</b></p>';
        echo '<form action="uebung-newsletter.html">';
        $fehler = get_db_error($db, $sql);
        if( str_contains($fehler,'Duplicate entry')){
            echo '<p class="text-danger">';
            echo '<b> Die E-mail Adresse ist bereits für den Newsletter eingetragen!</b>';
            echo '</p>';
        }
        echo '<input type="submit" value="zum Formular">';
        echo '</form>';
        //echo get_db_error($db, $sql);
    }
} else {
    echo '<p class="text-danger">';
    echo '<b>Bitte im Formular eine E-Mailadresse angeben!</b>';
    ?>
        <form action="uebung-newsletter.html">
            <input type="submit" value="zum Formular">
        </form>
    <?php
    echo '</p>';
}
?>
    
<?php
mysqli_close($db);
get_footer(); ?>