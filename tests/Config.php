<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use App\MoreThanOneQueryResultException;

class Config extends Model
{
    protected $fillable = ['key', 'value'];
}
