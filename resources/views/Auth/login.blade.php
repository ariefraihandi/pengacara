@extends('Portal/Index/app-auth')

@push('head-script')
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/css/pages/page-auth.css" />
@endpush

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/images/icon.webp') }}" alt="Logo" width="100">
                        </span>                        
                    </a>
                </div>
                <!-- /Logo -->
                <div style="text-align: center;">
                    <p class="mb-2">Selamat Datang Di</p>
                    <h3 class="mb-4">Bilik Hukum ⚖️</h3>
                </div>
                

                <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                    <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email-username"
                    placeholder="Enter your email or username"
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                        <small>Forgot Password?</small>
                    </a>
                    </div>
                    <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
                </form>

                <p class="text-center">
                <span>Belum punya akun?</span>
                <a href="{{ route('showRegister') }}">
                    <span>Daftar</span>
                </a>
                </p>
                </div>
            </div>
            </div>
            <!-- /Register -->
        </div>
        </div>
    </div>
@endsection


@push('footer-script')  
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('portal_assets/assets') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
@endpush

@push('footer-Sec-script')
    <script src="{{ asset('portal_assets') }}/assets/js/pages-auth.js"></script>
    <script>
        @if(session('response'))
            var response = @json(session('response'));
            showSweetAlert(response);
        @endif
    </script>  
@endpush
