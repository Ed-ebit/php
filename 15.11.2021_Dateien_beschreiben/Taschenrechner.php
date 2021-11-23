<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taschenrechner</title>
</head>
<body>
    <h1>Taschenrechner</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">


    <p><!-- Buttons wie beschriften?-->
        Zahl 1: <input type="number" name="zahl1"><br>
        <input type="button" name="plus">+</input>
        <input type="button" name="minus">-</input>
        <input type="button" name="mal">*</input>
        <input type="button" name="geteilt">/</input>
        Zahl 2: <input type="number" name="zahl2"><br>
        
        <input type="submit" name="istgleich">=</input>
    </p>

    <p>
        Ergebnis: 
    </p>

    </form>
</body>
</html>