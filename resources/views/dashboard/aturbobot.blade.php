@extends('dashboard.masteradmin')
@section('konten')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Atur Bobot AHP</h1>
    </div>

    {{-- tabel perbandingan --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-between mb-3">
                <div class="col-md-6 col-sm-12 m-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Perbandingan Berpasangan</h6>
                </div>
                <div class="col-md-6 col-sm-12 m-auto d-flex justify-content-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKriteria">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        Tambah Data
                    </a>
                    <a href="#" class="btn btn-danger ml-1" data-toggle="modal" data-target="#modalHapusKriteria">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        Hapus Data
                    </a>
                </div>
            </div>
            <div class="alert alert-primary m-2 text-primary">
                Berikut ini adalah skala perbandingan yang umum digunakan dalam AHP beserta penjelasan tiap angka:
                <br>1: Elemen sama pentingnya
                <br>- Artinya kedua elemen memiliki tingkat preferensi atau kepentingan yang sama.
                <br>

                <br>3: Elemen sedikit lebih penting
                <br>- Artinya satu elemen sedikit lebih penting daripada elemen lainnya.
                <br>- Perbedaan kepentingannya tergolong rendah atau tidak signifikan.
                <br>

                <br>5: Elemen lebih penting
                <br>- Artinya satu elemen lebih penting daripada elemen lainnya.
                <br>- Perbedaan kepentingannya cukup signifikan.
                <br>

                <br>7: Elemen sangat lebih penting
                <br>- Artinya satu elemen lebih penting daripada elemen lainnya.
                <br>- Artinya satu elemen lebih penting daripada elemen lainnya.
                <br>

                <br>9: Elemen mutlak lebih penting
                <br>- Artinya satu elemen mutlak lebih penting daripada elemen lainnya.
                <br>- Perbedaan kepentingannya sangat signifikan dan nyata.
                <br>

                <br>Untuk bilangan 2,4,6,8 menandakan skala yg berada ditengah diantara 2 elemen
            </div>
        </div>
        <div class="card-body">
            <table class="table-responsive-lg" id="tabel_1">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        @foreach ($kriterias as $kriterias)
                            <th scope="col">{{ $kriterias->kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $no2 = 1;
                    @endphp
                    @foreach ($kriteriass as $value)
                        <tr>
                            <th scope="row">{{ $value->kriteria }}</th>
                            @foreach ($kriteriass as $value)
                                @if ($no == $no2)
                                    <td>
                                        <select class="form-control" disabled
                                            id="{{ $no }}_atas_{{ $no2 }}">
                                            <option value="1">1</option>

                                        </select>
                                    </td>
                                @else
                                    @if ($no <= $no2)
                                        <td>
                                            <select class="form-control" id="{{ $no }}_atas_{{ $no2 }}"
                                                onchange="aa(this , '{{ $no2 }}_atas_{{ $no }}', '{{ $no }}', '{{ $no2 }}')">
                                                <option>Skala</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="0.5">0.5 | 1/2</option>
                                                <option value="0.3">0.3 | 1/3</option>
                                                <option value="0.25">0.25 | 1/4</option>
                                                <option value="0.2">0.2 | 1/5</option>
                                                <option value="0.16">0.16 | 1/6</option>
                                                <option value="0.14">0.14 | 1/7</option>
                                                <option value="0.125">0.125 | 1/8</option>
                                                <option value="0.11">0.11 | 1/9</option>
                                            </select>
                                        </td>
                                    @else
                                        <td>
                                            <select class="form-control" id="{{ $no }}_atas_{{ $no2 }}"
                                                disabled>
                                                <option></option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="0.5">0.5 | 1/2</option>
                                                <option value="0.3">0.3 | 1/3</option>
                                                <option value="0.25">0.25 | 1/4</option>
                                                <option value="0.2">0.2 | 1/5</option>
                                                <option value="0.16">0.16 | 1/6</option>
                                                <option value="0.14">0.14 | 1/7</option>
                                                <option value="0.125">0.125 | 1/8</option>
                                                <option value="0.11">0.11 | 1/9</option>
                                            </select>

                                        </td>
                                    @endif
                                @endif
                                @php
                                    $no2++;
                                @endphp
                            @endforeach
                        </tr>
                        @php
                            $no++;
                            $no2 = 1;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        @foreach ($kriteriass as $value)
                            <td><input type="text" class="form-control" disabled></td>
                        @endforeach
                    </tr>
                    <tfoot>
            </table>
        </div>
    </div>

    {{-- tabel bobot --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6 col-sm-12 m-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Bobot Perbandingan Berpasangan</h6>
                </div>

                <div class="col-md-6 col-sm-12 m-auto d-flex justify-content-end">
                    <button class="btn btn-primary" onclick="hitung()">
                        <i class="fas fa-running"></i> Generate
                    </button>

                    <button class="btn btn-primary ml-1" onclick="senData()">
                        <i class="fas fa-space-shuttle"></i> Send
                    </button>
                </div>
            </div>


        </div>
        <div class="card-body">
            {{-- <button onclick="bobot()">generate2</button> --}}
            <table class="table-responsive-lg" id="tabel_2">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        @foreach ($kriteriab as $kriterias)
                            <th scope="col">{{ $kriterias->kriteria }}</th>
                        @endforeach
                        <th scope="col">Total</th>
                        <th scope="col">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $no2 = 1;
                        $no3 = 0;
                    @endphp
                    @foreach ($kriteriass as $value)
                        <tr>
                            <th scope="row">{{ $value->kriteria }}</th>
                            @foreach ($kriteriass as $value)
                                @if ($no == $no2)
                                    <td>
                                        <input type="text" class="form-control" disabled
                                            id="{{ $no }}_bawah1_{{ $no2 }}" kor="{{ $no }}"
                                            kor2="{{ $no2 }}" kor3="{{ $no3 }}" onclick="hitung()">
                                        </select>
                                    </td>
                                @else
                                    @if ($no <= $no2)
                                        <td>
                                            <input type="text" class="form-control" disabled
                                                id="{{ $no }}_bawah1_{{ $no2 }}"
                                                kor="{{ $no }}" kor2="{{ $no2 }}"
                                                kor3="{{ $no3 }}" onclick="hitung()">
                                        </td>
                                    @else
                                        <td>
                                            <input type="text" class="form-control" disabled
                                                id="{{ $no }}_bawah1_{{ $no2 }}"
                                                kor="{{ $no }}" kor2="{{ $no2 }}"
                                                kor3="{{ $no3 }}" onclick="hitung()">
                                        </td>
                                    @endif
                                @endif
                                @php
                                    $no2++;
                                    $no3++;                                    
                                @endphp
                            @endforeach

                            <td>
                                <input type="text" class="form-control" id="totalmax" disabled>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="send_data" id="totalbobot" disabled>
                            </td>
                        </tr>
                        @php
                            $no++;                            
                            $no2 = 1;
                            $no3 = 0;
                        @endphp
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>

    {{-- modaltambahkriteria --}}
    <div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog"
        aria-labelledby="modalTambahKriteriaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKriteriaLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah karyawan -->
                    <form action="{{ route('bottambah') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modalhapuskriteria --}}
    <div class="modal fade" id="modalHapusKriteria" tabindex="-1" role="dialog"
        aria-labelledby="modalHapusKriteriaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusKriteriaLabel">Hapus Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah karyawan -->
                    {{-- <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Kriteria</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteriab as $kriterias)
                                <tr>
                                    <th>{{ $kriterias->kriteria }}</th>
                                    <th>
                                        <a href="{{ route('bothapus', ['id' => $kriterias->id]) }}" class="btn btn-danger">
                                            Hapus
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <form action="{{ route('bothapus') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kriteria</label>
                            <select class="form-control" name="kriteria">
                                @foreach ($kriteriab as $kriteria)
                                    <option value="{{ $kriteria->id }}">{{ $kriteria->kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function senData() {
            var data = [];
            $('#tabel_2 tr').each(function() {
                var totmarks = 0;
                $(this).find('#totalbobot').each(function() {

                    totalKolom1 = $(this).val();
                    data.push(totalKolom1);
                });
            });

            $.ajax({
                url: "/sendtest",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'data': data
                },
                success: function(data) {

                },
                error: function(data, exception) {

                }
            });


        }

        function bobot() {

            var totalKolom1 = 0;
            var panjangKolom1 = $('#tabel_2 tr').length;
            var kolom_1 = parseInt(panjangKolom1) - 1;

            $('#tabel_2 tr').each(function() {
                var totmarks = 0;
                $(this).find('#totalmax').each(function() {

                    totalKolom1 = $(this).val();

                });
                $(this).find('#totalbobot').val(totalKolom1 / kolom_1);
            });
        }

        function total() {
            $('#tabel_2 tr').each(function() {
                var totmarks = 0;

                $(this).find('#totalmax').val(totmarks);
                $(this).find('#totalbobot').val(totmarks);
            });
            $('#tabel_2 tr').each(function() {
                var totmarks = 0;
                $(this).find('td input').each(function() {

                    var marks = $(this).val();
                    if (marks.length !== 0) {
                        totmarks += parseFloat(marks);
                    }
                });
                $(this).find('#totalmax').val(totmarks);
            });

            bobot();
        }

        function hitung() {

            $('#tabel_2 thead th').each(function(i) {
                sum_2(i);
            });
            total();
        }

        function sum_2(index) {


            var total = 0;
            $('#tabel_2 tr').each(function() {
                var value = parseFloat($('td input', this).eq(index).attr("kor"));
                var value2 = parseFloat($('td input', this).eq(index).attr("kor2"));
                var value3 = parseFloat($('td input', this).eq(index).attr("kor3"));

                if (!isNaN(value)) {
                    var val2 = $(`#sum_atas_${value3}`).val();
                    var val = $(`#${value}_atas_${value2}`).val();

                    $(`#${value}_bawah1_${value2}`).val(val / val2);
                }

            });

        }


        function aa(sel, tes, kor1, kor2) {
            var val;
            switch (sel.value) {
                case '2':
                    val = '0.5';
                    break;
                case '3':
                    val = '0.3';
                    break;
                case '4':
                    val = '0.25';
                    break;
                case '5':
                    val = '0.2';
                    break;
                case '6':
                    val = '0.16';
                    break;
                case '7':
                    val = '0.14';
                    break;
                case '8':
                    val = '0.125';
                    break;
                case '9':
                    val = '0.11';
                    break;
                case '0.5':
                    val = '2';
                    break;
                case '0.3':
                    val = '3';
                    break;
                case '0.25':
                    val = '4';
                    break;
                case '0.2':
                    val = '5';
                    break;
                case '0.16':
                    val = '6';
                    break;
                case '0.14':
                    val = '7';
                    break;
                case '0.125':
                    val = '8';
                    break;
                case '0.11':
                    val = '9';
                    break;
                default:
            }


            $(`#${kor2}_atas_${kor1}`).val(val);
            $('#tabel_1 thead th').each(function(i) {
                sum_1(i);
            });
        };

        function sum_1(index) {


            var total = 0;
            $('#tabel_1 tr').each(function() {
                var value = parseFloat($('td select', this).eq(index).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });

            $('#tabel_1 tfoot td').eq(index).html(
                `<input type="text" class="form-control" id="sum_atas_${index}" value="${total}" disabled>`);

        }
    </script>
@endsection
