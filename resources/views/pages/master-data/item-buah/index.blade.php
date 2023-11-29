@extends('layouts.app')

{{-- set title --}}
@section('title', 'Item Buah')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Item Buah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Item Buah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            <div class="content-body">
                <section id="add-home">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <a data-action="collapse">
                                        <h4 class="card-title text-white">Tambah Data</h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>

                                <div class="card-content collapse hide">
                                    <div class="card-body card-dashboard">

                                        <form class="form form-horizontal" action="{{ route('backsite.item_buah.store') }}"
                                            method="POST">

                                            @csrf

                                            <div class="form-body">
                                                <div class="form-section">
                                                    <p>Isi input <code>required</code>, Sebelum menekan tombol submit. </p>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="nama">Item Buah <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control"
                                                            placeholder="example vietnam apple or chinnese apple"
                                                            value="{{ old('nama') }}" autocomplete="off">

                                                        @if ($errors->has('nama'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('nama') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="kategori_buah_id">Kategori
                                                        Buah
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="kategori_buah_id" id="kategori_buah_id"
                                                            class="form-control select2">
                                                            <option value="{{ '' }}" disabled selected>Choose
                                                            </option>
                                                            @foreach ($kategori_buah as $key => $kategori_buah_item)
                                                                <option value="{{ $kategori_buah_item->id }}">
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
                                                            <option value="kg">kg</option>
                                                            <option value="pcs">pcs</option>
                                                            <option value="pack">pack</option>
                                                        </select>

                                                        @if ($errors->has('unit'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('unit') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="harga">Harga<code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="harga" name="harga"
                                                            class="form-control" placeholder="example Harga 10000"
                                                            value="{{ old('harga') }}" autocomplete="off"
                                                            data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': 0, 'prefix': 'IDR ', 'placeholder': '0'">

                                                        @if ($errors->has('harga'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('harga') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions text-right">
                                                <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                    onclick="return confirm('Are you sure want to save this data ?')">
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

            {{-- table card --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Item Buah List</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered text-inputs-searching default-table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center; width:50px;">No</th>
                                                        <th>Item Buah</th>
                                                        <th>Kategori Buah</th>
                                                        <th>Unit</th>
                                                        <th>Harga</th>
                                                        <th style="text-align:center; width:150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item_buah as $key => $item_buah_item)
                                                        <tr data-entry-id="{{ $item_buah_item->id }}">
                                                            <th class="text-center">{{ $loop->iteration }}</th>
                                                            <td>{{ $item_buah_item->nama ?? '' }}</td>
                                                            <td>{{ $item_buah_item->kategori_buah->buah ?? '' }}</td>
                                                            <td>{{ $item_buah_item->unit ?? '' }}</td>
                                                            <td>{{ 'IDR ' . number_format($item_buah_item->harga) ?? '' }}
                                                            </td>
                                                            <td class="text-center">

                                                                <div class="btn-group mr-1 mb-1">
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('backsite.item_buah.edit', encrypt($item_buah_item->id)) }}">
                                                                            Edit
                                                                        </a>
                                                                        <form
                                                                            action="{{ route('backsite.item_buah.destroy', encrypt($item_buah_item->id)) }}"
                                                                            method="POST"
                                                                            onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                            <input type="hidden" name="_method"
                                                                                value="DELETE">
                                                                            <input type="hidden" name="_token"
                                                                                value="{{ csrf_token() }}">
                                                                            <input type="submit" class="dropdown-item"
                                                                                value="Delete">
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Item Buah</th>
                                                        <th>Kategori Buah</th>
                                                        <th>Unit</th>
                                                        <th>Harga</th>
                                                        <th style="text-align:center; width:150px;">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

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

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });

        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
