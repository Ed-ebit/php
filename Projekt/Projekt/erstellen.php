<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Erstellen von Beiträgen',
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
            $menuE=> 'login.php',
            $user=>''
            )
        ),
    true   
);
get_header( ...$args );

if (isset ($_SESSION['autor_id'])){

    if(!empty($_POST)){

        if( !empty(trim( $_POST['posts_titel'])) && !empty(trim( $_POST['posts_inhalt'])) ) {
            $posts_titel = $_POST['posts_titel'];
            $posts_kateg = $_POST['posts_kateg_id_ref'];
            $posts_inhalt = $_POST['posts_inhalt'] ;
            $posts_bild = $_POST['posts_bild'] ;
            $posts_autor = $_SESSION['autor_id'] ;


            $sql = "INSERT INTO `tbl_posts`
                (
                        `posts_titel`,
                        `posts_kateg_id_ref`,
                        `posts_inhalt`,
                        `posts_bild`,
                        `posts_autor_id_ref`
                    )
                    VALUES
                    (
                        '$posts_titel',
                        '$posts_kateg',
                        '$posts_inhalt',
                        '$posts_bild',
                        '$posts_autor'
                    )";

            $result = mysqli_query( $db, $sql);

            echo '<p class="alert alert-success text-center"><i class="bi bi-check-square"></i> Beitrag erfolgreich erstellt!</p>';

            echo '<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>';
            
        } else {

            echo '<p class="text-center alert-danger"> Nicht erfolgreich. <br> Bitte mindestens Titel und Text befüllen, um einen Eintrag zu erstellen';
            $_POST = array();
        } 
    }

    if ( empty ($_POST)){
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="row justify-content-center">
        <div class="col-3"><label>Titel: </label><input class="form-control" type="text" name="posts_titel">
        </div>
        <div class="col-3">
            <label>Kategorien:</label>
            <select class="form-select" name="posts_kateg_id_ref">
            <?php
            
            $sql = "SELECT
                        kateg_name,
                        kateg_id
                    FROM
                        tbl_kategorien";
            $result = mysqli_query( $db, $sql) OR die(mysqli_error());
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value=$row[kateg_id]>" . $row['kateg_name'] . "</option>";
            }
            
            ?>
            </select>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6"><label>Inhalt: </label> <textarea class="form-control" name="posts_inhalt" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6"><label>Bild (URL): </label><input class="form-control" type="text" name="posts_bild">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
            <button class="btn docfarbe m-2" type="submit" value="Erstellen" name="erstellen">Erstellen</button>
        </div>
        <div class="col-2">
            <button class="btn docfarbe m-2" type="reset" value="Löschen">Löschen</button>
        </div>
    </div>

</form>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>


<?php 
    } 
} else {
    echo '<p>Bitte als Autor einloggen!</p>';
}
get_footer( false, true ); 
?>