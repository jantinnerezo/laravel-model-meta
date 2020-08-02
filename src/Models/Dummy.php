<?php

namespace Jantinnerezo\LaravelModelMeta\Models;

use Illuminate\Database\Eloquent\Model;
use Jantinnerezo\LaravelModelMeta\Metable;

class Dummy extends Model
{
    use Metable;

    protected $table = 'dummies';

    protected $fillable = ['name'];
}
