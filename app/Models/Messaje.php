<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messaje extends Model
{
     protected $table = 'messaje';
     
    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
