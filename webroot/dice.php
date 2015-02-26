<?php
/**
 * This is a Bex pagecontroller.
 *
 */
// Include the essential config-file which also creates the $bex variable with its defaults.
include(__DIR__.'/config.php');

$bex['stylesheets'][] = 'http://fonts.googleapis.com/css?family=Oswald';
$bex['stylesheets'][] = 'css/dice.css';
$bex['stylesheets'][] = 'css/diceGame.css';


// If humans is set and numeric. Determines number of human players if init.
if( (isset($_GET["humans"])) && (is_numeric($_GET["humans"])) ) {
    $nbrHumans = htmlentities($_GET["humans"]);
} else {
    $nbrHumans = 2;
}

// If computers is set and numeric. Determines number of computer players if init.
if( (isset($_GET["computers"])) && (is_numeric($_GET["computers"])) ) {
    $nbrComputers = htmlentities($_GET["computers"]);
} else {
    $nbrComputers = 0;
}

// Destroy object and end game if called for.
if(isset($_GET['endGame'])) {
    // ? $game->destroygame();
    unset($_SESSION['game']);
}

// Start new game if called for.
if(isset($_GET['init'])){
    $game = new DiceGame($nbrHumans,$nbrComputers);
    $_SESSION['game'] = $game;
}

$bex['title'] = "Tärningsspel";

// Get game from the session or offer opportunity to start new game.
if(isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
    if(isset($_GET['roll'])){
        $game->rollDice();
    } elseif(isset($_GET['save'])){
        $game->saveScore();
    }
    $bex['main'] = $game->showBoard();
    $bex['main'] .= $bex['byline'];
}else {
    $bex['main'] = <<<EOD
    <article class="readable">
    <h1>Välkommen till tärningsspelet!</h1>
    <p>Målet med detta spel är att vara den första spelaren att nå 100 poäng.<br>
    Varje gång det ör din tur så kan du välja mellan att slå tärningarna eller att spara dina poäng.
    Om du slår en etta så förlorar du alla poäng som inte sparats, så det kan vara bra att spara dina poäng då och då.</p>

    <p>Välj antalet datorstyrda spelare och mänskliga spelare och klicka sedan på Starta Spelet.</p>

    </article>

EOD;

    $bex['main'] .= getGameOptions($nbrHumans, $nbrComputers);
    $bex['main'] .= $bex['byline'];
}


// Finally, leave it all to the rendering phase of Bex.
include(BEX_THEME_PATH);


/**
 * Create fieldset for starting a new game.
 *
 */
function getGameOptions($humans, $computers) {

    // Throw alternatives
    $humansOptions = array(
        1 => "1",
        2 => "2",
        3 => "3",
        4 => "4");

    // Side alternatives
    $computersOptions = array(
        0 => "0",
        1 => "1",
        2 => "2");

    $html = <<<EOD

    <form id='newdicegame' method="get">
    <p>
    <label for="input1">Mänskliga Spelare:</label>
    <select id='input1' name='humans'>

EOD;

    foreach($humansOptions as $value=>$name) {
        if($value == $humans) {
            $html .= "<option selected='selected' value='".$value."'>".$name."</option>";
        } else {
            $html .= "<option value='".$value."'>".$name."</option>";
        }
    }

    $html .= <<<EOD

    </select>
    </p>
    <p>
    <label for="input2">Datorstyrda Spelare:</label>
    <select id='input2' name='computers'>

EOD;

    foreach($computersOptions as $value=>$name) {
        if($value == $computers) {
            $html .= "<option selected='selected' value='".$value."'>".$name."</option>";
        } else {
            $html .= "<option value='".$value."'>".$name."</option>";
        }
    }

    $html .= <<<EOD

    </select>
    </p>
    <input type="hidden" name="init">
    <button onclick='form.submit();'>Starta Spelet</button>
    </form>

EOD;
    
    return $html;
}
