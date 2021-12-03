<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Bearbeiten von Beiträgen',
    array(
        'css/styles.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'
    ),
    true,
    NULL,
        array(
        '<img src="https://icon-library.com/images/icon-for-blog/icon-for-blog-28.jpg" alt="miniblog" height="80px" width="80px">Home</img>',
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

        echo '<p class="alert alert-success text-center"> <i class="bi bi-check-square"></i> Änderungen wurden erfolgreich übernommen!</p>';
    }
     
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row justify-content-center">
        <div class="col-3">
            <label>Titel: </label><input class="form-control" type="text" name="posts_titel" value="<?php echo $_SESSION['posts_titel'] ?>">
        </div>
        <div class="col-3">
            <label> Kategorie: </label>
            <select class="form-select" name="kateg_id">
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
            </select>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <label> Inhalt: </label><textarea class="form-control" name="posts_inhalt" cols="30" rows="10"><?php echo $_SESSION['posts_inhalt'] ?></textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <label> Bild (URL): </label><input class="form-control" type="text" name="posts_bild" value="<?php echo $_SESSION['posts_bild'] ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2">
            <button class="btn docfarbe m-2" type="submit" value="Änderung übernehmen" name="aenderung uebernehmen">Änderung übernehmen</button>
        </div>
        <div class="col-2">
            <button class="btn docfarbe m-2" type="reset" value="Änderungen zurücksetzen">Änderungen zurücksetzen</button>
        </div>
    </div>


    
</form>

<?php } else {
    echo '<br><h3>Ändern nicht möglich!!!</h3><br>';
    echo '<p class="text-center"><b>Bitte loggen Sie sich als Autor ein.</b></p>';
} ?>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>
    
<?php get_footer( false, true ); ?>