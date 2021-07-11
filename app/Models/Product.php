<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use HasFactory,LogsActivity;
    protected $table ='Product';
    protected $fillable =[
     'name','slug','description','price','barcode'
    ,'stock','rate'];
    
   protected static $logAttributes = ['name','barcode','price','stock'];
    
    protected static $ignoreChangeAttributes = [
      'updated_at'
    ];
      
    protected static $recordEvents = [
      'created','updated','deleted',
      ];
      
    protected static $logName ='user';
    protected static $logOnlyDirty = true;
    
    public function getDescriptionForEvent(string $eventName ):string{
      return "You have {$eventName} product";
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
