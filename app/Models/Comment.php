<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comment';
    
    protected $fillable = ['message'];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
    
    public function review() {
        return $this->belongsTo('App\Models\Review', 'idreview');
    }
}
