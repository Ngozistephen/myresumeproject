<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Porfolio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function skill(){
        return $this->hasMany(Skill::class);
    }
}
