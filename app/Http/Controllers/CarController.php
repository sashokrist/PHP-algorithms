<?php

namespace App\Http\Controllers;

use App\Car;
use App\Observers\LookupObserver;
use App\Observers\ObserveEverything;
use App\Observers\VinObserver;
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

}
