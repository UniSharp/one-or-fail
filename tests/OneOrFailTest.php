<?php

namespace Tests;

use Tests\Config;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use UniSharp\OneOrFail\MoreThanOneQueryResultsException;

class OneOrFailTest extends TestCase
{
    public function setUp()
    {
        Manager::schema()->create('configs', function ($table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });
    }

    public function tearDown()
    {
        Manager::schema()->drop('configs');
    }

    public function testOneOrFail()
    {
        $config = Config::create(['key' => 'key', 'value' => 'value']);

        $this->assertTrue(Config::oneOrFail()->is($config));
    }

    public function testMoreThanOneResults()
    {
        $config = Config::create(['key' => 'key', 'value' => 'value']);
        $config = Config::create(['key' => 'key', 'value' => 'value']);

        $this->expectException(MoreThanOneQueryResultsException::class);
        $this->expectExceptionMessage('More than one query results for model [' . Config::class . ']');

        Config::oneOrFail();
    }

    public function testNoResult()
    {
        $this->expectException(ModelNotFoundException::class);

        Config::oneOrFail();
    }

    public function testWithQueryBuilder()
    {
        $config = Config::create(['key' => 'key', 'value' => 'value']);

        $this->assertTrue(Config::where('key', 'key')->oneOrFail()->is($config));
    }
}
