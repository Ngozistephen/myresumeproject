<?php

namespace App\Models;

use App\Models\Porfolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function porfolio(){
        return $this->belongsTo(Porfolio::class);
    }
}
