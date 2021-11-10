<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung</title>
</head>
<body>
    <h1>Übung</h1>

    <h2>Eindimensional</h2>

    <?php 
    
    $kennzeichen = array (
        'HH'=>'Hamburg',
        'B' => 'Berlin',
        'S' => 'Stuttgart'
    );
    //hinzufügen
    $kennzeichen['F'] = 'Frankfurt';
    $kennzeichen['HB'] = 'Bremen';
    //löschen
    unset($kennzeichen ['HB']);
    
    //ändern
    $kennzeichen['F'] = 'Frankfurt am Main';
    //echo '<pre>', print_R($kennzeichen), '</pre>';

    ?>

    <table border='1'>
        <tr>
            <th>Kennzeichen</th>
            <th>Stadt</th>
        </tr>
        <?php foreach ($kennzeichen as $zeichen=>$stadt): ?>
            <tr>
                <td><?php echo $zeichen; ?></td>
                <td> <?php echo $stadt; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <h2>Mehrdimensional</h2>

    <?php  
    $veranstaltungen = array (
        'Diskuswurf'=>array(
            'Beginn'=>'9:30',
            'Ort'=>'Nebenplatz',
            'Bemerkung'=>'Jugendmeisterschaften'
        ),
        '5-km-Lauf'=>array(
            'Beginn'=>'10:00',
            'Ort'=>'Stadion-Laufbahn',
            'Bemerkung'=>'Offener Lauf'
        ),
        'Halbmarathon'=>array(
            'Beginn'=>'11:00',
            'Ort'=>'Waldgebiet',
            'Bemerkung'=>'Teilnahme ab 18 Jahren'
        ),
        'Stabhochsprung'=>array(
            'Beginn'=>'12:00',
            'Ort'=>'Stadion-Stabhochsprunganlage',
            'Bemerkung'=>'Nur Frauen'
        )
        );
    ?>

    <table border='1'>
        <tr>
            <th>Disziplin</th>
            <th>Beginn</th>
            <th>Ort</th>
            <th>Bemerkungen</th>
        </tr>
        <?php foreach($veranstaltungen as $veranstaltung=>$details): ?>
            <tr>
                <td><?php echo $veranstaltung; ?></td>
                <?php foreach($details as $detail): ?>
                    <td><?php echo $detail; ?> </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <!--zusatz: als indiziertes Array mit list( ausgeben)-->
    <?php 
    $veranstaltungen = array (
        array(
            'Disziplin'=>'Diskuswurf',
            'Beginn'=>'9:30',
            'Ort'=>'Nebenplatz',
            'Bemerkung'=>'Jugendmeisterschaften'
        ),
        array(
            'Disziplin'=>'5-km-Lauf',
            'Beginn'=>'10:00',
            'Ort'=>'Stadion-Laufbahn',
            'Bemerkung'=>'Offener Lauf'
        ),
        array(
            'Disziplin'=>'Halbmarathon',
            'Beginn'=>'11:00',
            'Ort'=>'Waldgebiet',
            'Bemerkung'=>'Teilnahme ab 18 Jahren'
        ),
       array(
            'Disziplin'=>  'Stabhochsprung',
            'Beginn'=>'12:00',
            'Ort'=>'Stadion-Stabhochsprunganlage',
            'Bemerkung'=>'Nur Frauen'
        )
        );
        ?>

        <table border='1'>
            <tr>
                <?php foreach($veranstaltungen as $veranstaltung =>$details): 
                    if ($veranstaltung == 0):?>
                    <th><?php echo $veranstaltung ?></th>
                    <?php else: foreach($details as $detail) ?>
                        <td><?php echo $detail?></td>
                    <?php endif; endforeach; ?>
            </tr>
        </table>
</body>
</html>
