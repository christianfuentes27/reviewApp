<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $table = 'review';
    
    protected $fillable = ['title', 'type', 'review', 'thumbnail'];
    
    public function images() {
        return $this->hasMany('App\Models\Image', 'idreview');
    }
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'idreview');
    }
}
