<?php

require __DIR__ . '/../vendor/autoload.php';

use UniSharp\OneOrFail\OneOrFailServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'sqlite',
    'database'  => ':memory:',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

(new OneOrFailServiceProvider('app'))->boot();
