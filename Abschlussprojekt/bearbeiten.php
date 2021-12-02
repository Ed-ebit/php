<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Bearbeiten von Beiträgen',
    'css/styles.css',
    true,
    NULL,
        array(
        'Home',
            array(
            $menuER=>'erstellen.php',
            $menuL=>'logout.php',
            $menuR=> 'regi.php',
            $menuE=> 'login.php'
            )
        ),
    true
);
get_header( ...$args );

if ( isset( $_SESSION['autor_id'] )){
    if( !empty( $_POST ) ) {
        $_SESSION['posts_titel'] = $_POST['posts_titel'];
        $_SESSION['kateg_id'] = $_POST['kateg_id'];
        $_SESSION['posts_inhalt'] = $_POST['posts_inhalt'];
        $_SESSION['posts_bild'] = $_POST['posts_bild'];
    
        $update = "UPDATE `tbl_posts`
                    SET
                        `posts_titel` = '$_SESSION[posts_titel]',
                        `posts_kateg_id_ref` = $_SESSION[kateg_id],
                        `posts_inhalt` = '$_SESSION[posts_inhalt]',
                        `posts_bild` = '$_SESSION[posts_bild]'
                    WHERE
                        `posts_id` = $_SESSION[posts_id]";
    
        $erg = mysqli_query( $db,$update  ) OR die(mysqli_error());

        echo '<p class="alert alert-success"> Änderungen wurden erfolgreich übernommen!';
    }
     
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <p>Titel: <input type="text" name="posts_titel" value="<?php echo $_SESSION['posts_titel'] ?>"></p>
    <p>Kategorien: 
    <select name="kateg_id"> 
    <?php 
        
    $sql = "SELECT 
                kateg_name,
                kateg_id
            FROM 
                tbl_kategorien"; 
    $result = mysqli_query( $db, $sql) OR die(mysqli_error()); 
    while($row = mysqli_fetch_assoc($result)) { 
        if ($row['kateg_id']==$_SESSION['kateg_id']){
            echo "<option value=$row[kateg_id] selected>" . $row['kateg_name'] . "</option>"; 
        }else{
        echo "<option value=$row[kateg_id] >" . $row['kateg_name'] . "</option>"; 
        }
    } 
    
    ?> 
    </select></p>
    <p>Inhalt: <textarea name="posts_inhalt" cols="30" rows="10"><?php echo $_SESSION['posts_inhalt'] ?></textarea></p>
    <p>Bild-URL: <input type="text" name="posts_bild" value="<?php echo $_SESSION['posts_bild'] ?>"></p>

    <tr>
        <td>
            <input type="submit" value="Änderung übernehmen" name="aenderung uebernehmen">
            <input type="reset" value="Änderungen zurücksetzen">
        </td>
    </tr>

</form>

<?php } else {
    echo '<br><h3>Ändern nicht möglich!!!</h3><br>';
    echo '<p><b>Bitte loggen Sie sich als Autor ein.</b></p>';
} ?>

<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>
    
<?php get_footer( false, true ); ?>