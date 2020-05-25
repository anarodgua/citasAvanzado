@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis citas</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Consulta</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fechaInicio }}</td>
                                    <td>{{ $cita->medico->name}}</td>
                                    <td>{{ $cita->paciente->name}}</td>
                                    <td>{{ $cita->localizacion->consulta}}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
