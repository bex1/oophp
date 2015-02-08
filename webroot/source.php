<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');


// Add style for csource
$bex['stylesheets'][] = 'css/source.css';


// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


// Do it and store it all in variables in the Bex container.
$bex['title'] = "Visa källkod";

$bex['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);