<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ActivityLogger extends Model
{
    
    protected $table ='activity_log';
    
    public function user(){
      return $this->belongsTo(User::class,'causer_id');
    }
}
