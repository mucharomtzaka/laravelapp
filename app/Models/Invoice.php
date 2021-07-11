<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    public function customer(){
       return $this->belongsTo(Customer::class);
    }

    public function detail(){
       return $this->hasMany(Invoice_detail::class);
    }
    
    public function getTaxAttribute(){
        return ($this->total * 2) / 100;
    }

    public function getTotalPriceAttribute(){
        return ($this->total + (($this->total * 2) / 100));
    }
}
