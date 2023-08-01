<!-- Modal Create And Edit -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="itemForm" name="itemForm" method="post">
        @csrf
        <input type="hidden" name="item_id" id="item_id">
        <div class="modal-body">
            <div class="form-group">
                <label for="nama">Nama<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="status">Status<span class="text-danger">*</span></label>
                <select class="custom-select" name="status" id="status">
                    <option selected disabled>--Pilih Status--</option>
                    @foreach ($statues as $status)
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control form-control-sm mr-2" name="status" id="status"> --}}
            </div>
            <div class="form-group">
                <label for="tipe">tipe<span class="text-danger">*</span></label>
                <select class="custom-select" name="tipe" id="tipe">
                    <option selected disabled>--Pilih Tipe--</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nama }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control form-control-sm mr-2" name="tipe" id="tipe"> --}}
            </div>
            <div class="form-group">
                <label for="bobot">bobot<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="bobot" id="bobot">
            </div>
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal" aria-label="Close">Close</button> --}}
            <button type="button" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
