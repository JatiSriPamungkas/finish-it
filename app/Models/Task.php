<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TasksFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "due_date",
        "project_id",
        "status_id",
        "priority_id",
        "user_id",
    ];
}
