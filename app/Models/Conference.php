<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'lecturer',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id'); // Use 'id' instead of 'user_id'
    }

}
