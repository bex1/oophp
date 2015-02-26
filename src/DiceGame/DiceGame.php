<?php
/**
 * A dice game with support for many players and computer players.
 *
 */
class DiceGame
{

    private $players;
    private $numPlayers;
    private $nbrPlays;
    private $activePlayer;
    private $winner;

    /**
     * Constructor
     *
     */
    public function __construct($numPlayers = 1, $numComputers = 1)
    {
        for ($i = 0; $i < $numPlayers; $i++) {
            $this->players[] = new DicePlayer("Spelare " . ($i + 1), false);
        }
        for ($i = 0; $i < $numComputers; $i++) {
            $this->players[] = new DicePlayer("Dator " . ($i + 1), true);
        }
        $this->numPlayers = $numPlayers + $numComputers;
        $this->nbrPlays = 0;
        $this->activePlayer = 0;
    }

    /**
     * Returns the gameboard in html.
     */
    public function showBoard()
    {

        // If next is computer. Make move.  
        if ($this->players[$this->activePlayer]->isComputer()) {
            $this->makeComputerMove();
        }


        $html = '<div class="gameBoard">';

        // Show who is up and options, unless winner.
        $html .= '<div class="info">';
        if ($this->gameOver()) {
            $html .= "<p><a class='gamebutton' href='?endGame'>Avsluta spelet</a>.</p>";
            $html .= "<h1>" . $this->winner . " vann!" . "</h1>";
        } else {
            $html .= "<p><a class='gamebutton' href='?roll'>Slå tärningen</a><a class='gamebutton' href='?save'>Spara poängen</a><a class='gamebutton' href='?endGame'>Avsluta spelet</a></p>";
            $html .= "<h1>" . $this->players[$this->activePlayer]->getName() . "'s tur att spela.</h1>";
        }
        $html .= '</div>';

        // Show status of all players
        $html .= '<div class="players">';
        foreach ($this->players as $id => $player) {
            $html .= '<div class="player' . (($this->activePlayer == $id) ? "-active" : "") . '">';
            $html .= "<h1>" . $player->getName() . "</h1>";
            $html .= "<p>Poäng: " . $player->getScore() . "<br>";
            $html .= "Sparade poäng: " . $player->getSavedScore() . "</br>";
            $html .= "Antal slagna tärningar: " . $player->getNumRolls() . "</p>";

            // Div that holds dice if it has been rolled.
            $html .= '<div class="diceHolder">';
            if ($this->nbrPlays > $id) {
                $html .= $player->getRollAsImage();
            }
            $html .= '</div>';

            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }


    /**
     * Rolls the dice of player whos turn it is.
     *
     * Only possible if game is not won.
     */
    public function rollDice()
    {
        if (!($this->gameOver())) {
            $this->players[$this->activePlayer]->rollDice();
            if ($this->players[$this->activePlayer]->getScore() >= 100) {
                $this->winner = $this->players[$this->activePlayer]->getName();
            }
            $html = $this->players[$this->activePlayer]->getRollAsImage();
            $this->nextPlayer();
            return $html;
        }
    }

    /**
     * Saves score of player whos turn it is.
     *
     * Only possible if game is not won.
     */
    public function saveScore()
    {
        if (!($this->gameOver())) {
            $this->players[$this->activePlayer]->saveScore();
            $this->nextPlayer();
        }
    }

    /**
     * Controlls computer moves.
     *
     * Saves score if difference between score and saved score is at least as big as $saveIfGap.
     * Otherwise choses to roll the dice.
     */
    private function makeComputerMove()
    {
        if (!($this->gameOver())) {
            $saveIfGap = 7;
            $score = $this->players[$this->activePlayer]->getScore();
            $savedScore = $this->players[$this->activePlayer]->getSavedScore();

            // Save score if at least $saveIfGap bigger than saved score. 
            if (($score - $savedScore) >= $saveIfGap) {
                $this->saveScore();
            } else {
                $this->rollDice();
            }

            // If next is computer. Make move.  
            if ($this->players[$this->activePlayer]->isComputer()) {
                $this->makeComputerMove();
            }
        }
    }

    /**
     * Returns true if there is a winner with >= 100 score.
     *
     * @return bool : true if there is a winner with >= 100 score.
     */
    private function gameOver()
    {
        if (isset($this->winner)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Switch player.
     *
     */
    private function nextPlayer()
    {
        $this->nbrPlays++;
        $this->activePlayer = $this->nbrPlays % $this->numPlayers;
    }
}