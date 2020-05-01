@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar Especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'assignEspecialidad']) !!}

                        <div class="form-group">
                            {!!Form::label('especialidad_id', 'Especialidad del medico') !!}
                            <br>
                            {!! Form::select('especialidad_id', $especialidades, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
