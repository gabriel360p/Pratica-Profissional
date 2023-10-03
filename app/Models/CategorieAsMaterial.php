<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieAsMaterial extends Model
{
    use HasFactory;
    protected $fillable=[
        'material_id',
        'categorie_id',
    ];
}
