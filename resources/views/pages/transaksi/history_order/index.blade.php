@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block">Riwayat Transaksi</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Riwayat Transaksi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table card --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List Riwayat Transaksi</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="mb-0 list-inline">
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
                                                <thead align="center">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Invoice</th>
                                                        <th>Tanggal</th>
                                                        <th>Customer</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
                                                    @forelse($transaksi as $key => $transaksi_item)
                                                        <tr data-entry-id="{{ $transaksi_item->id }}">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $transaksi_item->invoice ?? '' }}</td>
                                                            <td>{{ date('d F Y', strtotime($transaksi_item->tgl_invoice)) ?? '' }}
                                                            </td>
                                                            <td>{{ $transaksi_item->customer ?? '' }}</td>
                                                            <td>Rp.
                                                                {{ number_format($transaksi_item->total_harga, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Invoice</th>
                                                        <th>Tanggal</th>
                                                        <th>Customer</th>
                                                        <th>Total</th>
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
    <script>
        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });
    </script>
@endpush
