@extends('layouts.app', [
    'page' => 'Sub Kriteria',
])

@section('content')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

<div class="container-fluid">
<div class="row">
    @foreach ($kriterias as $row => $kriteria)  
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-8 text-left">
                        <h4>{{ $kriteria->nama }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $kriteria->id }}">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kriteria->sub as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->nilai }}</td>
                        <td>
                            <form action="{{ route('hapus_sub', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sub.modals.createOrUpdate')
    
    @endforeach
</div>
</div>

@endsection

@push('style')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css')}}">
   <link rel="stylesheet" href="{{asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css')}}">
   <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('script')
 <!-- DataTables  & Plugins -->
 <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
 <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
 <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
 <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

  <!-- SweetAlert2 -->
  <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
  <script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js') }}"></script>

{{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}

<script>
    // Fungsi untuk menghilangkan alert setelah beberapa detik
    function hideAlert() {
            var alertBox = document.querySelector('.alert');

            if (alertBox) {
                setTimeout(function () {
                    alertBox.remove();
                }, 5000); // Mengatur durasi tampilan alert dalam milidetik (5 detik dalam contoh ini)
            }
        }

        // Panggil fungsi hideAlert setelah halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            hideAlert();
        });

    $(document).ready(function() {
        var message = '{{ session('message') }}';

        if(message){
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: message,
            });
        }

        $('#createNewItem').click(function() {
            setTimeout(function() {
                $('#nama').focus();
            }, 500);
            $('#saveBtn').removeAttr('disabled');
            $('#saveBtn').html("Simpan");
            $('#item_id').val('');
            $('#itemForm').trigger("reset");
            $('.modal-title').html("Tambah Sub Kriteria");
            $('#modal-md').modal('show');
        });

        // $('body').on('click', '#editItem', function() {
        //     var item_id = $(this).data('id');
        //     $.get("{{ route('subcriteria.index') }}" + '/' + item_id + '/edit', function(data) {
        //         $('#modal-md').modal('show');
        //         setTimeout(function() {
        //             $('#nama').focus();
        //         }, 500);
        //         $('.modal-title').html("Edit Sub Kriteria");
        //         $('#saveBtn').removeAttr('disabled');
        //         $('#saveBtn').html("Simpan");
        //         $('#item_id').val(data.id);
        //         $('#nama').val(data.nama);
        //         $('#status').val(data.status);
        //         $('#tipe').val(data.tipe);
        //         $('#bobot').val(data.bobot);
        //     })
        // });

        // $('body').on('click', '.deleteBtn', function(e) {
        //     e.preventDefault();
        //     var confirmation = confirm("Apakah yakin untuk menghapus?");
        //     if (confirmation) {
        //         var item_id = $(this).data('id');
        //         var formData = new FormData($('#deleteDoc')[0]);
        //         $('.deleteBtn').attr('disabled', 'disabled');
        //         $('.deleteBtn').html('...');
        //         $.ajax({
        //             data: formData,
        //             url: "{{ route('subcriteria.index') }}" + '/' + item_id,
        //             contentType: false,
        //             processData: false,
        //             type: "POST",
        //             success: function(data) {
        //                 $('#deleteDoc').trigger("reset");
        //                 $('#sub-table').DataTable().draw();
        //                 toastr.success(data.message);
        //             },
        //             error: function(data) {
        //                 $('.deleteBtn').removeAttr('disabled');
        //                 $('.deleteBtn').html('Hapus');
        //                 // toastr.error(data.responseJSON.message)
        //                 toastr.error('Tidak bisa hapus data karena sudah digunakan')
        //             }
        //         });
        //     }
        // });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $('#saveBtn').attr('disabled', 'disabled');
            $('#saveBtn').html('Simpan ...');
            var formData = new FormData($('#itemForm')[0]);
            $.ajax({
                data: formData,
                url: "{{ route('subcriteria.store') }}",
                contentType: false,
                processData: false,
                type: "POST",
                success: function(data) {
                    $('#itemForm').trigger("reset");
                    $('#modal-md').modal('hide');
                    $('#sub-table').DataTable().draw();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    });
                },
                error: function(data) {
                    $('#saveBtn').removeAttr('disabled');
                    $('#saveBtn').html("Simpan");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oppss',
                        text: data.responseJSON.message,
                    });
                    $.each(data.responseJSON.errors, function(index, value) {
                        toastr.error(value);
                    });
                }
            });
        });
    });
</script>
@endpush