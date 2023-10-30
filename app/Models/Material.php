<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome',
    ];


    public function item()
    {
        return $this->hasOne(Item::class);
    }
    
    //o mesmo material pode pertencer a vários categorias
    public function categorias(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }

}
