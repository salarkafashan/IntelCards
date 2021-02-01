<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Box extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'slug',
    ];
    public function path()
    {
        return url("Boxes/{$this->id}-" . Str::slug($this->name));
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Cards(){
        return $this->hasMany(Card::class);
    }
}
