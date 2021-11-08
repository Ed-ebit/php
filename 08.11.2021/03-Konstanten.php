<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konstanten</title>
</head>
<body>
    <h1>Konstanten</h1>
    <?php
    /* === Konstanten definieren und initialisieren
    =================================================================== */

    // 1, Standard Werte
    define ('MWST',0.19);
    //3. Parameter: optional, bedeutet: ist die Konstante Casesensitive oder nicht? seit php 8.0 nicht mehr unterstützt

    echo '<p>Die Mehrwertsteuer in Deutschland beträgt '.MWST.'%.</p>';
    //alternative Möglichkeit:
    const PI = 3.1415;
    // Hinweis: dies kann nur im Top-Level Scope benutzt werden.
    echo 'PI: '.PI;


    
    ?>
</body>
</html>