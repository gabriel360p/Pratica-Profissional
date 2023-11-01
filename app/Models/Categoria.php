<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];

    /**
     * The roles that belong to the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    //a mesma categoria pode pertencer a vários materiais
    public function materiais(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }
}
