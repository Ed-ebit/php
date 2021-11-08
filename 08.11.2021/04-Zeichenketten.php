<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeichenketten</title>
</head>
<body>
    <h1>Zeichenketten</h1>

    <?php
    
    echo "<p>Der Fluss, der durch Dresden fliesst heisst \"Elbe\".</p>";
    //"" für Interpreter maskieren mit \
    // Wenn '' genutzt wird, wird dies als Steuerzeichen erkannt und das "" muss nicht mehr maskiert werden:
    echo '<p>Der Fluss, der durch Dresden fliesst heisst "Elbe".</p>';
    // und umgekehrt! aber: Singlequotes als Steuerzeichen unterstützen keine zusätzlichen Zeichen wie /n, /t etc, um Zeilenumbrüche im html-Dokument (nicht imm Ausgabetext) zu erzeugen

    // Dies führt dazu, dass der \ als Zeichen im Text auch markiert werden muss (mit nem weiteren \ :P):
    echo "<p>Der Ordner für XAMPP liegt in: 'C:\\xampp\\'.</p>";

    
    ?>
</body>
</html>