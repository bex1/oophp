<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Bex container.
$bex['title'] = "Om mig";

$bex['main'] = <<<EOD
<article class="readable">
<h1>Om Mig</h1>

<p>Jag heter Daniel Bäckström och går under smeknamnet BEX och studerar vid Chalmers till civilingenjör inom IT och läser lite extrakurser vid sidan av,
                detta för att få en bredare kompetens. Jag bor tillsammans med min flickvän och min hund i en 3:a i Göteborg.</p>

<p>Vanligen så utvecklar jag appar för android och IOS, men även spel i Unity 3D och UDK med tillhörande
                3D-modellering i 3DS-Max och Maya och är kunnig inom språk som java, c++, c, c#, python, SQL,
                ruby on rails, Objective-C, perl osv, och jobbar även deltid som konsult.</p>
{$bex['byline']}

</article>

EOD;


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);