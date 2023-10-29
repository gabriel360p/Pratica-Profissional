<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\CategoriaMaterialPivot;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome',
    ];

    /**
     * Nome da tabela no banco.
     *
     * @var string
     */
    protected $table = 'materiais';

    public function itens(): HasMany {
        return $this->hasMany(Item::class);
    }

    public function categorias(): BelongsToMany {
        return $this->belongsToMany(
            Categoria::class,
            'categoria_material_pivot'
        )->using(CategoriaMaterialPivot::class);
    }
}
