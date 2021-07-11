<?php

namespace App\Models;

use DateTimeInterface;
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
    

    protected function serializeDate(DateTimeInterface $date) {
        return $date->diffForHumans();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
