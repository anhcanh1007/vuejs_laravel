<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory,Notifiable;

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

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
