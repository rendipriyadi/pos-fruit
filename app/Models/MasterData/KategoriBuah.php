<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuah extends Model
{
    // declare table
    public $table = 'kategori_buah';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // declare fillable
    protected $fillable = [
        'buah',
        'created_at',
        'updated_at',
    ];

    public function item_buah()
    {
        return $this->hasMany(ItemBuah::class, 'kategori_buah_id');
    }
}
