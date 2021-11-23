<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namenausgabe</title>
</head>
<body>
    <h1>Namenausgabe</h1>

    <?php 

    function ausgabe ($name, $strasse, $telnr){
    echo '<h2>'.$name.'</h2>';
    echo '<p>Adresse: '.$strasse.' <br>';
    echo    'Telnummer: '.$telnr.' </p>';
    }

    ausgabe('Karl','Huhu','0190');



    
    ?>
</body>
</html>