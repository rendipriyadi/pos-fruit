<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // declare table
    public $table = 'order';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // declare fillable
    protected $fillable = [
        'invoice',
        'tgl_invoice',
        'customer',
        'total_harga',
        'jumlah_uang',
        'sisa_uang',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function order_detail()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo(OrderDetail::class, 'invoice', 'invoice_id');
    }
}
