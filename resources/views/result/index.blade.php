@extends('layouts.app', [
    'page' => 'Hasil',
])

@section('content')


{{-- analisa --}}
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-12 text-left">
                        Analisa
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="table-responsive">
                    <table class="table text-sm text-center">
                        <thead class="text-center ">
                            <tr>
                                <th>Nama</th>
                                @foreach ($criterias as $key => $item)
                                    <th>{{$item->nama}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alternatives as $alt => $valt)
                                <tr>
                                    <td>{{ $valt->nama }}</td>
                                    @if (count($valt->penilaian) > 0)
                                        @foreach ($valt->penilaian as $key => $value )
                                            <td>{{ $value->sub->nilai ?? 'N/A' }}</td>
                                        @endforeach
                                    @endif
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- normalisasi --}}
<div class="row d-flex justify-content-center py-lg-3">
    <div class="col-lg-9">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-12 text-left">
                        Normalisasi
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="table-responsive">
                    <table class="table text-sm text-center">
                        <thead class="text-center ">
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($criterias as $key => $item)
                                    <th>{{$item->nama}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalisasi as $alternative => $criteriaValues)
                            <tr>
                                <td>{{ $alternative }}</td>
                                @foreach ($criterias as $criteria)
                                    <td>{{ $criteriaValues[$criteria->id] ?? 'N/A' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- hasil --}}
<div class="row d-flex justify-content-center py-lg-3">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-12 text-left">
                        Perankingan
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="table-responsive">
                    <table class="table text-sm text-center">
                        <thead class="text-center ">
                            <tr>
                                <th>Rank</th>
                                <th>Alternatif</th>
                                <th>Skor</th>
                                <th>Tunjangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rankings as $ranking)
                            <tr>
                                <td>{{ $ranking['rank'] }}</td>
                                <td>{{ $ranking['alternative'] }}</td>
                                <td>{{ $ranking['score'] }}</td>
                                <td>{{ $ranking['tunjangan'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-12 text-left">
                        Kesimpulan
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="table-responsive text-sm">
                    <p>
                        Berdasarkan hasil perhitungan SAW, alternatif terbaik adalah: 
                        @if (!empty($rankings))
                            @foreach ($rankings as $ranking)
                                @if ($ranking['rank'] === 1)
                                    {{ $ranking['alternative'] }} dengan skor {{ $ranking['score'] }} dan mendapatkan tunjangan {{ $ranking['tunjangan'] }}
                                @endif
                            @endforeach
                        @else
                            Tidak ada data perhitungan.
                        @endif
                    </p>
                </div>
                <div class="row d-flex">
                    <div class="col-12 text-left">
                        <a href="{{ route('print_data') }}" class="btn btn-sm btn-warning" >Cetak Hasil Perhitungan</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    
@endsection