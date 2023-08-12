<!-- Modal Create And Edit -->
<div class="modal fade" id="exampleModal{{ $kriteria->id }}">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="" name="" action="{{ route('subcriteria.store') }}" method="post">
        @csrf
        <input type="hidden" name="criteria_id" id="criteria_id" value="{{ $kriteria->id }}">
        <div class="modal-body">
            <div class="form-group">
                <label for="keterangan">Keterangan<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="keterangan" id="keterangan" required>
            </div>
            
            <div class="form-group">
                <label for="status">nilai<span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-sm mr-2" name="nilai" id="nilai" required>
                </select>
                {{-- <input type="text" class="form-control form-control-sm mr-2" name="status" id="status"> --}}
            </div>
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal" aria-label="Close">Close</button> --}}
            <button type="submit" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="editModal{{ $item->id }}">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="" name="" action="{{ route('update_sub', ['id' => $item->id]) }}" method="post">
        @csrf
        {{-- <input type="text" value="{{ $item->id }}"> --}}
        <div class="modal-body">
            <div class="form-group">
                <label for="keterangan">Keterangan<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="keterangan" value="{{ $item->keterangan }}" id="keterangan" required>
            </div>
            
            <div class="form-group">
                <label for="status">nilai<span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-sm mr-2" name="nilai" value="{{ $item->nilai }}" id="nilai" required>
                </select>
                {{-- <input type="text" class="form-control form-control-sm mr-2" name="status" id="status"> --}}
            </div>
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal" aria-label="Close">Close</button> --}}
            <button type="submit" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
