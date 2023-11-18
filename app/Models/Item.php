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
        'estado',
        'local_id',
        'material_id',
        'foto',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class);
    }

}
