@extends('layouts.app')
@section('content')
<div class="col-md-12">
        <div class="col-md-8">
            <div class="col-md-8">
                <div class="" style="color:white;text-align: center;"><h2 style="font-family:acero y sangre">INICIAR SESION</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="col-md-6">
                                <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="width:80%;margin-left: 70%;">
                            </div>

                            <div class="col-md-6"  style="margin-left:25%;">
                            <label for="email" class="col-md-2 col-form-label text-md-right" style="color:white;">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6"  style="margin-left:25%;">
                                <label for="password" class="col-md-2 col-form-label text-md-right" style="color:white;">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-6" style="margin-left:32%;">
                                <button type="submit" class="btn btn-primary col-md-8">
                                    Ingresar
                                </button>
                            </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection