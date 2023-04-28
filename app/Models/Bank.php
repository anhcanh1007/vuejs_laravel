<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory;


    protected $table = 'banks';
    public $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = [
        'name',
        'payment_id'
    ];

    use SoftDeletes;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
