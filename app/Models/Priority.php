<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';

    protected $primaryKey = 'priority_id';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}