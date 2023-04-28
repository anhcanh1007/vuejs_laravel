<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    public $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = [
        'name',
    ];

    use SoftDeletes;

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }
}
