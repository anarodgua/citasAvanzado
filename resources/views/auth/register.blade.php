@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}


                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nuhsa" class="col-md-4 control-label">NUHSA</label>

                            <div class="col-md-6">
                                <input id="nuhsa" type="nuhsa" class="form-control" name="nuhsa" value="{{ old('nuhsa') }}" placeholder="Formato: AN1234567890" >

                                @if ($errors->has('nuhsa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nuhsa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Tipo de usuario</label>

                            <div class="col-md-6">
                                <input type="radio" id="Médico" name="userType" value="Médico" class="@error('userType') is-invalid @enderror" name="userType" value="{{ old('userType') }}" required autocomplete="userType" autofocus>
                                <label for="Médico">Médico</label><br>
                                <input type="radio" id="Paciente" name="userType" value="Paciente" class="@error('userType') is-invalid @enderror" name="userType" value="{{ old('userType') }}" required autocomplete="userType" autofocus>
                                <label for="Paciente">Paciente</label><br>
                                <input type="radio" id="Administrador" name="userType" value="Administrador" class="@error('userType') is-invalid @enderror" name="userType" value="{{ old('userType') }}" required autocomplete="userType" autofocus>
                                <label for="Administrador">Administrador</label><br>


                                @if ($errors->has('userType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
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
