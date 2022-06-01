@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" container">
                <div style="color:white; font-family: Acero y Sangre;font-size: 25pt; text-align: center;">Registro en el Sistema</div>
                <div>
                    <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="margin-left:30%;">
                </div>
                <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="usu_nombre" class="col-md-4 col-form-label text-md-right" style="color:white;">Nombre :</label>

                            <div class="col-md-6">
                                <input id="usu_nombre" type="text" class="form-control @error('usu_nombre') is-invalid @enderror" name="usu_nombre" value="{{ old('usu_nombre') }}" required autocomplete="usu_nombre" autofocus>

                                @error('usu_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="usu_apellido" class="col-md-4 col-form-label text-md-right" style="color:white;">Apellido :</label>

                            <div class="col-md-6">
                                <input id="usu_apellido" type="text" class="form-control @error('usu_apellido') is-invalid @enderror" name="usu_apellido" value="{{ old('usu_apellido') }}" required autocomplete="usu_apellido" autofocus>

                                @error('usu_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usu_telefono" class="col-md-4 col-form-label text-md-right" style="color:white;">Telefono :</label>

                            <div class="col-md-6">
                                <input id="usu_telefono" type="text" class="form-control @error('usu_telefono') is-invalid @enderror" name="usu_telefono" value="{{ old('usu_telefono') }}" required autocomplete="usu_telefono" autofocus maxlength="10">

                                @error('usu_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color:white;">Email :</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usu_cedula" class="col-md-4 col-form-label text-md-right" style="color:white;">Cedula :</label>

                            <div class="col-md-6">
                                <input id="usu_cedula" type="text" class="form-control @error('usu_cedula') is-invalid @enderror" name="usu_cedula" value="{{ old('usu_cedula') }}" required autocomplete="usu_cedula" maxlength="10">

                                @error('usu_cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"style="color:white;">Contraseña :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color:white;">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection