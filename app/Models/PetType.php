<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    use HasFactory;

    protected $table = 'pet_types';
    protected $fillable = ['name', 'image_id', 'age_max', 'growth_factor'];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
