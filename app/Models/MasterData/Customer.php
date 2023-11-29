<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // declare table
    public $table = 'customer';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // declare fillable
    protected $fillable = [
        'nama',
        'no_tlp',
        'created_at',
        'updated_at',
    ];
}
