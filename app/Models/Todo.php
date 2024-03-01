<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = "todo";

    protected $fillable = [
        'user_id',
        'title',
        'comment',
        'clock',
        'date',
        'status',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
