<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');

// Do it and store it all in variables in the Bex container.
$bex['title'] = "Redovisning";

$bex['main'] = <<<EOD
<article class="readable">
<h1>Redovisning av kursmomenten</h1>

<h2>Kmom01: Kom igång med Objektorienterad PHP</h2>

<h3>Vilken utvecklingsmiljö använder du?</h3>
<p> Jag använder PhpStorm alternativt brackets kombinerat med cmder och chrome. Detta sätt att jobba funkar för mig oavsett vad jag håller
    på med, så det är i stort sett bara IDE och servern som skiljer sig när jag jobbar med annat. Jag använder windows och ubuntu på min
    workstation och så har jag Macbook som laptop.</p>

<h3>Berätta hur det gick att jobba igenom guiden “20 steg för att komma igång PHP”, var något nytt eller kan du det?</h3>
<p> I föregående kurs så togs det mesta upp har jag för mig, och jag kände redan då till mycket av materialet. Men det var ändå
 skönt att få lite repedition så jag inte börjar blanda ihop massa syntax från olika språk. Har skett en och annan gång förr kan man lugnt säga...... </p>
<h3>Vad döpte du din webbmall Anax till?</h3>
<p> Jag kallar den Bex i brist på fantasi, då det också är mitt smeknamn. </p>
<h3>Vad anser du om strukturen i Anax, gjorde du några egna förbättringar eller något du hoppade över?</h3>
<p> Jag tyckte verkligen att momentet gav mycket till skillnad från tidigare något enkla moment i föregående kurs. Det var intressant att se hur
ett framework för webben kan struktureras. Dock så känns det som att dokumentstrukturen endast är anpassad för en viss typ
av layout. Det finns andra strukturer som ofta används när man vill få till t.ex. en sticky fotter eller en helt liquid layout.
Dock så kan man självklart modifiera strukturen, vilket jag kanske gör i nästa övning.</p>
<h3>Gick det bra att inkludera source.php? Gjorde du det som en modul i ditt Anax?</h3>
<p> Ja det gick smidigt. Tittade lite på hur Moz hade gjort och sen fick jag ordning på det efter typ 5 min på ett liknande sätt i en modul. </p>
<h3>Gjorde du extrauppgiften med GitHub?</h3>
<p> Ja, jag pushade upp frameworket och projektet till git. Detta gör jag alltid när jag jobbar med projekt, dock så kör vi med bitbucket på jobbet. </p>
{$bex['byline']}

</article>

EOD;


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);
