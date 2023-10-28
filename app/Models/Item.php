<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * Nome da tabela no banco.
     *
     * @var string
     */
    protected $table = 'itens';

    protected $fillable=[
        // 'nome',
        'estado',
        'local_id',
        'material_id',
        'foto',
    ];
}
