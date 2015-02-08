<?php
/**
 * Config-file for Bex. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Bex paths.
 *
 */
define('BEX_INSTALL_PATH', __DIR__ . '/..');
define('BEX_THEME_PATH', BEX_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(BEX_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Bex variable.
 *
 */
$bex = array();


/**
 * Site wide settings.
 *
 */
$bex['lang']         = 'sv';
$bex['title_append'] = ' | Bex en webbtemplate';

$bex['header'] = <<<EOD
<div id="slideshow" class='slideshow' data-host="" data-path="img/slideshow/" data-images='["me-1.jpg", "me-2.jpg", "me-4.jpg", "me-6.jpg"]'>
<img src='img/slideshow/me-6.jpg' width=1300 height=400 alt='Slides'/>
</div>
<span class='sitetitle'>B E X</span>
<span class='siteslogan'>Min Me-sida i kursen Databaser och Objektorienterad PHP-programmering</span>
EOD;

$bex['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Daniel Bäckström (danbacks@student.chalmers.se) | <a href='https://github.com/bex1'>Bex på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

$bex['byline'] = <<<EOD
<footer class="byline">
    <div class="circle" style="background-image: url('img/jag.jpg')"></div>
    <p class="centerText">Utvecklat av Daniel Bäckström</p>
</footer>
EOD;

/**
 * The navbar
 *
 */
//$bex['navbar'] = null; // To skip the navbar
$bex['navbar'] = array(
    'class' => 'nb-plain',
    'items' => array(
        'hem'         => array('text'=>'Hem',         'url'=>'me.php',          'title' => 'Min presentation om mig själv'),
        'redovisning' => array('text'=>'Redovisning', 'url'=>'report.php', 'title' => 'Redovisningar för kursmomenten'),
        'kallkod'     => array('text'=>'Källkod',     'url'=>'source.php',      'title' => 'Se källkoden'),
    ),
    'callback_selected' => function($url) {
        if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
            return true;
        }
    }
);



/**
 * Theme related settings.
 *
 */
//$bex['stylesheet'] = 'css/style.css';
$bex['stylesheets'] = array('css/style.css');
$bex['favicon']    = 'favicon.ico';

/**
 * Settings for JavaScript.
 *
 */
$bex['modernizr'] = 'js/modernizr.js';
$bex['jquery_src'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$bex['jquery'] = null; // To disable jQuery
$bex['javascript_include'] = array();
//$bex['javascript_include'] = array('js/main.js'); // To add extra javascript files

// Define what to include to make the plugin to work
$bex['stylesheets'][]        = 'css/slideshow.css';
$bex['jquery']               = true;
$bex['javascript_include'][] = 'js/slideshow.js';