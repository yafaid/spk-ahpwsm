@extends('dashboard.masteradmin')
@section('konten')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Data Karyawan</h1>
    </div>
    
    <!-- Modal Tambah Karyawan -->
    <div class="modal fade" id="modalTambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKaryawanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKaryawanLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah karyawan -->
                    <form action="{{ route('kartambah') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="notelp">No. Telp</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  Table Karyawan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                </div>
                <div class="col-md-6 m-auto d-flex justify-content-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKaryawan">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Tambah Data
                    </a>
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
                                            aria-label="Name: activate to sort column descending" style="width: 57px;">Nama
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 61px;">No Telp</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 49px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 31px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 68px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 68px;">Aksi</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">No Telp</th>
                                        <th rowspan="1" colspan="1">Alamat</th>
                                        <th rowspan="1" colspan="1">Email</th>
                                        <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($karyawan as $karyawan)
                                        <tr class="odd">
                                            <td class="sorting_1">{{ $karyawan->nama }}</td>
                                            <td>{{ $karyawan->notelp }}</td>
                                            <td>{{ $karyawan->alamat }}</td>
                                            <td>{{ $karyawan->email }}</td>
                                            <td>{{ $karyawan->jenis_kelamin }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modalEditKaryawan{{ $karyawan->id }}">
                                                    Edit
                                                </a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalHapusKaryawan{{ $karyawan->id }}">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Karyawan -->
                                        <div class="modal fade" id="modalEditKaryawan{{ $karyawan->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalEditKaryawanLabel{{ $karyawan->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditKaryawanLabel">Edit Karyawan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah karyawan -->
                                                        <form action="{{ route('karupdate', ['id' => $karyawan->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="{{ $karyawan->nama }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="notelp">No. Telp</label>
                                                                <input type="text" class="form-control" id="notelp"
                                                                    name="notelp" value="{{ $karyawan->notelp }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $karyawan->alamat }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" value="{{ $karyawan->email }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                <select class="form-control" id="jenis_kelamin"
                                                                    name="jenis_kelamin"
                                                                    value="{{ $karyawan->jenis_kelamin }}" required>
                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Hapus Karyawan -->
                                        <div class="modal fade" id="modalHapusKaryawan{{ $karyawan->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="modalHapusKaryawanLabel{{ $karyawan->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="modalHapusKaryawanLabel{{ $karyawan->id }}">Hapus Karyawan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus karyawan ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <a href="{{ route('karhapus', ['id' => $karyawan->id]) }}"
                                                            class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                Showing {{ $karyawans->firstItem() ?? 0 }} to {{ $karyawans->lastItem() ?? 0 }} of
                                {{ $karyawans->total() ?? 0 }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                {{ $karyawans->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
