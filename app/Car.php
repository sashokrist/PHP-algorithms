<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $observables = ['finding', 'found'];

    public static function find($id, $columns =  ['*'])
    {
        $shouldProceed = static::triggerModelEvent('finding', true, $id);

        if ($shouldProceed === false) return null;

        $results = parent::find($id, $columns);

        static::triggerModelEvent('found', $stop = false, $results);

        return $results;
    }

    protected static function triggerModelEvent($event, $halt, $params =
       null)
   {
           if (! isset(static::$dispatcher)) return true;

           $event = "eloquent.{$event}: ".get_called_class();

           $method = $halt ? 'until' : 'fire';

           return static::$dispatcher->$method($event, $params);
   }
}
