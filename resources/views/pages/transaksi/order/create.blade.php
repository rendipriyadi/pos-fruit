@extends('layouts.app')

{{-- set title --}}
@section('title', 'Penjualan')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <a href="{{ route('backsite.order.index') }}" class="btn btn-cyan mb-2">Kembali</a>

            {{-- add card --}}
            <div class="content-body">
                <section id="add-home">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">No. Faktur</label>
                                                <input type="text" name="no_invoice" id="no_invoice" class="form-control"
                                                    value="{{ 'V-' . date('dmy') . '-' . $kd }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Tgl. Transaksi</label>
                                                <input type="date" name="tgl_transaksi" id="tgl_transaksi"
                                                    class="form-control" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Pelanggan</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Pelanggan"
                                                        name="customer" id="customer" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="button"
                                                            id="tombolCariPelanggan"><i class="bx bx-search-alt-2"
                                                                title="Cari Pelanggan"></i></button>
                                                        <button class="btn btn-outline-success" type="button"
                                                            id="tombolTambahPelanggan"><i class="bx bx-plus"
                                                                title="Tambah Pelanggan"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card" style="min-height:85vh">
                                <div class="card-header bg-white">
                                    <form action="{{ route('backsite.order.index') }}" method="get">
                                        <div class="row">
                                            <div class="col-3">
                                                <h4 class="font-weight-bold">Produk</h4>
                                            </div>
                                            <div class="col-3">
                                                <select name="category_id" id="category_id"
                                                    class="form-control form-control-sm select2" style="font-size: 12px"
                                                    onblur="this.form.submit()">
                                                    <option value="" holder>Filter Category</option>
                                                    @foreach ($kategori_buah as $key => $kategori_buah_item)
                                                        <option value="{{ $kategori_buah_item->id }}">
                                                            {{ $kategori_buah_item->buah }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4"><input type="text" name="search"
                                                    class="form-control col-sm-12 float-right"
                                                    placeholder="Search Product..." onblur="this.form.submit()"></div>
                                            <div class="col-sm-2"><button type="submit"
                                                    class="btn btn-primary btn-sm float-right btn-block">Cari
                                                    Product</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($item_buah as $product)
                                            <div style="width: 25%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                                                <div class="productCard">
                                                    <div class="view overlay">
                                                        <form action="{{ route('backsite.order.add_cart', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="invoice" id="invoice"
                                                                value="{{ 'V-' . date('dmy') . '-' . $kd }}">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm cart-btn"><i
                                                                    class="bx bx-cart"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="card-body">
                                                        <label class="card-text text-center font-weight-bold"
                                                            style="text-transform: capitalize;">
                                                            {{ Str::words($product->nama, 4) }}
                                                        </label>
                                                        <p class="card-text text-center">Rp.
                                                            {{ number_format($product->harga, 0, ',', '.') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center align-bottom">
                                        {{ $item_buah->links('pagination::bootstrap-4') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card" style="min-height:60vh">
                                <div class="card-body">
                                    <div style="overflow-y:auto;min-height:53vh;max-height:53vh">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="30%">Item Buah</th>
                                                    <th width="35%">Qty</th>
                                                    <th width="30%" class="text-right">Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tampilData">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <form
                                                action="{{ route('backsite.order.clear_cart', 'V-' . date('dmy') . '-' . $kd) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-info btn-lg btn-block"
                                                    style="padding:1rem!important"
                                                    onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');"
                                                    type="submit">Clear</button>
                                            </form>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-success btn-lg btn-block"
                                                style="padding:1rem!important" id="tombolPay">Pay</button>
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
    <div class="viewmodal" style="display: none;"></div>

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/third-party/sweetalert2/sweetalert2.min.css') }}">
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                width: 100%;
                height: 100%;
                padding: 0.9rem 0.9rem
            }
        }

        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        .cart-btn {
            /* position: absolute; */
            display: block;
            top: 5%;
            right: 5%;
            cursor: pointer;
            transition: all 0.3s linear;
            padding: 0.6rem 0.8rem !important;

        }

        .productCard {
            cursor: pointer;

        }

        .productCard:hover {
            border: solid 1px rgb(172, 172, 172);

        }
    </style>
@endpush

@push('after-script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
    {{-- inputmask --}}
    <script src="{{ asset('/assets/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>
    <script src="{{ asset('/assets/third-party/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        function tampilDataTemp() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let invoice = $('#invoice').val();
            $.ajax({
                type: "post",
                url: "{{ route('backsite.order.get_cart') }}",
                data: {
                    invoice: invoice
                },
                dataType: "json",
                beforeSend: function() {
                    $('.tampilData').html('<i class="bx bx-balloon bx-flasing"></i>');
                },
                success: function(response) {
                    if (response.data) {
                        $('.tampilData').html(response.data);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }

        jQuery(document).ready(function($) {
            tampilDataTemp();
            // create customer
            $('#tombolTambahPelanggan').click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $.ajax({
                    url: "{{ route('backsite.customer.form_tambah_pelanggan') }}",
                    dataType: "json",
                    success: function(response) {
                        if (response.data) {
                            $('.viewmodal').html(response.data).show();
                            $('#modaltambah').modal('show');
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });

            // search customer
            $('#tombolCariPelanggan').click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $.ajax({
                    url: "{{ route('backsite.customer.form_cari_pelanggan') }}",
                    dataType: "json",
                    success: function(response) {
                        if (response.data) {
                            $('.viewmodal').html(response.data).show();
                            $('#modalcari').modal('show');
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });
            // create customer
            $('#tombolPay').click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $.ajax({
                    url: "{{ route('backsite.order.payment') }}",
                    dataType: "json",
                    data: {
                        no_invoice: $('#no_invoice').val(),
                        tgl_transaksi: $('#tgl_transaksi').val(),
                        customer: $('#customer').val(),
                        total_harga: $('#total_harga').val()
                    },
                    success: function(response) {
                        if (response.data) {
                            $('.viewmodal').html(response.data).show();
                            $('#modalpayment').modal('show');
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });
        });

        // Date Picker
        const fpDate = flatpickr('#tgl_transaksi', {
            altInput: true,
            altFormat: 'd F Y',
            dateFormat: 'Y-m-d',
            disableMobile: 'true',
        });

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
