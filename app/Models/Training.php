<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot(){
        parent::boot();

        static::created(function($training){
            $training->slug =  Str::slug($training->company_name) . $training->id;
            $training->save();
        });


        static::updating(function($training){
            $training->slug =  Str::slug($training->company_name) . $training->id;
           
        });
    }
}
