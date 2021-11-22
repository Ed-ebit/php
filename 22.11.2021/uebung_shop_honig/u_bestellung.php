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
//echo '<pre>', var_dump( $_POST ), '</pre>';
if (isset($_POST['abschicken'])){
    
    foreach($_POST as $art => $menge){

        
        if($menge == 'abschicken'){
            continue;
        }
        $word=ucfirst($art);
        $word.='honig';
        if($menge== null){
            $menge =0;
            $_POST[$art] = 0;
        }
        echo "<p>$word: $menge mal à 500g</p>";
        //speichern in der Session
        $_SESSION[$word] = $_POST[$art];
        
    }
    
    echo '<p>';
    //echo '<pre>', var_dump( $_SESSION ), '</pre>';
    echo 'Die Session-ID lautet: '.session_id();
    echo '</p>';
    ?>
    <a href="u_abschluss.php" class="<?php echo $delete; ?>"><input type="submit" value="weiter" name="weiter" class="btn btn-success"></a>
    <a href="u_formular.php"><input type="submit" value="zurück" class="btn btn-warning"></a>
    </p>
<?php  
}else{
    echo '<p>';
    echo 'Bitte eine Bestellung über das Bestellformular vornehmen!';
    echo '</p>';
    ?>
    <a href="u_formular.php"><input type="submit" value="zum Formular" class="btn btn-warning"></a>
    <?php 
}
?>
<?php get_footer(); ?>