<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
      'factur','operator','location','type','description','amount','status'
      ];
    /*protected $casts = [
      'begin' => 'date:hh:mm'
    ];*/
}
