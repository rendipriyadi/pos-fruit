<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\MasterData\ItemBuah;

// request
use App\Http\Controllers\Controller;
use App\Models\MasterData\KategoriBuah;

// model
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MasterData\ItemBuah\StoreItemBuahRequest;
use App\Http\Requests\MasterData\ItemBuah\UpdateItemBuahRequest;

class ItemBuahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_buah = KategoriBuah::orderBy('buah', 'asc')->get();
        $item_buah = ItemBuah::orderBy('nama', 'asc')->get();

        return view('pages.master-data.item-buah.index', compact('kategori_buah', 'item_buah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemBuahRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['harga'] = str_replace(',', '', $data['harga']);
        $data['harga'] = str_replace('IDR ', '', $data['harga']);

        // store to database
        $item_buah = ItemBuah::create($data);

        alert()->success('Sukses', 'Item Buah Berhasil Ditambahkan');
        return redirect()->route('backsite.item_buah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // deskripsi id
        $decrypt_id = decrypt($id);
        $item_buah = ItemBuah::find($decrypt_id);

        $kategori_buah = KategoriBuah::orderBy('buah', 'asc')->get();

        return view('pages.master-data.item-buah.edit', compact('item_buah', 'kategori_buah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemBuahRequest $request, ItemBuah $item_buah)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['harga'] = str_replace(',', '', $data['harga']);
        $data['harga'] = str_replace('IDR ', '', $data['harga']);

        // update to database
        $item_buah->update($data);

        alert()->success('Sukses', 'Item Buah Berhasil diupdate');
        return redirect()->route('backsite.item_buah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deskripsi id
        $decrypt_id = decrypt($id);
        $item_buah = ItemBuah::find($decrypt_id);

        // hapus satuan
        $item_buah->forceDelete();

        alert()->success('Sukses', 'Item Buah berhasil dihapus');
        return back();
    }
}
