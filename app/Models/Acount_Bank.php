<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acount_Bank extends Model
{
    use HasFactory;


    protected $table = 'account_banks';
    public $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = [
        'name',
        'account_number',
        'branch',
        'bank_id'
    ];
    use SoftDeletes;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
