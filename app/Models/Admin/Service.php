<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'created_at',
        'updated_at',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class)->withPivot(['qty']);
    }

    public function sample(){
        return $this->hasMany(Sample::class);
    }
}