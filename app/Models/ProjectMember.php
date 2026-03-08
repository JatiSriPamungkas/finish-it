<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $table      = "project_members";
    protected $primaryKey = 'project_members_id';
    public $timestamps    = false;
    protected $fillable   = [
        "user_id",
        "project_id",
        "role_id",
    ];
}
