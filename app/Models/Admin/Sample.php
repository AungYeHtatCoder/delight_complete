<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'service_id',
        'photo',
        'video',
        'content'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
