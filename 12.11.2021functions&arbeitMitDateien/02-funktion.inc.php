<?php 

function klausdieter ($schreit) {
    return $schreit;
}


/* ?> lieber weglassen, da dies end-of-file heisst, und wir nach abarbeiten der Datei ja zurück in unser php-Skript der Hauptdatei möchten
bekanntes Problem, wenn auch nicht Suuper-logisch*/

function gib_mir($nachname, $vorname, $alter) {
    return "<p>Es wurde übergeben: $vorname, $nachname, $alter.</p>";
}