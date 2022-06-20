<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
    */  
    protected $model = Training::class;
    
    /*
     * @return array
     */
    public function definition()
    {
        return [
            
            'company_name'=> $this->faker->sentence(10),
            'certification_acquired'=>$this->faker->sentence(10),
            'content'=>Str::random(50),
            'end_date'=>new Carbon($this->faker->dateTime), 
            'start_date'=>new Carbon($this->faker->dateTime), 
            'published_at'=>new Carbon($this->faker->dateTime), 
        ];
    }
}
