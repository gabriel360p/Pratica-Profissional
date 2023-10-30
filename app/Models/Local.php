<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable=[
        'nome'
    ];


    public function item()
    {
        return $this->hasOne(Item::class);
    }

}
