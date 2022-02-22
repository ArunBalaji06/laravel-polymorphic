<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    /**
     * Polymorphic relation to many
     */
    public function comments(){
        return $this->morphMany('App\Models\Comment');
    }
}
