<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// request
use App\Http\Requests\MasterData\Customer\StoreCustomerRequest;

// model
use App\Models\MasterData\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();

        return view('pages.master-data.customer.index', compact('customer'));
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
    public function store(StoreCustomerRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // store to database
        $customer = Customer::create($data);

        alert()->success('Sukses', 'Data Customer berhasil ditambahkan');
        return redirect()->route('backsite.order.index');
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
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    public function form_tambah_pelanggan(Request $request)
    {
        if ($request->ajax()) {
            $msg = [
                'data' => view('pages.master-data.customer.form_tambah_pelanggan')->render()
            ];

            return response()->json($msg);
        }
    }

    public function form_cari_pelanggan(Request $request)
    {
        if ($request->ajax()) {
            $data = [
                'customer' => Customer::all()
            ];

            $msg = [
                'data' => view('pages.master-data.customer.form_cari_pelanggan', $data)->render()
            ];

            return response()->json($msg);
        }
    }
}
