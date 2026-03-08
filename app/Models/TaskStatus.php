<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $table = 'task_status';

    protected $primaryKey = 'task_status_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
