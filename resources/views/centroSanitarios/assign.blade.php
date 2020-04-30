@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar centro sanitario</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'assignCentroSanitario']) !!}

                        <div class="form-group">
                            {!!Form::label('centroSanitario_id', 'Centro sanitario del medico') !!}
                            <br>
                            {!! Form::select('centroSanitario_id', $centroSanitarios, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
