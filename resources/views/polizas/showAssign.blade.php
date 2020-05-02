@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Introduzca su póliza y seleccione su compañía</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'showAssignPoliza']) !!}

                        <div class="form-group">
                            {!!Form::label('poliza_id', 'Poliza') !!}
                            <br>
                            {!! Form::input('poliza_id', $polizas, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('poliza_id', 'Tipo de póliza') !!}
                            <br>
                            {!! Form::select('poliza_id', $tipoPolizas, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('compania_id', 'Compañía') !!}
                            <br>
                            {!! Form::select('compania_id', $polizas, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
