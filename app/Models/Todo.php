<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = "todo";

    protected $fillable = [
        'title',
        'comment',
        'clock',
        'date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersTodo()
    {
        return $this->belongsToMany(User::class, 'todo');
    }
}
