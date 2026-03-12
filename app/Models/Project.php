<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        "name",
        "description",
        'due_date',
        "is_active",
    ];
    public function members() // Pastiin namanya sama dengan yang di whereHas
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'user_id')
            ->withPivot('role_id');
    }
}
