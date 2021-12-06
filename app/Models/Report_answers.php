<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_answers extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'answer_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
