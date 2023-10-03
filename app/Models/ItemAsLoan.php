<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAsLoan extends Model
{
    use HasFactory;

    protected $fillable=[
        'item_id',
        'loan_id',
        'loan_status',
        'return_status',
    ];
}
