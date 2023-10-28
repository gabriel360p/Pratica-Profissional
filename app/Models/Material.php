<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome',
        'item_id',
        'categoria_id',
    ];

    /**
     * Nome da tabela no banco.
     *
     * @var string
     */
    protected $table = 'materiais';

}
