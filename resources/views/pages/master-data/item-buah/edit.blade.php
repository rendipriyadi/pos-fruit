@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Item Buah')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Item Buah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Item Buah</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Isi input <code>required</code>, Sebelum menekan tombol submit. </p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('backsite.item_buah.update', [$item_buah->id]) }}"
                                            method="POST">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="nama">Item Buah <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control"
                                                            value="{{ old('nama', isset($item_buah->nama) ? $item_buah->nama : '') }}"
                                                            autocomplete="off">

                                                        @if ($errors->has('nama'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('nama') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="kategori_buah_id">Kategori
                                                        Buah <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="kategori_buah_id" id="kategori_buah_id"
                                                            class="form-control select2">
                                                            <option value="{{ '' }}" disabled selected>Choose
                                                            </option>
                                                            @foreach ($kategori_buah as $key => $kategori_buah_item)
                                                                <option value="{{ $kategori_buah_item->id }}"
                                                                    {{ $kategori_buah_item->id == $item_buah->kategori_buah_id ? 'selected' : '' }}>
                                                                    {{ $kategori_buah_item->buah }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('kategori_buah_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('kategori_buah_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="unit">Unit <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="unit" id="unit" class="form-control select2">
                                                            <option value="{{ '' }}" disabled selected>Choose
                                                            </option>
                                                            <option value="kg"
                                                                {{ $item_buah->unit == 'kg' ? 'selected' : '' }}>kg</option>
                                                            <option value="pcs"
                                                                {{ $item_buah->unit == 'pcs' ? 'selected' : '' }}>pcs
                                                            </option>
                                                            <option value="pack"
                                                                {{ $item_buah->unit == 'pack' ? 'selected' : '' }}>pack
                                                            </option>
                                                        </select>

                                                        @if ($errors->has('unit'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('unit') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="harga">Harga <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="harga" name="harga"
                                                            class="form-control"
                                                            value="{{ old('harga', isset($item_buah->harga) ? $item_buah->harga : '') }}"
                                                            autocomplete="off"
                                                            data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': 0, 'prefix': 'IDR ', 'placeholder': '0'"
                                                            required>

                                                        @if ($errors->has('harga'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('harga') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                    </div>

                                    <div class="form-actions text-right">
                                        <a href="{{ route('backsite.item_buah.index') }}" style="width:120px;"
                                            class="btn bg-blue-grey text-white mr-1"
                                            onclick="return confirm('Yakin ingin menutup halaman ini? , Setiap perubahan yang Anda buat tidak akan disimpan.')">
                                            <i class="ft-x"></i> Cancel
                                        </a>
                                        <button type="submit" style="width:120px;" class="btn btn-cyan"
                                            onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini ?')">
                                            <i class="la la-check-square-o"></i> Submit
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

    </div>
    </div>
    <!-- END: Content-->

@endsection
