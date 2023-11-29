<!-- Modal -->
<div class="modal fade" id="modalcari" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalpembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-inputs-searching default-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customer as $key => $customer_item)
                            <tr data-entry-id="{{ $customer_item->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $customer_item->nama ?? '' }}</td>
                                <td>{{ $customer_item->no_tlp ?? '' }}</td>
                                <td class="text-center">
                                    <div class="btn-group mr-1 mb-1">
                                        <button type="button" class="btn btn-info btn-sm"
                                            onclick="pilih('{{ $customer_item->nama }}')">Pilih</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- not found --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function pilih(nama) {
        $('#customer').val(nama);

        $('#modalcari').modal('hide');
    }

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
