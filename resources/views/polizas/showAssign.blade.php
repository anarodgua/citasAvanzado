@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Introduzca su póliza y seleccione su compañía</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'assignPoliza']) !!}

                        <div class="form-group">
                            {!!Form::label('tipo', 'Tipo de póliza') !!}
                            <br>
                            {!! Form::text('tipo',null,['class'=>'form-control', 'autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('numero', 'Número de póliza') !!}
                            <br>
                            {!! Form::text('numero',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('compania_id', 'Compañía') !!}
                            <br>
                            {!! Form::select('compania_id', $companias, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
