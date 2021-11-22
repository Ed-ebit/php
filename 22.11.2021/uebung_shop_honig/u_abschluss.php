<?php
session_start();
require_once( '../../includes/functions.inc.php' );
$database = 'honigladen';
require_once( '../../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Honigbestellung',
    null,
    true      
);
get_header( ...$args );
// echo session_id();
if(isset($_POST['finale'])){
    $_SESSION['Vorname']=$_POST['vname'];
    $_SESSION['Nachname']=$_POST['nname'];
    $_SESSION['Wohnort']=$_POST['ort'];
    $_SESSION['E-Mail']=$_POST['email'];
    //echo '<pre>', var_dump( $_SESSION ), '</pre>';
        if (!empty(trim($_POST['vname'])) and !empty(trim($_POST['vname'])) and !empty(trim($_POST['vname'])) and !empty(trim($_POST['vname']))){
            //echo '<pre>', var_dump( $_SESSION ), '</pre>';

            echo '<h4>Ihre Bestellung in der Übersicht:</h4>';
            foreach($_SESSION as $item => $detail){
            echo '<p>';
            echo "$item: $detail";
            echo '</p>';
            }

            $sql = 'INSERT INTO `h_bestellung`
                (
                    `vname`,
                    `name`,
                    `ort`,
                    `email`,
                    `akazie`,
                    `heide`,
                    `klee`,
                    `tanne`
                )
                VALUES
                (
                "'.$_SESSION['Vorname'].'",
                "'.$_SESSION['Nachname'].'",
                "'.$_SESSION['Wohnort'].'",
                "'.$_SESSION['E-Mail'].'",
                "'.$_SESSION['Akazienhonig'].'",
                "'.$_SESSION['Heidehonig'].'",
                "'.$_SESSION['Kleehonig'].'",
                "'.$_SESSION['Tannenhonig'].'"
                )';
            
            mysqli_query($db,$sql);
            //echo get_db_error($db, $sql);
            mysqli_close($db);

            $_SESSION = array();//Session leeren
            session_destroy();//session auflösen

            echo '<a href="u_formular.php"><input type="submit" value="neue Bestellung" class="btn btn-warning"></a>';
        }else{
            echo '<p class="text-danger">';
            echo '<b> Bitte alle Pflichtfelder ausfüllen! </b>';
            echo '</p>';
            echo '<a href="u_abschluss.php"><input type="submit" value="zurück" class="btn btn-warning"></a>';
        }
} else{
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
<p>Nun Bitte noch Ihre Kontaktdaten:</p>

<p>Vorname:* <input type="text" name="vname" ></p>
<p>Nachname:* <input type="text" name="nname" ></p>
<p>Wohnort:* <input type="text" name="ort" ></p>
<p>e_Mail:* <input type="email" name="email"></p>

<input type="submit" name="finale" value="Bestellen" class="btn btn-success">
</form>
<p>*Pflichtangaben</p>
<?php } //ende if isset($_POST)?>
<?php get_footer(); ?>


