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
                <label for="absensi">Absensi (%)<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="absensi" id="absensi">
            </div>
            <div class="form-group">
                <label for="masa_kerja">Masa Kerja (Tahun)<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="masa_kerja" id="masa_kerja">
            </div>
            <div class="form-group">
                <label for="sikap">Sikap<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="sikap" id="sikap">
            </div>
            <div class="form-group">
                <label for="performa_kerja">Performa Kerja<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="performa_kerja" id="performa_kerja">
            </div>
            <div class="form-group">
                <label for="kedisiplinan">Kedisiplinan<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="kedisiplinan" id="kedisiplinan">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
