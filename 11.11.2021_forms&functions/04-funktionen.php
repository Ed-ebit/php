<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen</title>
</head>
<body>
    <h1>Funktionen</h1>

    <?php 
    
    /* Eine Funktion wird definiert ... */
    function hallo( $ausgabe ) {
        /* Rückgabe des Inhaltes des Parameters und Beenden der Anweisungen */
        if( ! empty( $ausgabe )){
            return "<p>Hallo $ausgabe!</p>";
        }
        return "<p>Hallo $ausgabe!</p>";
        echo 'Tu was!';
    }
    
    /* ... und hiermit aufgerufen. */
     echo hallo( 'Ewald' );

     $msg = hallo( 'Dieter' );
     echo $msg;

    hallo('');                      #Parameter muss gefüllt sein also nicht hallo();

    function summe( $zahl1, $zahl2 ){
        $summe = $zahl1 + $zahl2;
        return $summe;
    }

    $erg = summe( 33, 9);

    echo "<p>Das ultimative Ergebnis: $erg</p>";

    echo "<p>Ergebnis: " . summe( 20, 22 ) . '</p>';

    /* optionale Parameter */
    /* erst Pflichtparameter, erst dann optionale am Ende der Parameterkette */
    function gesamtpreis( $anzahl,$preis = 50, $waehrung = 'Euro' ) {
        $erg = $anzahl * $preis;
        return "<p>Ihr Einkauf kostet $erg $waehrung.</p>";
    }

    echo gesamtpreis(5,12.5,'Euro');

    echo gesamtpreis(12);
    echo gesamtpreis(6,5);
    echo gesamtpreis(5,3, 'Eimer Sloty');

    /* beliebig viele Parameter */
    function viele_Parameter( $a ) {
        $args = func_get_args();
        $anz = func_num_args();
        echo '<pre>', var_dump( $args ), '</pre>';
        echo "<p>Der erste Parameter ist $a.</p>";
        echo "<p>Der zweite Parameter ist $args[1].</p>";
        echo "<p>Es wurden $anz Parameter übergeben.</p>";
        echo '<p>Das letzte Parameter ist: ' . func_get_arg( $anz - 1) . '.</p>';
    }

    viele_Parameter( 5, 'Quatsch', true, 12.6, 'the last one' );

    /* seit PHP 5.7 - variadische Parameter */
    function variadisch( ...$params){
        echo '<pre>', var_dump( $params ), '</pre>';        
    }

    variadisch( 'Butter', 'Mehl', 'Milch', 'Eier' );
    
    function mitarbeiter( string $m_name, string|array $m_vorname,string $beruf,int $alter){
        if( is_array( $m_vorname )){
            $vn = implode( ', ', $m_vorname );
        } else {
            $vn = $m_vorname;
        }
        return "<p>$vn $m_name ist $beruf und $alter Jahre alt.</p>";        
    }

    /* normaler Aufruf */
    echo mitarbeiter( 'kenobi', 'Obi-Wan', 'Jedi', 185 );

    /* variadischer Aufruf der Funktion */

    $m_array = array(
        'Duck',
        array( 'Donald', 'Fauntleroy' ),
        'Ente',
        78
    );

    echo mitarbeiter( ...$m_array );

    ?>
</body>
</html>