<!DOCTYPE html>
<html lang="de">
<html lang="de">
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Übung 2 (Kapitel 7)</title>
  <link rel="stylesheet" href="../css/style.css">
    <?php 

    $chk_herr = '';
    $chk_frau = '';
    $txt_vn = '';
    $txt_nn = '';
    $txt_email = '';
    $ausgabe = '<p><em>Herzlichen Dank, ';

    #echo '<pre>', var_dump( $_POST ), '</pre>';

    if( isset( $_POST['anrede'] ) ) {
        if( $_POST['anrede'] == 'Herr' ) {
            $chk_herr = 'checked';
        } else {
            $chk_frau = 'checked';
        }
        $ausgabe .= $_POST['anrede'] . ' ';
    }

    if( isset( $_POST['vorname'] ) and ! empty( trim( $_POST['vorname'] ) ) ) {
        $txt_vn = $_POST['vorname'];
        $ausgabe .= $txt_vn . ' ';
    }

    if( isset( $_POST['nachname'] ) and ! empty( trim( $_POST['nachname'] ) ) ) {
        $txt_nn = $_POST['nachname'];
        $ausgabe .= $txt_nn . ' ';
    }

    if( isset( $_POST['email'] ) and ! empty( trim( $_POST['email'] ) ) ) {
        $txt_email = $_POST['email'];
    }

    if( isset( $_POST['bewerbung'] ) ) {
        $ausgabe .= 'für Ihre Bewerbungsanfrage. Unsere Personalabteilung wird ';
    } elseif( isset( $_POST['newsletter'] ) ) {
        $ausgabe .= 'für Ihre Anmeldung zu unserem Newsletter. Unsere Marketingabteilung wird ';
    } elseif( isset( $_POST['infos'] ) ) {
        $ausgabe .= 'für Ihr Interesse an unserem Infomaterial. Unsere Marketingabteilung wird ';
    }

    if( ! empty( $txt_email ) ) {
        $ausgabe .= 'per E-Mail - an Ihre Adresse ' . $txt_email . ' - ';
    }

    $ausgabe .= 'Kontakt zu Ihnen aufnehmen.</em></p>';

    ?>
</head>
<body>
    <div class="wrapper">
        <h1>Bewerbung, ...</h1>
        <p>Bitte nennen Sie uns Ihr Anliegen:</p>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
            <p>
                Anrede:
                <input type="radio" name="anrede" value="Herr" <?php echo $chk_herr; ?>> Herr
                <input type="radio" name="anrede" value="Frau" <?php echo $chk_frau; ?>> Frau
            </p>
        
            <p>
                Vorname:
                <input type="text" name="vorname" value="<?php echo $txt_vn; ?>">
            </p>
        
            <p>
                Nachname:
                <input type="text" name="nachname" value="<?php echo $txt_nn; ?>">
            </p>
        
            <p>
                Mailadresse:
                <input type="email" name="email" value="<?php echo $txt_email; ?>">
            </p>
        
            <p>
                <input type="submit" value="bei Ihnen beweben" name="bewerbung">
                <input type="submit" value="Newsletter abonnieren" name="newsletter">
                <input type="submit" value="Infomaterial anfordern" name="infos">
            </p>
        
        </form>
        <?php
        if( isset( $_POST['bewerbung'] ) or isset( $_POST['newsletter'] ) or isset( $_POST['infos'] ) ) {
            echo $ausgabe;
        }
        ?>
    </div>
</body>
</html>