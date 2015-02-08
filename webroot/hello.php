<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Bex container.
$bex['title'] = "Hello World";

$bex['header'] = <<<EOD
<img class='sitelogo' src='img/bex.png' alt='Bex Logo'/>
<span class='sitetitle'>Bex webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$bex['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur Bex ser ut och fungerar.</p>
EOD;

$bex['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Daniel Bäckström (danbacks@student.chalmers.se) | <a href='https://github.com/bex1'>Bex på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);
