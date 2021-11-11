<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Das Formular</title>
</head>
<body>
    <h1>Das Formular</h1>
    <p>Bitte füllen Sie die folgenden Felder aus!</p>
    <!-- Formulardaten kommen über name-Attribut an! -->

    <form action="05-formular-auswertung.php" method="post">
        <p>Vorname: <input type="text" name="vorname"></p>
        <p>Nachname: <input type="text" name="nachname"></p>
        <p>E-Mail: <input type="email" name="email"></p>

        <p><input type="submit" name="absenden"></p>

    </form>
</body>
</html>