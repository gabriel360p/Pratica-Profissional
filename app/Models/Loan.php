<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_who_authorized_id',
        'user_who_delivered_id',
        'user_who_received_id',
        'user_who_returned_id',
    ];
}
