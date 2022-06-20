<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Porfolio;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PorfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     */

     protected $model = Porfolio::class;
     /*
     * @return array
     */
    public function definition()
    {

        // $paragraphs = $this->faker->paragraphs(50);
        // $content = '';

        // foreach ($paragraphs as $p) {
        //     $content = $content . "<p>$p<p>";
        // }
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'job_title'=> $this->faker->sentence(10),
            'project_name'=>$this->faker->sentence(10),
            'content'=>Str::random(100),
            'featured_img'=> 'porfolio_files/default.jpg',
            'end_date'=>new Carbon($this->faker->dateTime), 
            'start_date'=>new Carbon($this->faker->dateTime), 
            'published_at'=>new Carbon($this->faker->dateTime), 
        ];
    }
}
