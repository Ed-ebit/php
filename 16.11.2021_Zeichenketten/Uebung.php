<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung',
    null,
    false,
    'Superübung Zeichenfunktionen'
);
get_header( ...$args );
?>
<?php  

//Übung1
$zahl = 78.123456789;
printf("Fliesskomma: %09.5f <br>", $zahl);

$string1="Beachten Sie das Angebot für die ";
$string2="folgende Kalenderwoche: ";
$string3="";
$string4="Bananen, 5 Kilo für nur 5,- Euro!";

printf($string1.'---'.$string2.'---'."%'*42s",$string3.$string3.'---'.$string4);

$string=$string1.$string2.$string3.$string4;
echo var_dump($string).'<br>';
$stringex = explode(" ",$string);
echo var_dump($stringex).'<br>';
$stringim = implode('#', $stringex);
echo var_dump($stringim).'<br>';

$string5 = str_replace ('das Angebot','<br>unser Sonderangebot</b>',$string1);
$string6 = str_replace ('Bananen','<i>Alle Obstsorten</i>',$string4);

printf($string5.'---'.$string2.'---'."%'*57s",$string3.$string3.'---'.$string6);
?>
//Übung2

<h2>Wörter suchen</h2>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<p>Bitte den zu durchsuchenden Text eingeben:</p>
<textarea name="text" cols="30" rows="10"></textarea>
<p>Bitte den zu suchenden Begriff eingeben:</p>
<input type="text" name="begriff">
<input type="submit" name="suchen" value="suchen">

</form>
<?php 



if( isset($_POST['suchen'])){ 
    
    switch ($_POST){
        case empty($_POST['text']): 
            echo'<p><b style="background-color:red">Bitte einen Text zum durchsuchen angeben!</b></p>';
            break;
        case empty($_POST['begriff']): 
            echo'<p><b style="background-color:red">Bitte einen Suchbegriff angeben!</b></p>';
            break;
        default: 
            echo '<p>Die Such-Corporation dankt Ihnen für Ihre Suche!</p>';
            echo '<p>';
            echo 'Suche nach '.$_POST['begriff'].' ergibt: <b>'.substr_count($_POST['text'], $_POST['begriff']).'</b> Treffer.';
            echo '</p>';
        
            $_POST['text']=str_replace($_POST['begriff'],"<b style='background-color:red'>$_POST[begriff]</b>", $_POST['text']);
            echo '<p>';
            echo "<b>durchsuchter Text: </b></p><p> $_POST[text]";
            echo '</p>';
        
    }
    
}


?>



    
<?php get_footer(); ?>