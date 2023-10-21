<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_usual',
        'identificacao',
        'campus',
        'email',
        'sexo',
        'cpf',
        'foto',
        'data_de_nascimento',
        'email_academico',
        'email_google_classroom',
        'email_preferencial',
        'email_secundario',
        'nome',
        'nome_registro',
        'nome_social',
        'primeiro_nome',
        'tipo_usuario',
        'ultimo_nome',
    ];
}
