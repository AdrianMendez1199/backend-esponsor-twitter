<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'status',
        'created_at',
        'updated_at',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
