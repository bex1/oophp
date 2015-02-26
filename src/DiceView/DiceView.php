<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2015-02-14
 * Time: 14:59
 */

class DiceView extends Dice{
    /**
     * Properties
     *
     */
    const FACES = 6;

    /**
     * Constructor
     *
     */
    public function __construct() {
        parent::__construct(self::FACES);
    }

    public function GetRollAsImage() {
        $html = "<ul class='dice'>";
        $val = $this->getResult();
        $html .= "<li class='dice-{$val}'></li>";
        $html .= "</ul>";
        return $html;
    }
}