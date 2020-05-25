@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'storePaciente']) !!}
                        <div class="form-group">
                            {!! Form::label('fechaInicio', 'Fecha y hora de inicio la cita') !!}


                            <input type="datetime-local" id="fechaInicio" name="fechaInicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>

                        <div class="form-group">
                            {!! Form::label('fechaFin', 'Fecha y hora de fin de la cita') !!}


                            <input type="datetime-local" id="fechaFin" name="fechaFin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>

                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('localizacion_id', 'Localización') !!}
                            <br>
                            {!! Form::select('localizacion_id', $localizaciones, ['class' => 'form-control']) !!}

                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
