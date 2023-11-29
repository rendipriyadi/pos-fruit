<!-- Modal -->
<div class="modal fade" id="modaltambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalpembayaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form form-horizontal" action="{{ route('backsite.customer.store') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="nama">Nama <code
                                style="color:red;">required</code></label>
                        <div class="col-md-9 mx-auto">
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="example John Doe or Jane" value="{{ old('nama') }}" autocomplete="off"
                                required>

                            @if ($errors->has('nama'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('nama') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="no_tlp">No tlp <code
                                style="color:red;">required</code></label>
                        <div class="col-md-9 mx-auto">
                            <input type="number" id="no_tlp" name="no_tlp" class="form-control"
                                placeholder="08xxxx" value="{{ old('no_tlp') }}" autocomplete="off" required>

                            @if ($errors->has('no_tlp'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('no_tlp') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                        onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini ?')">
                        <i class="la la-check-square-o"></i> Submit
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
