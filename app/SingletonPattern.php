<?php


namespace App;


trait SingletonPattern
{
    static protected $instance;

    final protected function __construct()
    {
        // no one but ourselves can create ourselves
    }

    static public function instance()
    {
        if (! static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}
