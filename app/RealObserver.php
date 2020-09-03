<?php


namespace App;


use SplSubject;

class RealObserver implements \SplObserver
{

    /**
     * @inheritDoc
     */

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function update(SplSubject $subject)
    {
        print "{$this->name} was notified by {$subject->name}" . PHP_EOL;
    }
}
