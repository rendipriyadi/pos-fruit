<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use library here
use Illuminate\Support\Facades\DB;

// use model here
use App\Models\MasterData\ItemBuah;
use App\Models\MasterData\KategoriBuah;
use App\Models\Transaksi\Order;
use App\Models\Transaksi\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        // membuat no faktur otomatis
        $q = DB::table('order')->select(DB::raw('MAX(RIGHT(invoice, 4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        // get kategori buah
        $kategori_buah = KategoriBuah::all();
        //product
        if (request('search')) {
            $item_buah = ItemBuah::when(request('search'), function ($query) {
                return $query->where('nama', 'like', '%' . request('search') . '%');
            })
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        } else {
            $item_buah = ItemBuah::when(request('kategori_buah_id'), function ($query) {
                return $query->where('kategori_buah_id', request('kategori_buah_id'));
            })
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        }

        return view('pages.transaksi.order.create', compact('kd', 'item_buah', 'kategori_buah'));
    }

    // add to cart
    public function add_cart(Request $request, $id)
    {
        $item_buah = ItemBuah::find($id);
        $harga = $item_buah['harga'];

        OrderDetail::updateOrCreate(
            [
                'item_buah_id' => $id,
                'invoice_id'   => $request->invoice,
            ],
            [
                'qty'   => DB::raw('qty + 1'), // Increment qty by 1
                'total' => DB::raw('total + ' . $harga), // Increment total by the new price
            ]
        );

        alert()->success('Sukses', 'Produk berhasil ditambahkan ke cart');

        return back();
    }
    // get data cart
    public function get_cart(Request $request)
    {
        if ($request->ajax()) {
            $invoice = $request->invoice;

            $cart_data = OrderDetail::where('invoice_id', $invoice)->get();
            $total = DB::table('order_detail')
                ->where('invoice_id', $invoice)
                ->sum('total');

            $data = [
                'cart_data' => $cart_data,
                'total'     => $total
            ];

            $msg = [
                'data' => view('pages.transaksi.order.cart', $data)->render()
            ];

            return response()->json($msg);
        }
    }
    // add qty
    public function plus_qty($id)
    {
        $order_detail = OrderDetail::find($id);
        $qty = $order_detail['qty'];
        $item_buah_id = $order_detail['item_buah_id'];

        // cek harga produk
        $item_buah = ItemBuah::where('id', $item_buah_id)->first();
        $harga = $item_buah['harga'];

        // update qty
        $order_detail->update([
            'qty' => $qty + 1,
        ]);

        $hasil = $order_detail->refresh();
        $qty_update = $hasil['qty'];

        // update total
        $order_detail->update([
            'total' => $harga * $qty_update,
        ]);

        return back();
    }
    // min qty
    public function min_qty($id)
    {
        $order_detail = OrderDetail::find($id);
        $qty = $order_detail['qty'];
        $item_buah_id = $order_detail['item_buah_id'];

        // cek harga produk
        $item_buah = ItemBuah::where('id', $item_buah_id)->first();
        $harga = $item_buah['harga'];

        // update quantity
        $order_detail->update([
            'qty' => $qty - 1,
        ]);

        $hasil = $order_detail->refresh();
        $qty_update = $hasil['qty'];

        // update total
        $order_detail->update([
            'total' => $harga * $qty_update,
        ]);

        return back();
    }
    // delete cart
    public function delete_cart($id)
    {
        $cart = OrderDetail::find($id);

        // hapus cart
        $cart->forceDelete();

        alert()->success('Sukses', 'Data berhasil dihapus');
        return back();
    }
    // delete all cart
    public function clear_cart($id)
    {
        $cart = OrderDetail::where('invoice_id', $id)->forceDelete();

        alert()->success('Sukses', 'Data berhasil dihapus');
        return back();
    }
    // modal payment
    public function payment(Request $request)
    {
        if ($request->ajax()) {
            $data = [
                'no_invoice' => $request->no_invoice,
                'tgl_transaksi' => $request->tgl_transaksi,
                'customer' => $request->customer,
                'total_harga' => $request->total_harga
            ];

            $msg = [
                'data' => view('pages.transaksi.order.payment', $data)->render()
            ];

            return response()->json($msg);
        }
    }
    // save payment
    public function save_payment(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'jumlahuang' => 'required',
                'sisauang' => 'required',
            ]);

            $data = Order::create([
                'invoice'    => $request->no_invoice,
                'tgl_invoice' => $request->tgl_transaksi,
                'customer'  => $request->customer,
                'total_harga' => str_replace(["Rp", ".", ",",], "", $request->totalbayar),
                'jumlah_uang' => str_replace(".", "", $request->jumlahuang),
                'sisa_uang' => str_replace(".", "", $request->sisauang)
            ]);

            $msg = [
                'cetakinvoice' => view('pages.transaksi.order.cetak_invoice', $data)->render(),
                'sukses' => 'Transaksi berhasil disimpan',
            ];

            return response()->json($msg);
        }
    }
}
