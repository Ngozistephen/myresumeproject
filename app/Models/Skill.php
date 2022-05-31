<?php

namespace App\Models;

use App\Models\Porfolio;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot(){
        parent::boot();
        
        static::created(function($skill){
            $skill->slug =  Str::slug($skill->lang_name) . $skill->id;
            $skill->save();
        });
    }


    public function porfolios(){
        return $this->belongsToMany(Porfolio::class, 'skill_porfolio');
    }
}
