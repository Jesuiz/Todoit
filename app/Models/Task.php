<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed', 'user_id'];

    protected $attributes = [
        'completed' => false,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['title'] ?? null, function ($query, $title) {
            $query->where('title', 'like', '%' . $title . '%');
        })->when(isset($filters['completed']), function ($query) use ($filters) {
            $query->where('completed', $filters['completed']);
        })->when($filters['created_at'] ?? null, function ($query, $date) {
            $query->whereDate('created_at', $date);
        });
    }
}