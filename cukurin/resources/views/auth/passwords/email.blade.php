<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Forgot Password &mdash; Cukurin</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('../assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('../assets/modules/fontawesome/css/all.min.css') }}">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('../assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('../assets/img/CP-Logo.png') }}" alt="logo" width="100">
                        </div>

                        <div class="card card-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card-header"><h4>Forgot Password</h4></div>

                            <div class="card-body">
                                <p class="text-muted">We will send a link to reset your password</p>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                            Forgot Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- General JS Scripts -->
<script src="{{ asset('../assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('../assets/modules/popper.js') }}"></script>
<script src="{{ asset('../assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('../assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('../assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('../assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('../assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('../assets/js/scripts.js') }}"></script>
<script src="{{ asset('../assets/js/custom.js') }}"></script>
</body>
</html>