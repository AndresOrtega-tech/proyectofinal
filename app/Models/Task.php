<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';
    protected $fillable = [
    'title',
    'description',
    'project_id',
    'assigned_to',
    'status',
    'due_date',
];


    /**
     * Get the project that the task belongs to.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    /**
     * Get the user that is assigned to the task.
     */
    public function assignedToUser()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'user_id');
    }

    /**
     * Get the comments associated with the task.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id', 'task_id');
    }
}
