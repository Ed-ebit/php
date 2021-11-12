<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mehrdimensionale Arrays</title>
</head>
<body>
    <h1>mehrdimensionale Arrays</h1>

    <?php 
    
    $personen = array(
        array(
            'Manfred',
            'deutsch',
            53,
            'männlich'
        ),
        array(
            'Cindy',
            'englisch',
            48,
            'weiblich'
        ),
        array(
            'Carlos',
            'spanisch',
            36,
            'männlich'
        )
    );

    //Zugriff
    echo '<p>'.$personen[2][0].' ist '.$personen[2][2].' Jahre alt, spricht '.$personen[2][1].' und ist '.$personen[2][3].'</p>';

    //Ändern
    $personen[2][2] = 35;

    echo '<pre>', var_dump($personen),'</pre>';

    //Hinzufügen
    $personen[] = array(
        'Ursula',
        'dänisch',
        22,
        'weiblich'
    );

    $personen[4][0] = 'Johanna';
    $personen[4][1] = 'schwedisch';
    $personen[4][2] = 47;
    $personen[4][3] = 'weiblich';
    
    echo '<pre>', var_dump($personen),'</pre>';

    ?>

    <!--Zugriff in produktion -->

    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Sprache</th>
            <th>Alter</th>
            <th>Geschlecht</th>
        </tr>
        <!--Schleife für das äußere Array (zeilen)-->
        <?php foreach($personen as $person): ?>
        <tr><!--trotzdem der html-code hier nicht innerhalb des php codes liegt, so liegt er doch innerhalb der Schleife des php codes. Innerhalb der Schleife kann auch html-code ausgeführt werden, der damit Teil der programmierten Schleife ist, obwohl er nicht zum php gehört-->
            <!--Schleife für das innere Array(Spalten)-->
            <?php foreach($person as $info): ?>
                <td><?php echo $info ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; // Alternative zur geschweiften Klammer
        ?>
    </table>
    
    <h2>Ausgabe der Personen mit der list() Funktion</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Geschlecht</th>
            <th>Sprache</th>
            <th>Alter</th>
        </tr>
        <!-- Schleife für das äußere Array (Zeilen) -->
        <?php foreach($personen as $person): ?>
        <tr><!--trotzdem der html-code hier nicht innerhalb des php codes liegt, so liegt er doch innerhalb der Schleife des php codes. Innerhalb der Schleife kann auch html-code ausgeführt werden, der damit Teil der programmierten Schleife ist, obwohl er nicht zum php gehört-->
            <!-- list()-Funktion für das Innere Array (Spalten)-->
            <?php list($pname, $sprache,$alter,$geschlecht) = $person; ?>
            <td><?php echo $pname; ?></td>
            <td><?php echo $sprache; ?></td>
            <td><?php echo $alter; ?></td>
            <td><?php echo $geschlecht; ?></td>

        </tr>
        <?php endforeach; ?>
    </table>

    <h2>mehrdimensionale assoziative Arrays</h2>

    <?php 
    $laender = array(
        'Spanien' => array(
            'Hauptstadt' => 'Madrid',
            'Sprache' =>'spanisch',
            'Waehrung'=>'Euro',
            'Flaeche'=>'504.645 qkm'
        ),
        'England' => array(
            'Hauptstadt' => 'London',
            'Sprache' =>'englisch',
            'Waehrung'=>'Pfund Sterling',
            'Flaeche'=>'130.395 qkm'),
        'Portugal' => array(
            'Hauptstadt' => 'Lissabon',
            'Sprache' =>'portugiesisch',
            'Waehrung'=>'Euro',
            'Flaeche'=>'92.345 qkm'),
    );

    //Zugriff

    $land = 'Spanien';// bei gewünschten Angeben zu anderen Ländern muss nur diese eine Variable geändert werden
    echo '<p>Angaben zu '.$land.'<br>';
    echo 'Hauptstadt: '.$laender[$land]['Hauptstadt'].'<br>';
    echo 'Hauptstadt: '.$laender[$land]['Sprache'].'<br>';
    echo 'Hauptstadt: '.$laender[$land]['Waehrung'].'<br>';
    echo 'Hauptstadt: '.$laender[$land]['Flaeche'].'<br>';
    ?>

<table border='1'>
    <tr>
        <th>Land</th>
        <th>Hauptstadt</th>
        <th>Sprache</th>
        <th>Währung</th>
        <th>Flaeche</th>
    </tr>
    <?php foreach($laender as $land => $infos): ?>
        <!-- Name des Landes=Schlüssel in diesem Fall. machts etwas einfachar, siehe 1. <td>-->

        <tr>
            <td><?php echo $land; ?></td>
            <?php foreach($infos as $info): ?>
                <td><?php echo $info; ?></td>
            <?php endforeach; ?>

        </tr>

    <?php endforeach; ?>
</table>
</body>
</html>