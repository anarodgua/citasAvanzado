@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi perfil</div>

                    <div class="panel-body">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Especialidad</th>
                                <th>Centro Sanitario</th>


                            </tr>

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>


                                    <td> @if($user->especialidad==null)
                                            Usted no tiene una especialidad asignado.
                                    @else
                                        {{ $user->especialidad->nombre}}
                                    @endif

                                    <td> @if($user->centroSanitario==null)
                                             Usted no tiene un centro sanitario asignada.
                                        @else
                                        {{ $user->centroSanitario->nombreCentro}}
                                    @endif
                                    </td>

                                </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
