@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modificar cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($cita, [ 'route' => ['citas.update',$cita->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fechaInicio', 'Fecha y hora de la cita') !!}


                            <input type="datetime-local" id="fechaInicio" name="fechaInicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />

                        </div>

                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('tipoCita', 'Tipo de cita') !!}
                            <br>
                            {!! Form::select('tipoCita',['consulta'=>'Consulta','revision'=>'Revisión'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('provincia', 'Seleccione su provincia') !!}
                            <br>
                            {!! Form::select('provincia',['Sevilla'=>'Sevilla','Cordoba'=>'Córdoba','Granada'=>'Granada'], ['class' => 'form-control']) !!}
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
