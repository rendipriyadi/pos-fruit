<?php

namespace App\Models\Transaksi;

use App\Models\MasterData\ItemBuah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // declare table
    public $table = 'order_detail';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // declare fillable
    protected $fillable = [
        'invoice_id',
        'item_buah_id',
        'qty',
        'total',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function item_buah()
    {
        return $this->belongsTo(ItemBuah::class, 'item_buah_id', 'id');
    }
    // one to many
    public function order()
    {
        return $this->hasMany(Order::class, 'invoice_id');
    }
}
