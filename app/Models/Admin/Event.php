<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'start',
        'end',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}