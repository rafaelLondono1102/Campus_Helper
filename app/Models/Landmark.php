<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'picture',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
