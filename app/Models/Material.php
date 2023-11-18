<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];


    public function item()
    {
        return $this->hasOne(Item::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
