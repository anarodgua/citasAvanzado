@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar Poliza</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'assignPoliza']) !!}

                        <div class="form-group">
                            {!!Form::label('poliza_id', 'Poliza del paciente') !!}
                            <br>
                            {!! Form::select('poliza_id', $especialidades, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
