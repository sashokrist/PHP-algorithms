<?php


namespace App;


interface CheeseSmeller
{
    public function smells(CheeseCutter $cutter, $cheese);
}
