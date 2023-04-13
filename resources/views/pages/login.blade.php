<!DOCTYPE html>
<html>

<head>
    <title>Login | Kami Peduli</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/sitemap.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/sitemap.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/sitemap.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />


</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="#">
                    <img src="{{ asset('vendors/images/1.png') }}" alt="" style="padding: 30px;" />

                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login</h2>
                        </div>
                        <form method="POST" action="/login">
                            @csrf
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="role" id="admin" value="petugas" required />
                                        <div class="icon">
                                            <img src="vendors/images/briefcase.svg" class="svg" alt="" />
                                        </div>
                                        {{-- <span>Masyar</span> --}}
                                        Petugas
                                    </label>
                                    <label class="btn">
                                        <input type="radio" name="role" id="user" value="masyarkat"
                                            required />
                                        <div class="icon">
                                            <img src="vendors/images/person.svg" class="svg" alt="" />
                                        </div>
                                        {{-- <span>I'm</span> --}}
                                        Pelajar
                                    </label>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" name="username" class="form-control form-control-lg"
                                    placeholder="Nama Pengguna" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="**********" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        {{-- use code for form submit --}}
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Masuk">

                                        {{-- <a
												class="btn btn-primary btn-lg btn-block"
												href="index.html"
												>Sign In</a
											> --}}
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        Atau
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function saLoginFailed() {
            swal({
                type: 'error',
                title: 'Login Gagal!',
                text: 'Username atau Password salah!',
            })
        };
    </script>
    <script>
        function saLoginSuccess() {
            swal({
                type: 'success',
                title: 'Register Berhasil!',
                text: 'Silahkan Login',
            })
        };
    </script>

    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>

    <script src=" {{ asset('src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    @error('username')
        <script>
            saLoginFailed()
        </script>
    @enderror
    @if (Session::has('success'))
        <script>
            saLoginSuccess()
        </script>
    @endif

</body>

</html>
