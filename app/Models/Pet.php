<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';
    protected $fillable = ['name', 'pet_type_id', 'is_active', 'age'];

    public function petType()
    {
        return $this->belongsTo(PetType::class);
    }
}
