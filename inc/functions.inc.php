<?php 
    //Funktionen, die man in jedem Skript gut gebrauchen kann
    
    /* Schreibt einen HTML-Header und den Kopf-Bereich der Seite
    Title (Head-Bereich) --einziger absoluter Pflichtparameter, rest darf optional sein
    CSS Datei(en)? Null||(string|array)
    Bootstrap? false || bool
    der (sichtbare) Kopfbereich NULL || String
    Navigation? NULL || array
            deren Navig.-Elemente?
    container-fluid false || bool -regelt, ob Bootstrap Klasse 'Container' oder 'container-fluid' genutzt werden soll
    */
    
    function get_header(
        string $title,
        string|array $css = NULL,
        bool $bootstrap = false,
        string $header = NULL,
        array $nav = NULL,
        bool $fluid = false
    ){
        $class_fluid = (false === $fluid) ? 'container': 'container-fluid';
?>
<!--html-teil-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title);?></title>
    <?php 
    if ($bootstrap) {
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
    }
    if(is_array($css)) {
        foreach($css as $css_link) {
            echo "\t<link rel='stylesheet' href='" .htmlspecialchars($css_link)."'>\r\n";
        }
    } elseif ( !is_null($css)){
        echo "\t<link rel='stylesheet' href='" . htmlspecialchars( $css ) . "'>";
    }
    ?>
</head>
<body>
    <?php if(!is_null($nav)) get_nav($nav); ?>

    <header>
        <div class="<?php echo $class_fluid; ?>">
            <h1 class="display-3"><?php echo (is_null($header)) ?
        $title: $header; ?></h1>
        </div>

    </header>
    <main class="<?php echo $class_fluid; ?>">
    
<?php 
    }
?>





<?php
    /*
    Schreibt einen Fußbereich einer HTML-Seite.
    
    @param $fluid bool optiona
        Regelt ob eine Bootstrap-Klasse 'container' bzw.
        'container-fluid' benutzt werden soll
        default: false

    @ param $bootstrap_js bool optional
        Regelt ob Bootstrap-JS-Dateien eingebunden werden müssen.

    @return string Footer-Angaben für die HTML-Seite
    */
    
    function get_footer(bool $fluid = false, bool $bootstrap_js = false) {
        $class_fluid = (false ===$fluid) ? 'container' : 'container-fluid';
?>
<!--html-Teil:-->
        </main>
        <footer class="<?php echo $class_fluid; ?>">
            <p>&copy; <?php echo date('Y'); ?> MoD, Kurs: PHP</p>
        </footer>
        <?php if($bootstrap_js ===true): ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php endif; ?>    
        </body>
        </html>

<?php
    }
?>
