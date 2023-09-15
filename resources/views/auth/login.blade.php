@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1 class="centered-heading">
                        <img src="/images/logo_disparta.png" alt="Deskripsi Gambar">
                        {{ trans('panel.site_title') }}
                    </h1>
                    <p class="text-muted">{{ trans('global.login') }}</p>

                    @if (session('message'))
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="text"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                value="{{ old('email', null) }}">

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>

                            <input id="password" name="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.login_password') }}">
                                <div class="input-group-append">
                             <span class="input-group-text" id="show-hide-password">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                     </span>
                        </div>


                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-4">
                            <div class="form-check checkbox">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember"
                                    style="vertical-align: middle;" />
                                <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                    {{ trans('global.remember_me') }}
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ trans('global.login') }}
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        {{ trans('global.forgot_password') }}
                                    </a><br>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .col-md-6 {
            flex: 0 0 50%;
            /* Mengatur lebar elemen menjadi 50% dari lebar kontainer */
            max-width: 50%;
            /* Mengatur lebar maksimum elemen */
            padding: 15px;
            /* Menambahkan padding untuk memberikan ruang di sekitar elemen */
        }

        .card {
            padding: 20px;
            /* Menambahkan padding untuk memberikan ruang di sekitar konten dalam elemen */
            background-color: #fff;
            /* Mengatur latar belakang elemen */
            border: 1px solid #ddd;
            /* Menambahkan border dengan warna abu-abu muda */
            border-radius: 5px;
            /* Membuat sudut elemen lebih bulat */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Menambahkan efek bayangan elemen */
        }

        .card-body {
            padding: 20px;
            background: #cbebff;
            border: 1px solid #1473e6;
            /* Ubah warna border sesuai yang Anda inginkan */
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* CSS untuk elemen .centered-heading */
        .centered-heading {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background: linear-gradient(to bottom, #83b2fc, #faf0f0);
            /* Warna latar belakang dengan efek linear */
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .centered-heading img {
            max-width: 200px;
            /* Mengatur lebar maksimum gambar */
            max-height: 100px;
            /* Mengatur tinggi maksimum gambar */
        }

        h1.centered-heading {
            font-family: 'Verdana', cursive;
            font-weight: bold;
            font-style: italic;
            font-size: 30px;
            color: #022170;
            /* Mengatur warna teks */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            /* Menambahkan efek bayangan pada teks */
        }

        .text-muted {
            font-family: 'Verdana', cursive;
            font-weight: bold;
            font-size: 20px;
            color: #4c4b4a;
            /* Warna font */
            margin-bottom: 10px;
            /* Menambahkan jarak bawah */
        }

        input-group {
            margin-bottom: 15px;
            /* Menambahkan jarak bawah antara elemen input group */
        }

        .input-group-prepend span {
            background-color: #1473e6;
            /* Warna latar belakang ikon */
            color: #fff;
            /* Warna ikon */
            border: 1px solid #1473e6;
            /* Border ikon */
            border-radius: 5px;
            /* Membuat sudut ikon lebih bulat */
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            border: 1px solid #ddd;
            /* Border input field */
            border-radius: 5px;
            /* Membuat sudut input field lebih bulat */
            padding: 10px;
            /* Menambahkan ruang di sekitar input field */
        }

        .form-check-input {
            vertical-align: middle;
            /* Posisi checkbox di tengah vertikal */
        }

        .btn {
            font-family: 'Verdana', cursive;
            /* Mengganti 'Your Button Font' dengan 'Brush Script MT' */
            font-weight: bold;
            font-size: 15px;
            /* Menambahkan ukuran font, sesuaikan dengan yang Anda inginkan */
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const showHidePassword = document.getElementById("show-hide-password");

        showHidePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    });
</script>
@endsection
