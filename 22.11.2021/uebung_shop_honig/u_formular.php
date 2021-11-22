<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Honigbestellung',
    null,
    true    
);
get_header( ...$args );
?>

<h2>Übung: Honigbestellung</h2>

<p>Bitte geben Sie die Bestellmenge an (Einheit: 500g Glas)</p>

<form action="u_bestellung.php" method="post">

<table border=1>
    <tr>
        <th>Honig</th>
        <th>Menge</th>
    </tr>
    <tr>
        <td>Akazienhonig</td>
        <td><input type="number" min="0" name="akazien"></td>
    </tr>
    <tr>
        <td>Heidehonig</td>
        <td><input type="number" min="0" name="heide"></td>
    </tr>
    <tr>
        <td>Kleehonig</td>
        <td><input type="number" min="0" name="klee"></td>
    </tr>
    <tr>
        <td>Tannenhonig</td>
        <td><input type="number" min="0" name="tannen"></td>
    </tr>
</table>

<input type="submit" value="abschicken" name="abschicken" class="btn btn-success">

</form>
    
<?php get_footer(); ?>