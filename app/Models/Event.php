<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
        'start_date',
        'end_date',
    ];

    public function landmark()
    {
        return $this->belongsTo(Landmark::class);
    }
}
