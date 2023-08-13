@extends('layouts.app', [
    'page' => 'Penilaian Karyawan'
])

@section('content')
@if (session('success'))
        <div class="alert alert-success" id="success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" id="error">
            {{ session('error') }}
        </div>
    @endif
<div class="row d-flex justify-content-center">
    <div class="col-lg-10">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="table-responsive">
                    <form action="{{ route('penilaian.store') }}" method="post">
                        <div class="col-12 text-right">
                            <button id="createNewItem" class="btn btn-warning btn-sm mb-3">Simpan</button>
                        </div>
                        @csrf
                        <table class="table">
                            <thead class="text-sm text-center">
                                <tr>
                                    <th>Nama</th>
                                    @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alternatives as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama }}</td>
                                        @if (count($valt->penilaian) > 0)
                                            @foreach ($criterias as $key => $value)
                                            <td>
                                                <select class="custom-select" name="sub_id[{{ $valt->id }}][]" id="">
                                                    @foreach ($value->sub as $k_1 => $v_1)
                                                        <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->sub_id ? 'selected' : '' }}>{{ $v_1->keterangan }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        @endforeach
                                        @else
                                            @foreach ($criterias as $key => $value)
                                                <td>
                                                    <select class="custom-select" name="sub_id[{{ $valt->id }}][]" id="">
                                                        @foreach ($value->sub as $k_1 => $v_1)
                                                            <option value="{{ $v_1->id }}">{{ $v_1->keterangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td>tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css')}}">
   <link rel="stylesheet" href="{{asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css')}}">
   <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endsection
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
<script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
<script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

<script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
<script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js') }}"></script>

<script>
    // Menunggu 5 detik (5000 milidetik) sebelum menghilangkan pesan sukses
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 5000);

    // Menunggu 5 detik (5000 milidetik) sebelum menghilangkan pesan error
    setTimeout(function() {
        document.getElementById('error').style.display = 'none';
    }, 5000);
    
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

        $(document).ready(function(){
            var message = '{{ session('message') }}';

            if(message){
                Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: message,
                });
            }
        });
</script>
@endsection