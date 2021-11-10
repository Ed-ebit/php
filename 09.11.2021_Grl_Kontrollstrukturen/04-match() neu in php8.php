<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match() neu seit php 8.0</title>
</head>
<body>
    <h1>Match() neu seit php 8.0</h1>
    <?php 

    $status = 200;
    $erg = match($status) {
        200, 300 => null,
        400 => 'not found',
        500 => 'server error',
        default => 'unknown status code'
    }; // ; muss, da hier etwas einer Variablen zugewiesen wird
    // = > ist zuweisung innerhalb der Variable, gibt der Ergebnisvariable einen Wert zurück, daher andere Syntax als bei normaler Zuweisung (aka =)

    echo "<p>Server-Status: $erg</p>";
    ?>
</body>
</html>