<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// request
use App\Http\Requests\MasterData\KategoriBuah\StoreKategroiBuahRequest;
use App\Http\Requests\MasterData\KategoriBuah\UpdateKategroiBuahRequest;

// model
use App\Models\MasterData\KategoriBuah;

class KategoriBuahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_buah = KategoriBuah::orderBy('buah', 'asc')->get();

        return view('pages.master-data.kategori-buah.index', compact('kategori_buah'));
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
    public function store(StoreKategroiBuahRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // store to database
        $kategori_buah = KategoriBuah::create($data);

        alert()->success('Sukses', 'Kategori Buah berhasil ditambahkan');
        return redirect()->route('backsite.kategori_buah.index');
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
        $kategori_buah = KategoriBuah::find($decrypt_id);

        return view('pages.master-data.kategori-buah.edit', compact('kategori_buah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategroiBuahRequest $request, KategoriBuah $kategori_buah)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $kategori_buah->update($data);

        alert()->success('Sukses', 'Kategori Buah berhasil diupdate');
        return redirect()->route('backsite.kategori_buah.index');
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
        $kategori_buah = KategoriBuah::find($decrypt_id);

        // hapus satuan
        $kategori_buah->forceDelete();

        alert()->success('Sukses', 'Kategori Buah berhasil dihapus');
        return back();
    }
}
