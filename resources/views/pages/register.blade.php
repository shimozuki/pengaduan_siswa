<!DOCTYPE html>
<html>

<head>
    <title>Register | Kami Peduli</title>

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
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="/login">
                    <img src="{{ asset('vendors/images/1.png') }}" alt="" style="padding: 30px;" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/register-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="register-box bg-white box-shadow border-radius-10">
                        <div class="wizard-content">
                            <form class="tab-wizard2 wizard-circle wizard" method="POST" action="/register"
                                id="formRegister">
                                @csrf
                                <h5>Informaasi dasar</h5>
                                <section>
                                    <div class="form-wrap max-width-600 mx-auto">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">NIK*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nik" required
                                                    max="16" min="16" />

                                                <div class="text-danger" style="visibility: hidden" id="nik">
                                                    @if ($errors->has('nik'))
                                                        <script>
                                                            document.getElementById("nik").style.visibility = "visible"
                                                        </script>
                                                        nik sudah terdaftar
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Username*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="username" required />

                                                <div class="text-danger" style="visibility: hidden" id="username">
                                                    @if ($errors->has('username'))
                                                        <script>
                                                            document.getElementById("username").style.visibility = "visible"
                                                        </script>
                                                        username sudah terdaftar
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="password" required />
                                                <div class="text-danger" style="visibility: hidden" id="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    required />
                                                <div class="text-danger" style="visibility: hidden"
                                                    id="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 2 -->
                                <h5>Informasi Pengguna</h5>
                                <section>
                                    <div class="form-wrap max-width-600 mx-auto">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Name*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" required />
                                                <div class="text-danger" style="visibility: hidden" id="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">telp*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="telp" required />
                                                <div class="text-danger" style="visibility: hidden" id="telp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>
