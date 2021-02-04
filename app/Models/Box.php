<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'slug',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Cards(){
        return $this->hasMany(Card::class);
    }
}
