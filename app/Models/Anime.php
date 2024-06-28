<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $table = 'anime';

    protected $fillable = [
        'Title',
        'Author',
        'Eps'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
