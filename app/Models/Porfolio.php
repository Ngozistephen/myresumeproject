<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Porfolio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['start_date' => 'date', 'end_date'=> 'date'];

    public static function boot(){
        parent::boot();
        
        static::created(function($porfolio){
            $porfolio->slug =  Str::slug($porfolio->project_name) . $porfolio->id;
            $porfolio->save();
        });

        static::updating(function($porfolio){
            $porfolio->slug =  Str::slug($porfolio->project_name) . $porfolio->id;
           
        });
    }


    public function skills(){
        return $this->belongsToMany(Skill::class, 'skill_porfolio');
    }
}
