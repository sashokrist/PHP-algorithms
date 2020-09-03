<?php


namespace App;


class Hipster
{

    /**
     * Hipster constructor.
     * @param string $string
     */
    public $smell;
    public function __construct($smell)
    {
        $this->smell = $smell;
    }

    public function smells()
    {
        return print 'its smell a lot. ';
    }
}
