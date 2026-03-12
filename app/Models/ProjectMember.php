<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;
    protected $table      = "project_members";
    protected $primaryKey = 'project_member_id';
    public $timestamps    = false;
    protected $fillable   = [
        "user_id",
        "project_id",
        "role_id",
    ];
}
