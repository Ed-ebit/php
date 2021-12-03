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
        'Home',
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

            echo '<p class="alert alert-success"><i class="bi bi-check-square"></i> Beitrag erfolgreich erstellt!</p>';

            echo '<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>';
            
        } else {

            echo '<p> Nicht erfolgreich. <br> Bitte mindestens Titel und Text befüllen, um einen Eintrag zu erstellen';
            $_POST = array();
        } 
    }

    if ( empty ($_POST)){
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <p>Titel: <input type="text" name="posts_titel"></p>
    <p>Kategorien: 
    <select name="posts_kateg_id_ref"> 
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
    </select></p>
    <p>Inhalt: <textarea name="posts_inhalt" cols="30" rows="10"></textarea></p>
    <p>Bild-URL: <input type="text" name="posts_bild"></p>

    <tr>
        <td>
            <input type="submit" value="Erstellen" name="erstellen">
            <input type="reset" value="Löschen">
        </td>
    </tr>

</form>

<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>


<?php 
    } 
} else {
    echo '<p>Bitte als Autor einloggen!</p>';
}
get_footer( false, true ); 
?>