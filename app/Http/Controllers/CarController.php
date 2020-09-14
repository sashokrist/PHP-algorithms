<?php

namespace App\Http\Controllers;

use App\Car;
use App\Observers\LookupObserver;
use App\Observers\ObserveEverything;
use App\Observers\VinObserver;
use App\RequestCounter;
use App\RequestCounterSingleton;
use ArrayIterator;
use CachingIterator;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function car()
    {
     Car::observe(new ObserveEverything);
     Car::observe(new VinObserver());
     Car::observe(new LookupObserver());
        $car1 = Car::find(1);
        $car1->vin = Str::random(32);
        print "\nSaving car #1 to database\n";
        $car1->save();

        $car2 = new Car;
           $car2->description = "cool car description";
           $car2->vin = Str::random(32);
           $car2->manufacturer = 'Honda';
           $car2->year = '2012';
           print "\nCreating new car\n";
           $car2->save();

        print "\nDeleting that new car you just made\n";
           $car2->delete();

        print "\nRestoring that car you just deleted\n";
          // $car2->restored();
        // attempt #1 with no h
           $car1->vin = "asdfasdfasdf";
           $car1->save() && print "attempt #1 saved\n";

           // attempt #2 contains h
           $car1->vin = "hasdfasdfasdf";
           $car1->save() && print "attempt #2 saved\n";



            $car0 = Car::find(0);
            $car1 = Car::find(1);
    }

    public function singleton()
    {
        RequestCounterSingleton::instance()->makeRequest();
        RequestCounterSingleton::instance()->makeRequest();
        RequestCounterSingleton::instance()->makeRequest();

// Singleton request hits: 3
        print 'Singleton request hits: ' . RequestCounterSingleton::instance()->numberOfRequestsMade() . PHP_EOL;

        app()->instance('request.counter', new RequestCounter);
        try {
            app()->make('request.counter')->makeRequest();
        } catch (BindingResolutionException $e) {
        }
        try {
            app()->make('request.counter')->makeRequest();
        } catch (BindingResolutionException $e) {
        }
        try {
            app()->make('request.counter')->makeRequest();
        } catch (BindingResolutionException $e) {
        }
        try {
            app()->make('request.counter')->makeRequest();
        } catch (BindingResolutionException $e) {
        }
        try {
            app()->make('request.counter')->makeRequest();
        } catch (BindingResolutionException $e) {
        }

// Simple singleton request hits: 5
        print 'Simple singleton request hits: ' . app('request.counter')
                ->numberOfRequestsMade() . PHP_EOL;
    }

    public function iterator()
    {
        $movies = new \App\Movies;
        $movies->add(new \App\Movie('Ponyo', 'G'));
        $movies->add(new \App\Movie('Kill Bill', 'R'));
        $movies->add(new \App\Movie('The Santa Clause', 'PG'));
        $movies->add(new \App\Movie('Guardians of the Galaxy', 'PG-13'));
        $movies->add(new \App\Movie('Reservoir dogs', 'R'));
        $movies->add(new \App\Movie('Sharknado', 'PG-13'));
        $movies->add(new \App\Movie('Back to the Future', 'PG'));print 'MOVIE LISTING' . PHP_EOL;

        foreach ($movies as $movie) {
            print ' - ' . $movie->title() . PHP_EOL;
        }

        print PHP_EOL . 'RATED R ONLY' . PHP_EOL;

        foreach ($movies->rated('R') as $movie) {
            print ' - ' . $movie->title() . PHP_EOL;
        }

        print PHP_EOL . 'IN REVERSE ORDER' . PHP_EOL;

        foreach ($movies->reverse() as $movie) {
            print ' - ' . $movie->title() . PHP_EOL;
        }

        $numbers = new CachingIterator(new ArrayIterator([1, 2, 3, 1, 4, 6, 3, 9]));

        foreach ($numbers as $currentNumber) {
            $sign = '';
            if ($numbers->hasNext()) {
                $nextNumber = $numbers->getInnerIterator()->current();
                $sign = $nextNumber > $currentNumber ? '>' : '<';
            }

            print $sign ? "$currentNumber $sign " : $currentNumber;
        }

        print PHP_EOL;

    }

}
