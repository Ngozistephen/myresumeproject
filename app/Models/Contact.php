<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'phone_number','social_medialinks'];

    protected $casts = ['social_medialinks' => 'array'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
