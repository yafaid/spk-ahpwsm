<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                                AHP dan WSM</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Penilaian kinerja karyawan adalah proses evaluasi dan pengukuran kualitas, kuantitas, dan efektivitas kinerja seorang karyawan dalam mencapai tujuan organisasi. 
                                                Tujuan dari penilaian kinerja karyawan adalah untuk mengidentifikasi kontribusi karyawan, mengukur kemampuan dan prestasi mereka, memberikan umpan balik yang konstruktif, 
                                                serta mendukung pengambilan keputusan terkait penghargaan, pengembangan, dan promosi karyawan. Penilaian kinerja karyawan dilakukan dengan 
                                                menggunakan kriteria yang telah ditentukan, seperti kompetensi, produktivitas, kehadiran, kerjasama tim, dan pencapaian target kerja. 
                                                Hasil penilaian ini dapat digunakan sebagai dasar untuk memberikan penghargaan, mengidentifikasi kebutuhan pengembangan karyawan, 
                                                dan mengoptimalkan penempatan dan penggunaan sumber daya manusia dalam organisasi.
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang HRD</h1>
                                    </div>
                                    <form class="user" action="{{ route('actionlogin') }}" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button> 
                                        @if(session('error'))
                                        <br><br>
                                        <div class="alert alert-danger">
                                        {{session('error')}}
                                        </div>
                                        @endif                                 
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>