<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'name', 'website', 'email', 'phone', 'address', 'bio'
    ];
    
    public function users(){
        return $this->belongsTo(User::class);
    }

}
