<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title>eCommerce | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('/')}}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('/')}}admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Free Register</h5>
                                    <p>Get your free Skote account now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('/')}}admin/assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="javascript: void(0);">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('/')}}admin/assets/images/logo.svg" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter username">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Enter password">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="Confirm password">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                    <p>Already have an account ? <a href="{{route('login')}}" class="font-weight-medium text-primary">
                            Login</a></p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('/')}}admin/assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}admin/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}admin/assets/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{asset('/')}}admin/assets/js/app.js"></script>
</body>
</html>

