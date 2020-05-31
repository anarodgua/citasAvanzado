@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cuadro médico</div>


                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'cuadroMedico', 'method' => 'get']) !!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Especialidad</th>

                            </tr>

                            @foreach ($medicos as $medico)
                                <tr>
                                    <td>{{ $medico->name}}</td>
                                    <td>{{ $medico->surname}}</td>
                                    <td>{{ $medico->especialidad->nombre}}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
