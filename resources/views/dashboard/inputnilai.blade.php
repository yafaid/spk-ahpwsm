@extends('dashboard.masteradmin')
@section('konten')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Nilai Karyawan</h1>
    </div>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12 m-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Bobot</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-lg">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 57px;">
                                            Kriteria
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 57px;">
                                            Bobot
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $item)
                                        <tr class="odd">
                                            <td class="sorting_1">{{ $item->kriteria }}</td>
                                            <td>{{ $item->n_awal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Karyawan</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKaryawan">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Tambah Nilai Karyawan
                    </a>
                    <a href="{{ route('resetkaryawan') }}" class="btn btn-danger ml-1 >
                        <span class="icon text-white-50">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Reset Penilaian
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($karyawann->count() > 0)
                <div class="table-responsive-lg">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 2px;">
                                                Peringkat
                                            </th>
                                            <th style="width: 2px;">
                                                Kriteria
                                            </th>
                                            <th style="width: 2px;">
                                                Nilai
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawann as $key => $karyawan)
                                            <tr class="odd">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $karyawan->nama }}</td>
                                                <td>{{ $karyawan->nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p>Tidak ada data karyawan yang ditampilkan.</p>
            @endif

        </div>
        <div class="modal fade" id="modalNilaiKaryawan" tabindex="-1" role="dialog"
            aria-labelledby="modalNilaiKaryawanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKaryawanLabel">Nilai Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="nilaiKaryawanForm" method="POST" action="{{ route('nilkaryawan') }}">
                            @csrf

                            <div class="form-group">
                                <label for="karyawan">Karyawan</label>
                                <select class="form-control" id="karyawan" name="karyawan" required>
                                    @foreach ($karyawanf as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach ($kriterias as $kriteria)
                                <div class="form-group">
                                    <label for="nilai{{ $kriteria->id }}">{{ $kriteria->kriteria }}</label>
                                    <input type="number" class="form-control" id="nilai{{ $kriteria->id }}"
                                        name="nilai[{{ $kriteria->id }}]" min="0" max="100" required>
                                </div>
                            @endforeach

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Hitung Nilai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
