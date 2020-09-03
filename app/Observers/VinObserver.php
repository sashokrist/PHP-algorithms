<?php

namespace App\Observers;

class VinObserver
{
    public function updating($model)
    {
        $original = $model->getOriginal('vin');

        if ($model->vin === $original) {
            return true;   // ignore unchanged vin
        }

        if (! str_contains($model->vin, 'h')) {

            print "model vin does not contain letter 'h', canceling updating vi \n";

            return false;
        }
    }
}
