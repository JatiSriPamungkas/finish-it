<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;
    protected $primaryKey = 'project_id';

    protected $fillable = [
        "name",
        "description",
        "is_active",
    ];
    public function members() // Pastiin namanya sama dengan yang di whereHas
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'user_id')
            ->withPivot('role_id');
    }
}
