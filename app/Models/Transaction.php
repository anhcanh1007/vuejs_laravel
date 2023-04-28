<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    public $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = [
        'id_user',
        'id_transaction',
        'deposit_amount',
        'status',
        'payment',
        'fullname'
    ];

    use SoftDeletes;
}
