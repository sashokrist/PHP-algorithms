<?php


namespace App;


class RequestCounter
{
    private $numberOfRequestsMade = 0;

    public function numberOfRequestsMade(): int
    {
        return $this->numberOfRequestsMade;
    }
    public function makeRequest(): void
    {
        $this->numberOfRequestsMade++;
    }
}
