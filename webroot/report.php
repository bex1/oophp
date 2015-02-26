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

<h2>Kmom02: Objektorienterad programmering i PHP</h2>
<h3>Hur väl känner du till objektorienterade koncept och programmeringssätt?</h3>
<p>Jag jobbar dagligen med objektorientering så det är inte nytt på något sätt. De första språken jag lärde mig var objektorienterade så tankesättet sitter i
i ryggmärgen kan man säga. Det var intressant att se hurpass likt Java och C# objektorienteringen i Php är.</p>
<h3>Jobbade du igenom oophp20-guiden eller skumläste du den?</h3>
<p>Jag skumläste den om jag ska vara ärlig. Jag känner inte att jag behöver öva på objektorientering direkt. Jag fokuserade istället på syntaxen.</p>
<h3>Berätta om hur du löste uppgiften med tärningsspelet 100, hur tänkte du och hur gjorde du, hur organiserade du din kod?</h3>
<p>Jag höll det enkelt och slösade inte bort tid på onödiga objekt och konstruktioner. Det är det första man lär sig som konsult att ta den enkla minst tidskrävande vägen
när man jobbar med moduler, annat är slöseri med tid. Så det enda som behövdes i detta exempel är en tärning, spelare och ett spel. Därav skapade jag Dice, DiceGame och DicePlayer.
I uppgiftsbeskrivningen så nämndes det något om ett objekt för spelrundan, vilket hade varit på sin plats om jag ville implementera playback men jag kände att objektet inte hörde
hemma i min lösning då den hade bidragit med onödig komplicitet. Dessutom så kan man ju enkelt hålla koll på poängen med två separata variabler savedScore resp score. Mitt spel
 är dock en variant av själva uppgiftsbeskrivningen då jag byter spelare mellan varje val. Där man får välja mellan att spara sina poäng eller att kasta tärningen. När man sedan
 eventuellt får en etta så faller man ner till sin sparade poäng. Därav är utmaningen att spara vid rätt tillfälle. De datorstyrda spelarna gör detta genom en väldigt enkel form av
 AI. Jag kan väll också nämna att jag inte direkt brydde mig om att separera domänmodllen helt från html generering aka MVC då det hade krävt ett ytterligare lager av komplexitet. Det hade jag dock
 troligen gjort i jobbet dock.</p>
{$bex['byline']}

</article>

EOD;


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);
