<?php

namespace App\Models\MasterData;

use App\Models\Transaksi\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBuah extends Model
{
    // declare table
    public $table = 'item_buah';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // declare fillable
    protected $fillable = [
        'kategori_buah_id',
        'nama',
        'unit',
        'harga',
        'created_at',
        'updated_at',
    ];

    public function kategori_buah()
    {
        return $this->belongsTo(KategoriBuah::class, 'kategori_buah_id', 'id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'item_buah_id');
    }
}
