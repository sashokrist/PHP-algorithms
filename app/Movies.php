<?php


namespace App;


use Exception;
use Traversable;

class Movies implements \IteratorAggregate
{
    protected $list = [];
    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }



    public function add(Movie $movie): void
    {
        $this->list[] = $movie;
    }

    public function rated($rating): \ArrayIterator
    {
           $filtered = array_filter($this->list, function ($item) use ($rating) {

                   return $item->rating() === $rating;
           });

           return new \ArrayIterator($filtered);
   }

    public function reverse(): ReverseArrayIterator
    {
           return new ReverseArrayIterator($this->list);
   }
}
