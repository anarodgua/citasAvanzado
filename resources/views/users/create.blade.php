@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear usuario</div>
                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'users.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del usuario') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('surname', 'Apellidos del usuario') !!}
                            {!! Form::text('surname',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email del usuario') !!}
                            {!! Form::text('email',null,['class'=>'form-control', 'required']) !!}
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

                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Tipo de usuario</label>

                            <div class="col-md-6">
                                <input type="radio" id="Médico" name="userType" value="Médico" class="@error('userType') is-invalid @enderror" name="userType" value="{{ old('userType') }}" required autocomplete="userType" autofocus>
                                <label for="Médico">Médico</label><br>
                                <input type="radio" id="Paciente" name="userType" value="Paciente" class="@error('userType') is-invalid @enderror" name="userType" value="{{ old('userType') }}" required autocomplete="userType" autofocus>
                                <label for="Paciente">Paciente</label><br>
                                </div>

                                {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
