<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overdue extends Model
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

    // Method untuk menyaring hanya tugas yang Overdue
    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue');
    }
}
