<?php
require_once( '../includes/functions.inc.php' );
$database = 'firma1';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Mitarbeiterdatenbank',
    array(
        'css/firma1.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'
    ),
    true,
'<i class="bi bi-person-circle"></i></i> Mitarbeiterdatenbank'
);
get_header( ...$args );
// echo '<pre>', var_dump( $_POST ), '</pre>';
$actionresult = NULL;
// Aktionen ausführen
if(!empty($_POST)){
    // echo '<pre>', var_dump( $_POST ), '</pre>';
    $tausch = array('.' =>'',',' => '.');
    /*Eintragen*/
    if($_POST['action']=== 'insert'){

        $nachname=$_POST['na'][0];
        $vorname=$_POST['vo'][0];
        $gehalt=strtr($_POST['gh'][0], $tausch);
        $geburtstag=$_POST['gb'][0];

        $sql = "INSERT INTO tbl_personen
            (
            perso_nachname,
            perso_vorname,
            perso_gehalt,
            perso_geburtstag
            )
        VALUES
            (
                '$nachname',
                '$vorname',
                $gehalt,
                '$geburtstag'
            )";
    } else if($_POST['action'] === 'update') {
        // Ändern
        $id = $_POST['id'];
        $nachname = $_POST['na'][$id];
        $vorname = $_POST['vo'][$id];
        $gehalt = strtr($_POST['gh'][$id], $tausch);
        $geburtstag = $_POST['gb'][$id];

        $sql = "UPDATE tbl_personen
        SET
            perso_nachname ='$nachname',
            perso_vorname ='$vorname',
            perso_gehalt = $gehalt,
            perso_geburtstag ='$geburtstag'
        WHERE
            perso_id = $id";
    } else if( $_POST['action'] === 'delete') {
        //Datensatz löschen
        $sql = "DELETE FROM tbl_personen 
        WHERE perso_id= {$_POST['id']}";
    }

    $actionresult = mysqli_query($db,$sql);
}

$sql = 'SELECT * FROM tbl_personen';
$result = mysqli_query($db,$sql);
if($result or $actionresult):
    if($actionresult) {
    $msg = '<div class="alert alert-success"><i class="bi bi-check-square"></i> Der Mitarbeiter wurde erfolgreich ';
        $msg .= match($_POST ['action']) {
            'insert' => 'hinzugefügt!</div>',
            'update' => 'geändert!</div>',
            'delete' => 'gelöscht!</div>'
        };
    } else if($actionresult==null){
        $msg=null;
    } else {
        $msg= '<div class="alert alert-danger"><i i class="bi bi-exclamation-square"></i> Die Aktion konnte nicht durchgeführt werden. Wenden Sie sich bitte an den Administrator!</div>';
    }
?>
    <script>
        function send (action, id) {
            if(action ===0) {
                document.form.action.value = 'insert';
            } else if (action === 1) {
                document.form.action.value = 'update';
            } else if (action === 2) {
                if(confirm('Den Mitarbeiter mit der Personalnr.'+ id + ' wirklich löschen?')){
                    document.form.action.value = 'delete';            
                } else {
                     return;
                }
            }
            document.form.id.value = id;
            document.form.submit();
        }
    </script>

    <div><?php echo $msg; ?> </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
        <input type="hidden" name="action">
        <input type="hidden" name="id">

        <table class="table">
            <tr class="header green">
                <th>Angelegt</th>
                <th>Name</th>
                <th>Vorname</th>
                <th>Pers.-Nr.</th>
                <th>Gehalt</th>
                <th>Geb.-Datum</th>
                <th>Aktion</th>
            </tr>
            <tr class="info">
                <td style="font-weight: normal; font-size: 1.3em;">Neu:</td>
                <td><input type="text" name="na[0]" class="form-control"></td>
                <td><input type="text" name="vo[0]" class="form-control"></td>
                <td><input type="text" name="pn[0]" class="form-control"></td>
                <td><input type="text" name="gh[0]" class="form-control"></td>
                <td><input type="date" name="gb[0]" class="form-control"></td>
                <td class="text-center"><a href="javascript:send(0,0)" title="neu eintragen"><i class="bi bi-box-arrow-in-right"></i></td>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)):
                $id = $row['perso_id'];
                // //Das SQL-Datumsformat in ein Array umwandeln
                // $gb = explode('-', $row['perso_geburtstag']);
                // //Aus den Array-Elementen einen Timestamp erzeugen
                // $gbts = mktime(0,0,$gb[1],$gb[2],$gb[0]);
                // Datum und Uhrzeit des erstellt-Feldes: ersetzen des Leerzeichens durch einen HTML Zeilenumbruch
                $erstellt = str_replace(' ', '<br>',$row['perso_erstellt']);
            ?>

                <tr>
                    <td class="small-fonts number text-success"><?php echo $erstellt ?></td>

                    <td><input class="form-control" type="text" name="na[<?php echo $id; ?>]" value="<?php echo $row['perso_nachname'] ?>"></td>

                    <td><input class="form-control" type="text" name="vo[<?php echo $id; ?>]" value="<?php echo $row['perso_vorname'] ?>"></td>

                    <td><input class="form-control number" type="text" name="pn[<?php echo $id; ?>]" value="<?php echo $row['perso_id']; ?>"></td>

                    <td><input class="form-control number" type="text" name="gh[<?php echo $id; ?>]" value="<?php echo number_format($row['perso_gehalt'], 2,',', '.'); ?>"></td>

                    <td><input class="form-control number" type="date" name="gb[<?php echo $id; ?>]" value="<?php echo $row['perso_geburtstag']; ?>"></td>

                    <td>
                        <a href="javascript:send(1,<?php echo $id; ?>)" title="ändern"><i class="bi bi-box-arrow-in-right"></i></a>

                        <a href="javascript:send (2,<?php echo $id; ?>)" title="löschen"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </table>
        
    </form>
    
<?php 
    
else:
    echo get_db_error($db,$sql);
endif;
mysqli_close($db);
get_footer(); ?>