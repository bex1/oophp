<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');



// Do it and store it all in variables in the Bex container.
$bex['title'] = "404";
$bex['header'] = "";
$bex['main'] = "This is a Bex 404. Document is not here.";
$bex['footer'] = "";

// Send the 404 header
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);