<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['start_date' => 'date', 'end_date'=> 'date'];

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

    public function getFormatedStartDateAttribute(){
        if ($this->start_date) {
            if ($this->start_date->diffInHours() > 24) {
                return $this->start_date->toFormattedDateString('d/m/Y');
            }
        }

        return  $this->start_date->diffForHumans();

    }
    public function getFormatedEndDateAttribute(){
        if ($this->end_date) {
            if ($this->end_date->diffInHours() > 24) {
                return $this->end_date->toFormattedDateString('d/m/Y');
            }
        }

        return  $this->end_date->diffForHumans();

    }


}
