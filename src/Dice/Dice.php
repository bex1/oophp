<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2015-02-14
 * Time: 14:54
 */

class Dice {

    /**
     * Properties
     *
     */
    private $faces;
    private $result;

    /**
     * Constructor
     *
     */
    public function __construct($faces=6) {
        $this->faces = $faces;
    }

    /**
     * Get the number of faces.
     *
     */
    public function getFaces() {
        return $this->faces;
    }

    /**
     * Get number of faces of dice.
     *
     */
    public function getResult(){
        return $this->result;
    }

    /**
     * Roll the dice
     *
     */
    public function roll() {
        $this->result = rand(1, $this->faces);
    }

}