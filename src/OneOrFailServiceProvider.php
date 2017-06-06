<?php

namespace UniSharp\OneOrFail;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use UniSharp\OneOrFail\MoreThanOneQueryResultsException;

class OneOrFailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Builder::macro('oneOrFail', function ($columns = ['*']) {
            $collection = $this->get($columns);

            if ($collection->isEmpty()) {
                throw (new ModelNotFoundException)->setModel(get_class($this->model));
            }

            if ($collection->count() > 1) {
                throw (new MoreThanOneQueryResultsException)->setModel(get_class($this->model));
            }

            return $collection->first();
        });
    }
}
