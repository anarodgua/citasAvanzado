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
                                <th>Poliza</th>
                            </tr>

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>

                                    <td> @if($user->poliza==null)
                                             El paciente no tiene póliza asignada.
                                        @else
                                        {{ $user->poliza->tipo}}
                                    @endif
                                    </td>

                                </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
