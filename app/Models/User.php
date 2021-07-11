<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
  

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens,HasRoles,LogsActivity;
    
    protected $table ='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'type_account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected static $logAttributes = ['first_name','last_name','email'];
    
    protected static $ignoreChangeAttributes = [
      'password','updated_at'
      ];
      
    protected static $recordEvents = [
      'created','updated','deleted',
      ];
      
    protected static $logName ='user';
    protected static $logOnlyDirty = true;
    
    public function getDescriptionForEvent(string $eventName ):string{
      return "You have {$eventName} user";
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
}
