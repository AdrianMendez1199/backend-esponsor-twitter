<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message'
    ];


    protected $hidden = [
        'status',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
