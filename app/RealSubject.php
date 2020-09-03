<?php


namespace App;


use SplObserver;

class RealSubject implements \SplSubject
{

    /**
     * @inheritDoc
     */
    private $observers;

    public function __construct($name)
    {
        $this->name = $name;
        $this->observers = new \SplObjectStorage;
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @inheritDoc
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
