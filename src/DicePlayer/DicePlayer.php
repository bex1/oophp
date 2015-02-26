<?php
/**
 * A player (human or computer) which has a dice and holdsname,
 * running score, saved score and number of rolls.
 *
 */
class DicePlayer  {

    /**
     * Properties
     *
     */
    private $name;
    private $score;
    private $savedScore;
    private $numRolls;
    private $dice;
    private $isComputer;

    /**
     * Constructor
     *
     */
    public function __construct($name, $isComputer = false) {
        $this->name=$name;
        $this->score=0;
        $this->savedScore=0;
        $this->numRolls=0;
        $this->isComputer=$isComputer;
        $this->dice=new DiceView;
    }

    /**
     * Roll dice and update score and number of rolls
     */
    public function rollDice() {
        $this->dice->roll();
        $this->numRolls++;
        if($this->dice->getResult()==1){
            $this->score = $this->savedScore;
        } else {
            $this->score += $this->dice->getResult();
        }
    }

    /**
     * Save score of player to savedScore
     *
     */
    public function saveScore() {
        $this->savedScore=$this->score;
    }

    public function isComputer() {
        return $this->isComputer;
    }

    public function getRollAsImage() {
        return $this->dice->getRollAsImage();
    }

    public function getScore() {
        return $this->score;
    }

    public function getName() {
        return $this->name;
    }

    public function getSavedScore() {
        return $this->savedScore;
    }

    public function getNumRolls() {
        return $this->numRolls;
    }
}